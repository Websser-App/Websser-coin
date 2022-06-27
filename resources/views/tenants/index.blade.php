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
                            <h3 class="mb-0">{{__('Tenants')}}</h3>
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

                <div class="table-responsive" >
                    <table class="table align-items-center table-flush" id="tablelist"> 

                        <thead class="thead-light">
                            <tr>
                                <th scope="col">@lang('Name')</th>
                                <th scope="col">@lang('Surname')</th>
                                <th scope="col">@lang('Second surname')</th>
                                <th scope="col">@lang('Email')</th>
                                <th scope="col">@lang('Type')</th>
                                <th scope="col">@lang('Actions')</th>


                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tenants as $tenant)
                        <tr>
                            <td>{{$tenant->name}}</td>
                            <td>{{$tenant->surname}}</td>
                            <td>{{$tenant->second_surname}}</td>
                            <td>{{$tenant->email}}</td>
                            @if($tenant->type == 'owner')
                                <td>{{__('Owner')}}</td>
                            @elseif($tenant->type == 'rent') 
                                <td>{{__('Rent')}}</td>
                            @endif
                            <td class="text-right">
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text-primary" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <a class="dropdown-item" href="{{ route('tenants.edit', $tenant->id) }}">{{__('Edit')}}</a>
                                        <form action="{{ route('tenants.destroy', $tenant->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" class="dropdown-item" value="{{__('Delete')}}">
                                        </form>
                                    </div>
                                </div>
                            </td>
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
        </div>
    </div>
    @include('layouts.footers.auth')
</div>
@endsection