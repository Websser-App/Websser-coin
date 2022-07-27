<style>
    .precios{
        border-radius: 20px;
        font-size: 100%;
        text-align: center;
        
        background-color: white;
        border-radius: 25px;
    }
    .contenerdor2{
        justify-content: center;
        margin-bottom: 10%;
        display: grid;
        gap: 1rem;
        grid-auto-rows: 25rem;
        grid-template-columns:repeat(auto-fill, minmax(min(100%, 15rem),15rem));
        margin-left: 5%;
        margin-right: 5%;
        
        
    }
    .titulo{
        margin-left:5%;
        font-size: 150%;
        font-weight: bold;
    }
    i{
        font-size: 120%;
    }
    .conttenedorImg{
        overflow: hidden;
        height: 20%;
        max-height: 40%;
    }
</style>



@extends('layouts.app')

@section('content')
@include('layouts.headers.page')
<div class="container-fluid mt-7">
    
    <div class="row">
        <div class="col">
            @if(Session::has('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ Session::get('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

            <h3 class="titulo">{{__('Departaments')}}</h3>
            <div class= "contenerdor2">
                
                    @foreach($departaments as $departament)
                        {{-- {{var_dump($departament->tenants->id)}} --}}
                        
                        <div class="precios">
                            @if($departament->tenants == NULL)
                                
                                    <div class="dropdown">
                                        <a class="btn btn-sm btn-icon-only text-primary btnI" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                            {{-- <a class="dropdown-item" href="{{ route('departaments.edit', $departament->id) }}">{{__('Edit')}}</a> --}}
                                            <button title="@lang('Edit')" class="dropdown-item"  data-bs-toggle="modal"  data-bs-target="#edit{{ $departament->id }}" data-id="{{ $departament->id }}">@lang('Edit')</button>

                                            <form action="{{ route('departaments.destroy', $departament->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" class="dropdown-item" value="{{__('Delete')}}">
                                            </form>
                                        </div>
                                    </div>

                                    <div class="row" height="50%">
                                        <div class="conttenedorImg">
                                            <img src="{{ asset('argon') }}/img/theme/departament.jpg" width="100%" class="">
                                        </div>
                                    </div>
                                    <a href="{{ route('tenants.create', $departament->id)}}" class="row">
                                    <!--<h5 class="card-title">@lang('Information')</h5>--->
                                        <strong><b> @lang('')ID:</b></strong>
                                        <p class="card-text">{{$departament->UUID}}</p>
                                        <strong><b> @lang('')N° Departamento:</b></strong>
                                        <p class="card-text">{{$departament->number_departament}}</p>
                                        <strong><b> @lang('')Inquilino:</b></strong>
                                        @if($departament->tenants != NULL)
                                            <p class="card-text">{{$departament->tenants->name}} {{$departament->tenants->surname}} {{$departament->tenants->second_surname}}</p>
                                        @else
                                            <p class="card-text">@lang('Not assigned')</p>
                                        @endif
                                    </a>
                                
                            @else
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text-primary btnI" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        {{-- <a class="dropdown-item" href="{{ route('departaments.edit', $departament->id) }}">{{__('Edit')}}</a> --}}
                                        <button title="@lang('Edit')" class="dropdown-item"  data-bs-toggle="modal"  data-bs-target="#edit{{ $departament->id }}" data-id="{{ $departament->id }}">@lang('Edit')</button>
                                        <form action="{{ route('departaments.destroy', $departament->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" class="dropdown-item" value="{{__('Delete')}}">
                                        </form>
                                    </div>
                                </div>
                                    
                                <div class="row" height="50%">
                                    <div class="conttenedorImg">
                                        <img src="{{ asset('argon') }}/img/theme/departament.jpg" width="100%" class="">
                                    </div>
                                </div>
                                <a href="{{ route('tenants.edit', $departament->tenants->id)}}" class="row">
                                <!--<h5 class="card-title">@lang('Information')</h5>--->
                                    <strong><b> @lang('')ID:</b></strong>
                                    <p class="card-text">{{$departament->UUID}}</p>
                                    <strong><b> @lang('')N° Departamento:</b></strong>
                                    <p class="card-text">{{$departament->number_departament}}</p>
                                    <strong><b> @lang('')Inquilino:</b></strong>
                                    @if($departament->tenants != NULL)
                                        <p class="card-text">{{$departament->tenants->name}} {{$departament->tenants->surname}} {{$departament->tenants->second_surname}}</p>
                                    @else
                                        <p class="card-text">@lang('Not assigned')</p>
                                    @endif
                                </a>
                                
                            @endif
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="edit{{ $departament->id }}" tabindex="-1" role="dialog" aria-labelledby="edit{{ $departament->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">@lang('Address')</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <center>
                                        <form action="{{route('departaments.update', $departament->id)}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="col-md-6">
                                                <label for="number_departament" class="form-label text-center">@lang('Departament Number')</label>
                                                <input type="text" class="form-control text-center" id="number_departament" name="number_departament" value="{{$departament->number_departament}}" placeholder="@lang('Departament Number')" required>
                                            </div>
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                            </div>
                                        </form>
                                    </center>
                                </div>
                                <div class="modal-footer">
                                    {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('Close')</button> --}}
                                </div>
                            </div>
                            </div>
                        </div> 
                    @endforeach
                    

            </div>

            <!--
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class=""></h3>
                        </div>
                    </div>
                </div>
                
                <div class="col-12">
                </div>
                @if(Session::has('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ Session::get('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <h3 class="titulo">{{__('Departaments')}}</h3>
                <div class= "contenerdor2">
                    
                        @foreach($departaments as $departament)
                            {{-- {{var_dump($departament->tenants->id)}} --}}
                            
                            <div class="precios">
                                @if($departament->tenants == NULL)
                                    
                                        <a title="@lang('Tenants')" href="{{ route('tenants.create', $departament->id)}}" class="btn btn-sm text-primary">
                                            <i class="ni ni-single-02" style="font-size: 120%;"></i>
                                        </a>
                                    
                                @else
                                    
                                        <a title="@lang('Tenants')" href="{{ route('tenants.edit', $departament->tenants->id)}}" class="btn btn-sm text-primary">
                                            <i class="ni ni-settings" style="font-size: 120%;"></i>
                                        </a>
                                    
                                @endif
                                <h5 class="card-title">@lang('Information')</h5>
                                <strong><b> @lang('ID Bulding'):</b></strong>
                                <p class="card-text">{{$departament->buildings->UUID}}</p>
                                <strong><b> @lang('Departament Number'):</b></strong>
                                <p class="card-text">{{$departament->UUID}}</p>
                                <strong><b> @lang('Tenant name'):</b></strong>
                                @if($departament->tenants != NULL)
                                <p class="card-text">{{$departament->tenants->name}} {{$departament->tenants->surname}} {{$departament->tenants->second_surname}}</p>
                                @else
                                    <p class="card-text">@lang('Not assigned')</p>
                                @endif
                                <p class="card-text">{{$departament->number_departament}}</p>
                            </div>
                        @endforeach
                       

                </div>

                <div class="table-responsive" >
                    <table class="table align-items-center table-flush" id="tablelist">

                        <thead class="thead-light">
                            <tr>
                                <th scope="col">@lang('ID Bulding')</th>
                                <th scope="col">@lang('ID departament')</th>
                                <th scope="col">@lang('Departament Number')</th>
                                <th scope="col">@lang('Tenant name')</th>
                                <th scope="col">@lang('Actions')</th>


                            </tr>
                        </thead>
                        <tbody>
                            @foreach($departaments as $departament)
                                    {{-- {{var_dump($departament->tenants->id)}} --}}
                                <tr>
                                    <td>{{$departament->buildings->UUID}}</td>
                                    <td>{{$departament->UUID}}</td>
                                    <td>{{$departament->number_departament}}</td>
                                    @if($departament->tenants != NULL)
                                        <td>{{$departament->tenants->name}} {{$departament->tenants->surname}} {{$departament->tenants->second_surname}}</td>
                                    @else
                                        <td>@lang('Not assigned')</td>
                                    @endif
                                    @if($departament->tenants == NULL)
                                        <td class="text-right">
                                            <a title="@lang('Tenants')" href="{{ route('tenants.create', $departament->id)}}" class="btn btn-sm text-primary">
                                                <i class="ni ni-single-02"></i>
                                            </a>
                                        </td>
                                    @else
                                        <td class="text-right">
                                            <a title="@lang('Tenants')" href="{{ route('tenants.edit', $departament->tenants->id)}}" class="btn btn-sm text-primary">
                                                <i class="ni ni-settings"></i>
                                            </a>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                        
                    </nav>
                </div>
            </div>
            -->
        </div>
    </div>
    @include('layouts.footers.auth')
</div>
@endsection