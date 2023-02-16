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
                            <h3 class="mb-0">{{__('Departaments')}}</h3>
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
                            <td class="text-right">
                                <a title="@lang('Tenants')" href="{{ route('tenants.create', $departament->id)}}" class="btn btn-sm text-primary">
                                    <i class="ni ni-single-02"></i>
                                </a>
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