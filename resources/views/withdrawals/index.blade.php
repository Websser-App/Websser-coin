@extends('layouts.app')

@section('content')
@include('layouts.headers.page')
<style>
        .buttons{
            
            font-size: 140%;
            
        }
        .row{
            width: 99%;
            display: flex;
            grid-template-columns: repeat(3, auto);
            padding: 0 40px;
            gap: 0px;
            align-items: center;
        }
        @media only screen and (max-width: 893px) {
            .textoaD {
                display: none;
            }
            .iconoD {
                margin-right:10px;
            }
        }

        @media only screen and (min-width: 892px) {
            .iconoD {
                display: none;
            }
        }
        button{
            text-align: center;
        }
    </style>
<div class="">
    <div class="">
        <div class="col" style="margin-top: 10%; text-align: center;">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row">
                        <div class="container" style="word-break: normal;">
                            <h3 class="mb-0">{{__('Reporte de Pagos')}}</h3>
                            {{-- <a href="{{ route('tenantpayments.create')}}" class="btn btn-sm btn-primary mt-3 text-center">{{ __('Create expense payment') }}</a> --}}
                        </div>
                        <div class="col text-right">
                            
                        </div>
                    </div>
                </div>
                
                <div class="col-12">
                                        </div>
                @if(Session::has('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ Session::get('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="table-responsive">
                    <table id="tablelistTenantsPayments" class="table align-items-center table-flush">

                        <thead class="thead-light">
                            <tr>
                                <th scope="col" style="font-size: 13px;">@lang('Contact name')</th>
                                <th scope="col" style="font-size: 13px;">@lang('Contact aliases')</th>
                                <th scope="col" style="font-size: 13px;">@lang('Contact account')</th>
                                <th scope="col" style="font-size: 13px;">@lang('Retired amount')</th>



                            </tr>
                        </thead>
                        <tbody>
                            @foreach($withdrawals as $withdrawal)
                        <tr>
                            <td style="font-size: 13px;">{{$withdrawal->contact->fullname}}</td>
                            <td style="font-size: 13px;">{{$withdrawal->contact->alias}}</td>
                            <td style="font-size: 13px;">{{$withdrawal->contact->key_account}}</td>
                            <td style="font-size: 13px;">${{getAmount($withdrawal->amount, 2)}}</td>
                        @endforeach
                    </tbody>
                </table>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                        
                    </nav>
                </div>
            </div>
        </div>
    </div>
   
</div>
@include('layouts.footers.auth')

@endsection