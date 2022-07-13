@extends('layouts.app')

@section('content')
@include('layouts.headers.page')
<style>
    .buttons{
        width:270px;
        height: 40px;
        font-size: 55px;
    }
    .row3{
        width: 99%;
        display: flex;
        grid-template-columns: repeat(3, auto);
        padding: 0 40px;
        gap: 0px;
        align-items: center;
    }
    .contenerdor2{
        
        justify-content: ;
        margin-bottom: 20%;
        display: grid;
        gap:2rem;
        grid-auto-rows: 28rem;
        grid-template-columns:repeat(auto-fill, minmax(15rem, 1fr));
        margin-left: 5%;
        margin-right: 5%;
        
    }
    .paraPagar{
        background-color: green;
        color: white;
    }
    .precios{
        border-radius: 20px;
        font-size: 100%;
        text-align: center;
        height: 100%;
        background-color: white;
        
    }
</style>
<div class="container-fluid mt-7">
    <div class="row">
        <h3 class="mb-0">{{__('List of expense payments')}}</h3>
        {{-- <a href="{{ route('tenantpayments.create')}}" class="btn btn-sm btn-primary mt-3 text-center">{{ __('Create expense payment') }}</a> --}}

        <nav class="d-flex justify-content-end" aria-label="...">
            <h3 style="width: 98%; text-align: right; font-family: Arial, Helvetica, sans-serif; margin:0; padding:0;">Total a pagar: ${{getAmount((($bills->amount * $tenantsCount)-$tenantsSum), 2)}}</h4>
        </nav>
        @if(Session::has('message'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ Session::get('message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        
        <div class="contenerdor2">
            
                @foreach($tenants as $tenant)
                    @if($tenant->amount)
                    <div class="precios" style="border: 1px solid green">
                        <button title="@lang('Not payed')" class="btn btn-sm text-danger"  data-bs-toggle="modal"  data-bs-target="#notPayedModal{{ $tenant->payments_id }}" data-id="{{ $tenant->payments_id }}">
                            <i style="font-size: 20px" class="bi bi-file-minus"></i>
                        </button>
                        <a title="@lang('Generate payment receipt')" href="{{route('paymentReport', $tenant->id)}}" class="btn btn-sm text-blue">
                            <i style="font-size: 20px" class="bi bi-file-arrow-down"></i>
                        </a>
                        <a title="@lang('Send receipt by mail')" href="{{route('sendEmail', $tenant->id)}}" class="btn btn-sm text-primary">
                            <i style="font-size: 20px" class="bi bi-envelope"></i>
                        </a>
                        <h1>${{getAmount($tenant->amount,2)}}</h1>
                        <p class="card-title">@lang('Amount')</p>
                        <h1 class="bg-success" >@lang('Paid')</h1>
                    
                            <p class="card-title">@lang('Information')</p>

                            <strong><b>@lang('Departament'):</b></strong>
                            <p class="card-title">{{$tenant->departaments->number_departament}}</p>

                            <strong><b> @lang('Tenant name'):</b></strong>
                            <p class="card-title">{{$tenant->name}} {{$tenant->surname}} {{$tenant->second_surname}}</p>

                            <strong><b>@lang('Expense name'):</b></strong>
                            <p class="card-title">{{$bills->name}}</p>

                            <strong><b>@lang('Expense date'):</b></strong>
                            <p class="card-title">{{$tenant->created_at->format('d-m-Y')}}</p>    

                        
                        <!-- Modal -->
                        <div class="modal fade" id="notPayedModal{{ $tenant->payments_id }}" tabindex="-1" role="dialog" aria-labelledby="notPayedModal{{ $tenant->payments_id }}" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">@lang('Address')</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <center>
                                        <form action="{{route('bills.notPayed', $tenant->payments_id)}}" method="POST">
                                            @csrf
                                            <input type="hidden" value="{{auth()->user()->id}}" name="user_id">

                                            <div class="col-md-6">
                                                <label for="amount" class="form-label text-center">@lang('Amount')</label>
                                                <input type="text" class="form-control text-center" id="amount" name="amount" value="$0" placeholder="@lang('Amount')" readonly required>
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
                    </div> 
                    @elseif(!$tenant->amount || $tenant->amount == 0)
                    <div class="precios" style="border: 1px solid red">
                        <button title="@lang('Pay')" class="btn btn-sm text-success " data-bs-toggle="modal"  data-bs-target="#successModal{{ $tenant->departaments->id }}" data-id="{{ $tenant->departaments->id }}">
                            <i style="font-size: 20px" class="bi bi-file-plus "></i>
                        </button>

                        
                        <h1>$0</h1>
                        <p class="card-title">@lang('Amount')</p>
                        <h1 class="bg-danger">@lang('Not payed')</h1>
                        
                        <p class="card-title">@lang('Information')</p>

                        <strong><b>@lang('Departament'):</b></strong>
                        <p class="card-title">{{$tenant->departaments->number_departament}}</p>

                        <strong><b> @lang('Tenant name'):</b></strong>
                        <p class="card-title">{{$tenant->name}} {{$tenant->surname}} {{$tenant->second_surname}}</p>

                        <strong><b>@lang('Expense name'):</b></strong>
                        <p class="card-title">{{$bills->name}}</p>  
                        
                        <strong><b>@lang('Expense date'):</b></strong>
                        <p class="card-title"> - </p>  
                        
                        <!-- Modal -->
                        <div class="modal fade" id="successModal{{ $tenant->departaments->id }}" tabindex="-1" role="dialog" aria-labelledby="successModal{{ $tenant->departaments->id }}" aria-hidden="true">
                            <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">@lang('Address')</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <center>
                                        <form action="{{route('bills.paid', $tenant->departaments->id)}}" method="POST">
                                            @csrf
                                            <input type="hidden" value="{{auth()->user()->id}}" name="user_id">

                                            <input type="hidden" name="payments_id" value="{{$tenant->payments_id}}">
                                            <input type="hidden" name="bills_id" value="{{$bills->id}}">
                                            <div class="col-md-6">
                                                <label for="amount" class="form-label text-center">@lang('Amount')</label>
                                                <input type="text" class="form-control text-center" id="amount" name="amount" value="${{$bills->amount}}" placeholder="@lang('Amount')" required readonly>
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
                    </div> 
                    @endif

                    
                @endforeach
            
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row">
                        <div class="col-8">
                            <h3 class="mb-0">{{__('List of expense payments')}}</h3>
                            {{-- <a href="{{ route('tenantpayments.create')}}" class="btn btn-sm btn-primary mt-3 text-center">{{ __('Create expense payment') }}</a> --}}
                        </div>
                        <div class="card-footer py-4">
                            <nav class="d-flex justify-content-end" aria-label="...">
                            <h3 style="width: 98%; text-align: right; font-family: Arial, Helvetica, sans-serif; margin:0; padding:0;">Total a pagar: ${{getAmount((($bills->amount * $tenantsCount)-$tenantsSum), 2)}}</h4>
                                
                            </nav>
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
                                <th scope="col">@lang('Departament')</th>
                                <th scope="col">@lang('Tenant name')</th>
                                <th scope="col">@lang('Expense name')</th>
                                <th scope="col">@lang('Amount')</th>
                                <th scope="col">@lang('IsActive')</th>
                                <th scope="col">@lang('Actions')</th>


                            </tr>
                        </thead>
                        @foreach($tenants as $tenant)
                            <tr>
                                <td>{{$tenant->departaments->number_departament}}</td>
                                <td>{{$tenant->name}} {{$tenant->surname}} {{$tenant->second_surname}}</td>
                                <td>{{$bills->name}}</td>
                                @if($tenant->amount)
                                    <td>${{getAmount($tenant->amount,2)}} 5</td>
                                    <td class="bg-success">@lang('Paid')</td>
                                    <td>
                                        <button title="@lang('Not payed')" class="btn btn-sm text-danger"  data-bs-toggle="modal"  data-bs-target="#notPayedModal{{ $tenant->payments_id }}" data-id="{{ $tenant->payments_id }}">
                                            <i style="font-size: 20px" class="bi bi-file-minus"></i>
                                        </button>
                                        <a title="@lang('Generate payment receipt')" class="btn btn-sm text-blue">
                                            <i style="font-size: 20px" class="bi bi-file-arrow-down"></i>
                                        </a>
                                        <a title="@lang('Send receipt by mail')" class="btn btn-sm text-primary">
                                            <i style="font-size: 20px" class="bi bi-envelope"></i>
                                        </a>
                                    </td>
                                    <!-- Modal -->
                                    <div class="modal fade" id="notPayedModal{{ $tenant->payments_id }}" tabindex="-1" role="dialog" aria-labelledby="notPayedModal{{ $tenant->payments_id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">@lang('Address')</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <center>
                                                    <form action="{{route('bills.notPayed', $tenant->payments_id)}}" method="POST">
                                                        @csrf
                                                        <input type="hidden" value="{{auth()->user()->id}}" name="user_id">

                                                        <div class="col-md-6">
                                                            <label for="amount" class="form-label text-center">@lang('Amount')</label>
                                                            <input type="text" class="form-control text-center" id="amount" name="amount" value="0" placeholder="@lang('Amount')" readonly required>
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
                                @elseif(!$tenant->amount || $tenant->amount == 0)
                                    <td>$0</td>
                                    <td class="bg-danger">@lang('Not payed')</td>
                                    <td>
                                        <button title="@lang('Pay')" class="btn btn-sm text-success" data-bs-toggle="modal"  data-bs-target="#successModal{{ $tenant->departaments->id }}" data-id="{{ $tenant->departaments->id }}">
                                            <i style="font-size: 20px" class="bi bi-file-plus"></i>
                                        </button>
                                    </td>
                                    <!-- Modal -->
                                    <div class="modal fade" id="successModal{{ $tenant->departaments->id }}" tabindex="-1" role="dialog" aria-labelledby="successModal{{ $tenant->departaments->id }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">@lang('Address')</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <center>
                                                    <form action="{{route('bills.paid', $tenant->departaments->id)}}" method="POST">
                                                        @csrf
                                                        <input type="hidden" value="{{auth()->user()->id}}" name="user_id">

                                                        <input type="hidden" name="payments_id" value="{{$tenant->payments_id}}">
                                                        <input type="hidden" name="bills_id" value="{{$bills->id}}">
                                                        <div class="col-md-6">
                                                            <label for="amount" class="form-label text-center">@lang('Amount')</label>
                                                            <input type="text" class="form-control text-center" id="amount" name="amount" value="{{$bills->amount}}" placeholder="@lang('Amount')" required readonly>
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
                            </tr>
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
    @include('layouts.footers.auth')
</div>
@endsection