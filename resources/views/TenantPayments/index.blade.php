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
                            <h3 class="mb-0">{{__('Expense report')}}</h3>
                            {{-- <a href="{{ route('tenantpayments.create')}}" class="btn btn-sm btn-primary mt-3 text-center">{{ __('Create expense payment') }}</a> --}}
                        </div>
                        <div class="col text-right">
                            <button type="button" class="btn btn-sm btn-primary mt-3 text-center buttons" style="text-align: center;" data-bs-toggle="modal" data-bs-target="#modalPDF">
                                
                                <label class="textoaD">{{ __('Generate PDF') }} </label>
                                <i class="ni ni-cloud-download-95 iconoD " ></i>
                              </button>
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
                                <th scope="col" style="font-size: 13px;">@lang('Bulding')</th>
                                <th scope="col" style="font-size: 13px;">@lang('Departament')</th>
                                <th scope="col" style="font-size: 13px;">@lang('Tenant name')</th>
                                <th scope="col" style="font-size: 13px;">@lang('Expense name')</th>
                                <th scope="col" style="font-size: 13px;">@lang('Amount')</th>
                                <th scope="col" style="font-size: 13px;">@lang('IsActive')</th>
                                <th scope="col" style="font-size: 13px;">@lang('Expense date')</th>



                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tenantPayments as $tenantPayment)
                        <tr>
                            <td style="font-size: 13px;">{{$tenantPayment->buildings->UUID}}</td>
                            <td style="font-size: 13px;">{{$tenantPayment->departaments->number_departament}}</td>
                            <td style="font-size: 13px;">{{$tenantPayment->tenants->name}} {{$tenantPayment->tenants->surname}} {{$tenantPayment->tenants->second_surname}}</td>
                            <td style="font-size: 13px;">{{$tenantPayment->bills->name}}</td>
                            @if ($tenantPayment->amount == 0)    
                                <td style="font-size: 13px;">${{getAmount($tenantPayment->amount,2)}}</td>
                                <td class="bg-danger" style="font-size: 15px;">@lang('Not payed')</td>
                            @else
                                <td style="font-size: 13px;">${{getAmount($tenantPayment->amount,2)}}</td>
                                <td class="bg-success" style="font-size: 15px;">@lang('Paid')</td>
                            @endif
                            <td style="font-size: 13px;">{{$tenantPayment->created_at->format('d-m-Y')}}</td>
                        @endforeach
                    </tbody>
                </table>
                </div>
                <div style="text-align: right; width: auto; height: auto; black; margin: 0;">
                    <h3 style="width: 98%; text-align: right; font-family: Arial, Helvetica, sans-serif; margin:0; padding:0;">Total: ${{getAmount($sumAmounts, 2)}}</h4>
                </div>
                <div class="card-footer py-4">
                    <nav class="d-flex justify-content-end" aria-label="...">
                        
                    </nav>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footers.auth')
</div>

<!-- Modal -->
<div class="modal fade" id="modalPDF" tabindex="-1" aria-labelledby="modalPDFLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalPDFLabel">@lang('Generate PDF')</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form  action="{{route('tenantpayments.chooseBills')}}" method="POST">
                @csrf
                <div class="input-group right">
                    <select class="custom-select" id="inputGroupSelect04" name="building_id">
                        <option selected>@lang('Choose the building')</option>
                            @foreach ($buildings as $building)
                                <option value="{{$building->id}}">{{$building->UUID}}</option>
                            @endforeach>
                    </select>
                    <div class="input-group-append right">
                        <button type="submit" class="btn btn-success">{{ __('Search') }}</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">@lang('Close')</button>
        </div>
      </div>
    </div>
  </div>
@endsection