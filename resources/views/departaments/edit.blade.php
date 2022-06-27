@extends('layouts.app')

@section('content')
@include('layouts.headers.page')
<body onload="initialize();">
    <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
            <div class="row align-items-center">
                <h3 class="mb-0">{{ __('Edit Departaments') }}</h3>
            </div>
        </div>
        <div class="card-body">
            <form class="row g-3" method="post" action="{{route('departaments.update',  $departaments->id)}}" enctype="multipart/form-data">
                @csrf

                <div class="col-md-6">
                    <label for="type" class="form-label">@lang('What is the building identifier?')</label>
                    <select id="type" class="form-select" name="building_id" required>
                        @foreach($buildings as $building)
                            <option selected>@lang('Building Identifier')</option>
                            <option value="{{ $building->id }}">{{ $building->UUID }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="type" class="form-label">@lang('Who is the tenant?')</label>
                    <select id="type" class="form-select" name="tenant_id" required>
                        @foreach($tenants as $tenant)
                            <option selected>@lang('Tenants')</option>
                            <option value="{{ $tenant->id }}">{{ $tenant->name }} {{ $tenant->surname }} {{ $tenant->second_surname }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-6">
                  <label for="number_departament" class="form-label">@lang('Department Number')</label>
                  <input type="text" class="form-control" id="number_departament" name="number_departament" placeholder="@lang('number_departament')" required>
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