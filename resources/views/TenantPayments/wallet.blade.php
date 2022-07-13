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
                            {{-- <a href="" class="btn btn-sm btn-primary mt-3 text-center">{{ __('Create expense payment') }}</a> --}}
                        </div>
                        @if(Session::has('message'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ Session::get('message') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
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
                    <h3 style="width: 98%; text-align: right; font-family: Arial, Helvetica, sans-serif; margin:0; padding:0;">Total: ${{getAmount(($sumAmounts-$sumWithdrawals), 2)}}</h4>
                        
                    </nav>
                </div>
                @if(($sumAmounts-$sumWithdrawals) > 0)
                    <button class="btn btn-sm btn-primary mt-3 text-center" data-bs-toggle="modal"  data-bs-target="#withdrawals">{{ __('Retirar dinero') }}</button>
                    <!-- Modal -->
                    <div class="modal fade" id="withdrawals" tabindex="-1" role="dialog" aria-labelledby="withdrawals" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">@lang('Address')</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <center>
                                    <form action="{{route('withdrawals.store')}}" method="POST">
                                        @csrf
                                        <div class="col-md-6">
                                            <label for="amount" class="form-label text-center">@lang('Amount')</label>
                                            <input type="text" class="form-control text-center" id="amount" name="amount" placeholder="@lang('Amount')" required>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                        </div>
                                    </form>
                                </center>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('Close')</button>
                            </div>
                        </div>
                        </div>
                    </div> 
                @endif
            </div>
        </div>
    </div>
    @include('layouts.footers.auth')
</div>

@endsection