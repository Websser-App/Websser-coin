@extends('layouts.app')

@section('content')
@include('layouts.headers.page')
<body onload="initialize();">
    <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
            <div class="row align-items-center">
                <h3 class="mb-0">{{ __('Upload voucher') }}</h3>
            </div>
        </div>
        <div class="card-body">
            <form class="row g-3" method="post" action="{{route('vouchers.store')}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{auth()->user()->id}}" name="user_id">
                    <label for="bills_id" class="form-label">@lang('Expense concept')</label>
                    <select class="form-select" aria-label="Default select example" name="bills_id">
                        <option selected disabled>@lang('Choose the concept of expense')</option>
                        @foreach($bills as $bill)
                            <option value="{{$bill->id}}">{{$bill->name}}</option>
                        @endforeach
                    </select>

                    <div class="col-mb-4">
                        <label for="voucher" class="form-label">@lang('Voucher')</label>
                        <input class="form-control" type="file" id="voucher" name="voucher">
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