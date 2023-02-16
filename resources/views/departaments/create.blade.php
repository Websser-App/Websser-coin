@extends('layouts.app')

@section('content')
@include('layouts.headers.page')
<body onload="initialize();">
    <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
            <div class="row align-items-center">
                <h3 class="mb-0">{{ __('Assign departments') }}</h3>
            </div>
        </div>
        <div class="card-body">
            <form class="row g-3" method="post" action="{{route('departaments.store')}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" class="form-control" id="building_id" name="building_id" value="{{ $buildings->id }}">

                @for ($i = 0; $i < $inputsDepartaments; $i++)
                    <div class="col-md-4">
                        <label for="number_departament" class="form-label">@lang('Departament Number')</label>
                        <input type="text" class="form-control" id="number_departament" name="number_departament[]" placeholder="@lang('Departament Number')" required>
                    </div>
                @endfor 

                <div class="text-center">
                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                </div>
            </form>
        </div>
        @include('layouts.footers.auth')
    </div>
</body>
@endsection