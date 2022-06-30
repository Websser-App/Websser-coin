@extends('layouts.app')

@section('content')
@include('layouts.headers.page')
<div class="container-fluid mt-7">
    <div class="row">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col-8">
                    <h3 class="mb-0">{{__('Expense Concepts')}}</h3>
                </div>
                <div class="col-4 text-right">
                    <a href="{{ route('bills.create')}}" class="btn btn-sm btn-primary">{{ __('Create expense concept') }}</a>
                </div>
            </div>
            <div class="col-12 text-center">
                <button href="{{url('bills')}}" class="btn btn-secondary active" disabled>@lang('Expense Concepts')</button>
                <a href="{{url('vouchers')}}" class="btn btn-secondary" >@lang('Vouchers')</a>
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

    @foreach($bills as $bill)
    <div class="col-sm-3">
        <a href="{{route('bills.tenants', $bill->id )}}" class="card">
            <img src="{{asset('argon')}}\img\concepgastos.png" width="auto" height=auto alt="">
          <div class="card-body">
            <h5 class="card-title">@lang('Information')</h5>
            <strong><b> @lang('Name'):</b></strong>
            <p class="card-text">{{$bill->name}}</p>
            <strong><b>@lang('Amount'):</b></strong>
            <p class="card-text">${{getAmount($bill->amount, 2)}}</p>

          </div>
        </a>
      </div>
    @endforeach
    </div>
    @include('layouts.footers.auth')
</div>
@endsection