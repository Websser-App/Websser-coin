@extends('layouts.app')
@section('content')
@include('layouts.headers.page')
<style>
    .precios{
        font-size: 100%;
        text-align: center;
        height: 100%;
        background-color: white;
        
    }
    .contenerdor2{
        
        justify-content: center;
        margin-bottom: 20%;
        display: grid;
        gap:12rem;
        grid-auto-rows: 15rem;
        grid-template-columns:repeat(auto-fit, minmax(13rem, 1fr));
        margin-left: 5%;
        margin-right: 5%;
        
    }
    i{
        font-size: 30px;
    }
    .buttons{
        width:130px;
        height: 30px;
        font-size: 15px;
        
      
    }
    td{
        font-size: 30px;
    }
    .letras{
        font-size: 40%;
    }
    .btnI{
        width:45px;
        height: 45px;
        text-align: center;
        justify-content: center;
    }
    .row{
        width: 99%;
        display: flex;
        grid-template-columns: repeat(3, auto);
        padding: 0 40px;
        gap: 0px;
        align-items: center;
    }
    .conttenedorImg{
        overflow: hidden;
        height: 100%;
    }
</style>
<div class="container-lg mt-7">
    <div class="card">
        <div class="row">
            <div class="col">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">{{__('Buildings')}}</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('building.create')}}" class="btn btn-sm btn-primary buttons" >{{ __('Create Entity') }}</a>
                        </div>
                    </div>
                </div>
                
                @if(Session::has('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ Session::get('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="contenerdor2"> 
                    @foreach($buildings as $building)
                        <div class="precios">
                            <button title="@lang('Address')" type="button" class="btn btn-sm text-primary btnI" data-bs-toggle="modal"  data-bs-target="#assignModal{{ $building->id }}" data-id="{{ $building->id }}">
                                <i class="ni ni-square-pin" style="font-size: 25px;"></i>
                            </button>
                            <a title="@lang('Departaments')" href="{{route('departaments.create', $building->id)}}" class="btn btn-sm text-primary btnI">
                                <i class="ni ni-building" style="font-size: 25px;"></i> 
                            </a>
                            <div class="dropdown">
                                <a class="btn btn-sm btn-icon-only text-primary btnI" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-ellipsis-v"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                    <a class="dropdown-item" href="{{ route('building.edit', $building->id) }}">{{__('Edit')}}</a>
                                    <form action="{{ route('building.destroy', $building->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="dropdown-item" value="{{__('Delete')}}">
                                    </form>
                                </div>
                            </div>
                            <div class="conttenedorImg">
                                @if($building->type_building == 'vertical')
                                    <img src="{{ asset('argon') }}/img/v.png"  height= "100%;" class="">
                                @elseif($building->type_building == 'horizontal') 
                                    <img src="{{ asset('argon') }}/img/h.png"  height= "100%;"class="">
                                @endif
                            </div>
                            <p class="card-title">@lang('Information')</p>
                            <strong><b> @lang('ID'):</b></strong>
                            <p class="card-text">{{$building->UUID}}</p>

                        </div>
                        
                        <div class="modal fade" id="assignModal{{ $building->id }}" tabindex="-1" role="dialog" aria-labelledby="assignModal{{ $building->id }}" aria-hidden="true">
                                    <div class="modal-dialog modalSize">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="assignModal{{ $building->id }}">@lang('Address')</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <center>
                                                    <h5>{{$building->address}}</h5>
                                                </center>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('Close')</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        

                    @endforeach
                </div>
                 
                <!---
                <div class="table-responsive">
                    <table id="tablelist" class="table align-items-center table-flush letras" >

                        <thead class="thead-light" >
                            <tr class= "letras">
                                <th scope="col" style="font-size: 15px;">@lang('ID Bulding')</th>
                                <th scope="col"style="font-size: 15px;">@lang('Type Building')</th>
                                {{-- <th scope="col" style="font-size: 15px;">@lang('Address')</th> --}}
                                <th scope="col" style="font-size: 15px;">@lang('N° Rows')</th>
                                <th scope="col" style="font-size: 15px;">@lang('N° Columns')</th>
                                <th scope="col" style="font-size: 15px;">@lang('Actions')</th>


                            </tr>
                        </thead>
                        <tbody>
                            @foreach($buildings as $building)
                                <tr>
                                    <td style="font-size: 15px;">{{$building->UUID}}</td>
                                    @if($building->type_building == 'vertical')
                                        <td style="font-size: 15px;">{{__('Vertical')}}</td>
                                    @elseif($building->type_building == 'horizontal') 
                                        <td style="font-size: 15px;">{{__('Horizontal')}}</td>
                                    @endif
                                    {{-- <td style="font-size: 15px;">{{$building->address}}</td> --}}
                                    <td style="font-size: 15px;">{{$building->rows}}</td>
                                    <td style="font-size: 15px;">{{$building->columns}}</td>
                                    <td class="text-right">
                                        <button title="@lang('Address')" type="button" class="btn btn-sm text-primary btnI" data-bs-toggle="modal"  data-bs-target="#assignModal{{ $building->id }}" data-id="{{ $building->id }}">
                                            <i class="ni ni-square-pin" style="font-size: 25px;"></i>
                                        </button>
                                        <a title="@lang('Departaments')" href="{{route('departaments.create', $building->id)}}" class="btn btn-sm text-primary btnI">
                                            <i class="ni ni-building" style="font-size: 25px;"></i> 
                                        </a>
                                        <div class="dropdown">
                                            <a class="btn btn-sm btn-icon-only text-primary btnI" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                <a class="dropdown-item" href="{{ route('building.edit', $building->id) }}">{{__('Edit')}}</a>
                                                <form action="{{ route('building.destroy', $building->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit" class="dropdown-item" value="{{__('Delete')}}">
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>


                                 Modal 

                                 
                                <div class="modal fade" id="assignModal{{ $building->id }}" tabindex="-1" role="dialog" aria-labelledby="assignModal{{ $building->id }}" aria-hidden="true">
                                    <div class="modal-dialog modalSize">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="assignModal{{ $building->id }}">@lang('Address')</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <center>
                                                    <h5>{{$building->address}}</h5>
                                                </center>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('Close')</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                -->
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                        
                    </nav>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footers.auth')
</div>
@endsection