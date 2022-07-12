<style>
    .precios{
        border-color: blue;
        border-radius: 30px;
        font-size: 100%;
        text-align: center;
        height: 100%;
        background-color: white;
        
    }
    .titulo{
        margin-left:2%;
        font-size: 150%;
        font-weight: bold;
    }
    .contenerdor2{
        margin-top: 10%;
        justify-content: center;
        margin-bottom: 10%;
        display: grid;
        gap:1rem;
        grid-auto-rows: 25rem;
        grid-template-columns:repeat(auto-fill, minmax(25rem, 1fr));
        margin-left: 5%;
        margin-right: 5%;
        
    }
    
    .buttons{
        width:130px;
        height: 30px;
        font-size: 15px;
        position: relative;
        right: -90%;
        bottom: -90%;
      
    }
    td{
        font-size: 30px;
    }
    .letras{
        font-size: 40%;
    }
    .btnI{
        width:45px;
        height: 45px;
        text-align: center;
        justify-content: center;
    }
    
    .conttenedorImg{
        overflow: hidden;
        height: 70%;
    }
</style>

@extends('layouts.app')

@section('content')
@include('layouts.headers.page')
<div class="container-fluid mt-7">
    <div class="">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="text-center">
                    <h3 class="mb-0">{{__('Vouchers')}}</h3>
                </div>
                <div class=" text-center">
                    <a href="{{ route('vouchers.create')}}" class="btn btn-sm btn-primary">{{ __('Upload vouchers') }}</a>
                </div>
            </div>
            <div class=" text-center">
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
        <div class="contenerdor2">
        @foreach($vouchers as $voucher)
        
            <div class="precios">
                <div class="conttenedorImg">
                    <img src="data:image/png;base64,{{$voucher->voucher}}" width="100%" height=auto alt="">
                </div>
                <div class="card-body">
                    <h5 class="card-title">@lang('Information')</h5>
                    <strong><b> @lang('Payment name'):</b></strong>
                    <p class="card-text">{{$voucher->bills->name}}</p>
                </div>
            </div>
        
        @endforeach
        </div>
    </div>
    @include('layouts.footers.auth')
</div>
@endsection