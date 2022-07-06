@extends('layouts.app')

@section('content')
@include('layouts.headers.page')
<body onload="initialize();">
    <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
            <div class="row align-items-center">
                <h3 class="mb-0">{{ __('Create Tenants') }}</h3>
            </div>
        </div>
        <div class="card-body">
            <form class="row g-3" method="post" action="{{route('tenants.store')}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{auth()->user()->id}}" name="user_id">
                <input type="hidden" name="departament_id" value="{{$departament->id}}">
                <input type="hidden" name="building_id" value="{{$departament->building_id }}">

                <div class="col-md-6">
                  <label for="name" class="form-label">@lang('Name')</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="@lang('Name')" required>
                </div>
                <div class="col-md-6">
                    <label for="surname" class="form-label">@lang('Surname')</label>
                    <input type="text" class="form-control" id="surname" name="surname" placeholder="@lang('Surname')" required>
                </div>
                <div class="col-md-6">
                    <label for="second_surname" class="form-label">@lang('Second surname')</label>
                    <input type="text" class="form-control" id="second_surname" name="second_surname" placeholder="@lang('Second surname')" required>
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">@lang('Email')</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="@lang('Email')" required>
                </div>
                <div class="col-md-4 center">
                    <label for="type" class="form-label">@lang('Tenant type')</label>
                    <select id="type" class="form-select" name="type" required>
                      <option disabled selected>@lang('Tenant type')</option>
                      <option value="owner">@lang('Owner')</option>
                      <option value="rent">@lang('Rent')</option>
                    </select>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                </div>
            </form>
        </div>
        @include('layouts.footers.auth')
    </div>
</body>
@endsection