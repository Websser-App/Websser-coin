@extends('layouts.app')

@section('content')
@include('layouts.headers.page')
<body onload="initialize();">
    <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
            <div class="row align-items-center">
                <h3 class="mb-0">{{ __('Create expense concept') }}</h3>
            </div>
        </div>
        <div class="card-body">
            <form class="row g-3" method="post" action="{{route('tenantpayments.store')}}" enctype="multipart/form-data">
                @csrf

                    <div class="input-group right">
                        <select class="custom-select" id="inputGroupSelect04" name="building_id">
                            <option selected>@lang('Choose the building')</option>
                                @foreach ($buildings as $building)
                                    <option value="{{$building->id}}">{{$building->UUID}}</option>
                                @endforeach>
                        </select>
                    </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success mt-4">{{ __('Continue') }}</button>
                </div>
            </form>
        </div>
        @include('layouts.footers.auth')
    </div>
</body>
@endsection