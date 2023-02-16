@extends('layouts.app')

@section('content')
@include('layouts.headers.page')
<div class="container-fluid mt-7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">{{__('Buildings')}}</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('building.create')}}" class="btn btn-sm btn-primary">{{ __('Create Entity') }}</a>
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

                <div class="table-responsive">
                    <table id="tablelist" class="table align-items-center table-flush">

                        <thead class="thead-light">
                            <tr>
                                <th scope="col">@lang('ID Bulding')</th>
                                <th scope="col">@lang('Type Building')</th>
                                {{-- <th scope="col">@lang('Address')</th> --}}
                                <th scope="col">@lang('N° Rows')</th>
                                <th scope="col">@lang('N° Columns')</th>
                                <th scope="col">@lang('Actions')</th>


                            </tr>
                        </thead>
                        <tbody>
                            @foreach($buildings as $building)
                        <tr>
                            <td>{{$building->UUID}}</td>
                            @if($building->type_building == 'vertical')
                                <td>{{__('Vertical')}}</td>
                            @elseif($building->type_building == 'horizontal') 
                                <td>{{__('Horizontal')}}</td>
                            @endif
                            {{-- <td>{{$building->address}}</td> --}}
                            <td>{{$building->rows}}</td>
                            <td>{{$building->columns}}</td>
                            <td class="text-right">
                                <button title="@lang('Address')" type="button" class="btn btn-sm text-primary" data-bs-toggle="modal"  data-bs-target="#assignModal{{ $building->id }}" data-id="{{ $building->id }}">
                                    <i class="ni ni-square-pin"></i>
                                  </button>
                                <a title="@lang('Departaments')" href="{{route('departaments.create', $building->id)}}" class="btn btn-sm text-primary">
                                    <i class="ni ni-building"></i>
                                </a>
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text-primary" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                            <!-- Modal -->
                        <div class="modal fade" id="assignModal{{ $building->id }}" tabindex="-1" role="dialog" aria-labelledby="assignModalLabel{{ $building->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">@lang('Address')</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                <h2>@lang('Address')</h2>
                                <p>{{$building->address}}</p>
                                
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