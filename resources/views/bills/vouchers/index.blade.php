@extends('layouts.app')

@section('content')
@include('layouts.headers.page')
<div class="container-fluid mt-7">
    <div class="row">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col-8">
                    <h3 class="mb-0">{{__('Vouchers')}}</h3>
                </div>
                <div class="col-4 text-right">
                    <a href="{{ route('vouchers.create')}}" class="btn btn-sm btn-primary">{{ __('Upload vouchers') }}</a>
                </div>
            </div>
            <div class="col-12 text-center">
                <a href="{{url('bills')}}" class="btn btn-secondary" >@lang('Expense Concepts')</a>
                <button href="{{url('vouchers')}}" class="btn btn-secondary active" disabled>@lang('Vouchers')</button>
            </div>
        </div>
                
    @if(Session::has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ Session::get('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @foreach($vouchers as $voucher)
    <div class="col-sm-4">
        <div class="card">
            <img src="data:image/png;base64,{{$voucher->voucher}}" width="auto" height=auto alt="">
          <div class="card-body">
            <h5 class="card-title">@lang('Information')</h5>
            <strong><b> @lang('Payment name'):</b></strong>
            <p class="card-text">{{$voucher->bills->name}}</p>
          </div>
        </div>
      </div>
    @endforeach
    </div>
    @include('layouts.footers.auth')
</div>
@endsection