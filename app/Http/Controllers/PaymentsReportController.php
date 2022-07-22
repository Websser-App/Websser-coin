<?php

namespace App\Http\Controllers;


use App\Models\Bills;
use App\Models\Building;
use App\Models\Depataments;
use App\Models\TenantPayments;
use App\Models\Tenants;

class PaymentsReportController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buildings = Building::where('user_id', auth()->user()->id)->get();
        TenantPayments::where('depataments_id', null)->delete();
        $tenantPayments = TenantPayments::where('user_id', auth()->user()->id)->get();
        $sumAmounts = TenantPayments::where('isActive', 1)->where('user_id', auth()->user()->id)->sum('amount');
        return view('PaymentReport.index')->with('buildings', $buildings)->with('tenantPayments', $tenantPayments)->with('sumAmounts', $sumAmounts);
    }
}