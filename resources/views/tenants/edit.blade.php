@extends('layouts.app')

@section('content')
@include('layouts.headers.page')
<body onload="initialize();">
    <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
            <div class="row align-items-center">
                <h3 class="mb-0">{{ __('Edit Tenants') }}</h3>
            </div>
        </div>
        <div class="card-body">
            <form class="row g-3" method="POST" action="{{route('tenants.update', $tenants->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                    <input type="hidden" value="{{$tenants->building_id}}" name="building_id">
                <div class="col-md-6">
                  <label for="name" class="form-label">@lang('Name')</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="@lang('Name')" value="{{ $tenants->name }}" required>
                </div>
                <div class="col-md-6">
                    <label for="surname" class="form-label">@lang('Surname')</label>
                    <input type="text" class="form-control" id="surname" name="surname" placeholder="@lang('Surname')" value="{{ $tenants->surname }}" required>
                </div>
                <div class="col-md-6">
                    <label for="second_surname" class="form-label">@lang('Second Surname')</label>
                    <input type="text" class="form-control" id="second_surname" name="second_surname" placeholder="@lang('Second surname')" value="{{ $tenants->second_surname }}" required>
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">@lang('Email')</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="@lang('Email')" value="{{ $tenants->email }}" required>
                </div>
                <div class="col-md-4 center">
                    <label for="type" class="form-label">@lang('Tenant type')</label>
                    <select id="type" class="form-select" name="type" required>
                        @if($tenants->type == 'owner')
                            <option value="owner" selected readonly>@lang('Owner')</option>
                            <option value="rent">@lang('Rent')</option>
                        @else
                            <option value="rent" selected readonly>@lang('Rent')</option>
                            <option value="owner">@lang('Owner')</option>
                        @endif    
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