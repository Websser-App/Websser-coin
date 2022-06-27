<!DOCTYPE html>
<html lang="en" style="margin: 30px 10px">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Pago de gastos</title>
</head>
<body >
    <div style="width: 100%; height: 97%; background-color: #FFFFFF; border-radius: 5px; border: 1px solid #000000;">
        <h1 style="background-color: #000000; width: 97.5%; height: auto; color: #FFFFFF; text-align: center; font-family: Arial; padding: 16px; border-top-left-radius: 5px; border-top-right-radius: 5px; margin-top: 0px;">Pago de gastos</h1>
            <div class="table-responsive" style="margin-top: -25px">
                <table style="width: 100%; text-align: center; font-family: Arial, Helvetica, sans-serif; padding: 0 5px; margin-top: 0">
                    <thead  style="border-bottom: 1px solid #000000">
                        <tr>
                            <th>Edificio</th>
                            <th>Departamento</th>
                            <th>Nombre de inquilino</th>
                            <th>Nombre de gasto</th>
                            <th>Monto</th>
                            <th>Actividad</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tenants as $tenant) 
                            @if(!$tenant->tenantPayments)
                            <tr>
                                <td>{{$tenant->departaments->UUID}}</td>
                                <td>{{$tenant->departaments->number_departament}}</td>
                                <td>{{$tenant->name}} {{$tenant->surname}} {{$tenant->second_surname}}</td>
                                <td>{{$bills->name}}</td>
                                <td>$0</td>
                                <td class="bg-danger">@lang('Not payed')</td>
                            </tr>
                            @elseif($tenant->tenantPayments->bills == $bills)
                                <tr>
                                    <td>{{$tenant->tenantPayments->buildings->UUID}}</td>
                                    <td>{{$tenant->tenantPayments->departaments->number_departament}}</td>
                                    <td>{{$tenant->tenantPayments->tenants->name}} {{$tenant->tenantPayments->tenants->surname}} {{$tenant->tenantPayments->tenants->second_surname}}</td>
                                    <td>{{$tenant->tenantPayments->bills->name}}</td>
                                    <td>${{getAmount($tenant->tenantPayments->amount,2)}}</td>
                                    <td class="bg-success">@lang('Paid')</td>
                                </tr>    
                            @else
                                <tr>
                                    <td>{{$tenant->departaments->UUID}}</td>
                                    <td>{{$tenant->departaments->number_departament}}</td>
                                    <td>{{$tenant->name}} {{$tenant->surname}} {{$tenant->second_surname}}</td>
                                    <td>{{$bills->name}}</td>
                                    <td>$0</td>
                                    <td class="bg-danger">@lang('Not payed')</td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
                <div style="border-bottom: 1px solid #000000"></div>
                <div style="text-align: right; width: auto; height: auto; border: 3px solid black; margin: 0;">
                    <h3 style="width: 98%; text-align: right; font-family: Arial, Helvetica, sans-serif; margin:0; padding:0;">Total</h4>
                    <h5 style="width: 100%; text-align: right; font-family: Arial, Helvetica, sans-serif; margin:0; padding:0;">${{getAmount($sumAmounts, 2)}}</h5>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
    