<style>
    .btn-primary{
        width:fit-content;
        height: 40%;
        
    }
    .textoaD{
        font-size: 120%;
    }

    .precios{
        font-size: 150%;
        text-align: center;
        
        background-color: white;
        border-radius: 25px;
    }
    .contenerdor2{
        display: grid;
        gap: 1rem;
        grid-auto-rows: 25rem;
        grid-template-columns:repeat(auto-fit, minmax(15rem, 1fr));
        margin-left: 5%;
        margin-right: 5%;
        margin-top: 5%;
    }

    @media only screen and (max-width: 680px) {
        .textoaD {
            display: none;
        }
    }

    @media only screen and (min-width: 680px) {
        .iconoD {
            display: none;
        }
    }
</style>

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
                <div class=" text-right">
                    <a href="{{ route('bills.create')}}" class="buttons btn btn-sm btn-primary " >
                        <label class="iconoD"><i class="ni ni-money-coins text-white" style="color: #f4645f; font-size: 20px;"></i></label>
                        <label class="textoaD">{{ __('Create expense concept') }}</a>
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
    </div>
    <div class= "contenerdor2">
        @foreach($bills as $bill)
            <div class="">
                <div class="precios">
                    <img src="{{asset('argon')}}\img\concepgastos.png" width="100px" height="100px" alt=""></img>
                    <div align="right"> 
                        <div class="dropdown">
                            <a class="btn btn-sm btn-icon-only text-primary btnI" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                <a class="dropdown-item" href="{{ route('bills.edit', $bill->id) }}">{{__('Edit')}}</a>
                                <form action="{{ route('bills.destroy', $bill->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <input type="submit" class="dropdown-item" value="{{__('Delete')}}">
                                </form>
                            </div>
                        </div>
                    </div>
                    <a href="{{route('bills.tenants', $bill->id )}}" class="card-body">
                        <h5 class="card-title">@lang('Information')</h5>
                        <strong><b> @lang('Name'):</b></strong>
                        <p class="card-text">{{$bill->name}}</p>
                        <strong><b>@lang('Amount'):</b></strong>
                        <p class="card-text">${{getAmount($bill->amount, 2)}}</p>

                    </a>
                </div>
            </div>
        @endforeach
        
    </div>
</div>
@include('layouts.footers.auth')
@endsection