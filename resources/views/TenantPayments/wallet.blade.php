@extends('layouts.app')

@section('content')
@include('layouts.headers.page')
<div class="container-fluid mt-7">
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row">
                        <div class="col-8">
                            <h3 class="mb-0">{{__('Wallet')}}</h3>
                            {{-- <a href="{{ route('tenantpayments.create')}}" class="btn btn-sm btn-primary mt-3 text-center">{{ __('Create expense payment') }}</a> --}}
                        </div>
                        {{-- <div class="col-4 text-right">
                            <button type="button" class="btn btn-sm btn-primary mt-3 text-center" data-bs-toggle="modal" data-bs-target="#modalPDF">
                                {{ __('Generate PDF') }}
                              </button>
                        </div> --}}
                    </div>
                </div> 
                <center>
                    <img style="width: 60%" src="{{ asset('argon') }}/img/Credit-Card-PNG-Image.png" alt="">
                </center>       
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                    <h3 style="width: 98%; text-align: right; font-family: Arial, Helvetica, sans-serif; margin:0; padding:0;">Total: ${{getAmount($sumAmounts, 2)}}</h4>
                        
                    </nav>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footers.auth')
</div>

@endsection