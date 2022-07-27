@extends('layouts.app')

@section('content')
@include('layouts.headers.page')
<body onload="initialize();">
    <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
            <div class="row align-items-center">
                <h3 class="mb-0">{{ __('Validate SMS Phone') }}</h3>
            </div>
            @if(Session::has('message'))
                <br>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ Session::get('message') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>
        <div class="card-body">
            <form class="row g-3" method="post" action="{{ url('validationWithdrawals', ['id' => $withdrawals->id]) }}" enctype="multipart/form-data">
                @csrf
                    <center>
                        <div class="col-md-6">
                            <label for="code" class="form-label">@lang('Code')</label>
                            <input type="text" class="form-control" id="code" name="code" placeholder="@lang('Code')" required>
                        </div>
                    </center>
                <div class="text-center">
                    <button type="submit" class="btn btn-success mt-4">{{ __('Continue') }}</button>
                </div>
            </form>
        </div>
        @include('layouts.footers.auth')
    </div>
</body>
@endsection