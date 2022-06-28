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
                            <h3 class="mb-0">{{__('Expense report')}}</h3>
                            {{-- <a href="{{ route('tenantpayments.create')}}" class="btn btn-sm btn-primary mt-3 text-center">{{ __('Create expense payment') }}</a> --}}
                        </div>
                        <div class="col-4 text-right">
                            <button type="button" class="btn btn-sm btn-primary mt-3 text-center" data-bs-toggle="modal" data-bs-target="#modalPDF">
                                {{ __('Generate PDF') }}
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
                                <th scope="col">@lang('Bulding')</th>
                                <th scope="col">@lang('Departament')</th>
                                <th scope="col">@lang('Tenant name')</th>
                                <th scope="col">@lang('Expense name')</th>
                                <th scope="col">@lang('Amount')</th>
                                <th scope="col">@lang('IsActive')</th>
                                <th scope="col">@lang('Actions')</th>


                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tenantPayments as $tenantPayment)
                        <tr>
                            <td>{{$tenantPayment->buildings->UUID}}</td>
                            <td>{{$tenantPayment->departaments->number_departament}}</td>
                            <td>{{$tenantPayment->tenants->name}} {{$tenantPayment->tenants->surname}} {{$tenantPayment->tenants->second_surname}}</td>
                            <td>{{$tenantPayment->bills->name}}</td>
                            <td>${{getAmount($tenantPayment->amount,2)}}</td>
                            @if ($tenantPayment->isActive == 1)    
                                <td class="bg-success">@lang('Paid')</td>
                            @else
                                <td class="bg-danger">@lang('Not payed')</td>
                            @endif
                            <td class="text-right">
                                <div class="dropdown">
                                    <a class="btn btn-sm btn-icon-only text-primary" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                        <form action="{{ route('tenantpayments.destroy', $tenantPayment->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" class="dropdown-item" value="{{__('Delete')}}">
                                        </form>
                                    </div>
                                </div>
                            </td>
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