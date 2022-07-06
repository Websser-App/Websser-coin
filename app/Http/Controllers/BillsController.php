<?php

namespace App\Http\Controllers;

use App\Models\Bills;
use App\Models\Building;
use App\Models\Depataments;
use App\Models\TenantPayments;
use App\Models\Tenants;
use Illuminate\Http\Request;
use DB;

class BillsController extends Controller
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
        $bills = Bills::where('user_id', auth()->user()->id)->get();
        return view('bills.index')->with('bills', $bills);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $buildings = Building::where('user_id', auth()->user()->id)->get();
        return view('bills.create')->with('buildings', $buildings);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'user_id' => 'required',
                'building_id' => 'required',
                'name' => 'required',
                'amount' => 'required',
            ]);
        $bills = new Bills();
        $bills->user_id = $request->user_id;
        $bills->building_id = $request->building_id;
        $bills->name = $request->name;
        $bills->amount = $request->amount;
        $bills->save();
        return redirect('bills')->with('message', __('Expenses added successfully'));
        } catch (\Exception $e) {
            return  redirect('bills')->with('message',$e->getMessage());
        }
    }

    public function tenants($id){
        $bills = Bills::find($id);
        $tenants = Tenants::leftjoin('tenant_payments', function($query) use($bills){
            $query->on('tenant_payments.tenants_id', 'tenants.id');
            $query->where('tenant_payments.bills_id', $bills->id);
        })->where('tenants.building_id', $bills->building_id)->where('tenants.user_id', auth()->user()->id)->select('tenants.*','tenant_payments.*', 'tenant_payments.id as payments_id')->get();
        $tenantsCount = count(Tenants::leftjoin('tenant_payments', function($query) use($bills){
            $query->on('tenant_payments.tenants_id', 'tenants.id');
            $query->where('tenant_payments.bills_id', $bills->id);
        })->where('tenants.building_id', $bills->building_id)->where('tenants.user_id', auth()->user()->id)->select('tenants.*','tenant_payments.*', 'tenant_payments.id as payments_id')->get());
        $tenantsSum = Tenants::leftjoin('tenant_payments', function($query) use($bills){
            $query->on('tenant_payments.tenants_id', 'tenants.id');
            $query->where('tenant_payments.bills_id', $bills->id);
        })->where('tenants.building_id', $bills->building_id)->where('tenants.user_id', auth()->user()->id)->select('tenants.*','tenant_payments.*', 'tenant_payments.id as payments_id')->get()->sum('amount');
        return view('bills.tenants')->with('tenants', $tenants)->with('bills', $bills)->with('tenantsCount', $tenantsCount)->with('tenantsSum', $tenantsSum);
    }

    public function paid(Request $request, $id){
        try {
            $this->validate($request, [
                'user_id' => 'required',
                'amount' => 'required',
            ]);

                $bills = Bills::find($request->bills_id);
                if($request->payments_id){
                    $tenantpayments = TenantPayments::find($request->payments_id);
                    $tenantpayments->amount = $bills->amount;
                    $tenantpayments->save();
                } else {
                    $departaments = Depataments::find($id);
                    $tenantpayments = new TenantPayments();
                    $tenantpayments->user_id = $request->user_id;
                    $tenantpayments->buildings_id  = $departaments->building_id ;
                    $tenantpayments->depataments_id  = $departaments->id;
                    $tenantpayments->tenants_id  = $departaments->tenants->id;
                    $tenantpayments->bills_id  = $request->bills_id;
                    $tenantpayments->amount = $bills->amount;
                    $tenantpayments->save();
                }  
        return redirect()->route('bills.tenants', $request->bills_id)->with('message', __('The payment was accepted successfully'));
        } catch (\Exception $e) {
            return  redirect('bills.tenants', $request->bills_id)->with('message',$e->getMessage());
        }
    }


    public function notPayed(Request $request, $id) {
            $tenantpayments = TenantPayments::find($id);
            $tenantpayments->amount = $request->amount;
            $tenantpayments->save();
            return redirect()->route('bills.tenants', $tenantpayments->bills_id)->with('message', __('The payment was accepted successfully'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bills  $bills
     * @return \Illuminate\Http\Response
     */
    public function show(Bills $bills)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bills  $bills
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bills = Bills::find($id);
        $buildings = Building::where('user_id', auth()->user()->id)->get();
        return view('bills.edit')->with('bills', $bills)->with('buildings', $buildings);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bills  $bills
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $this->validate($request, [
                'name' => 'required',
                'amount' => 'required',
            ]);
        $bills = Bills::find($id);
        TenantPayments::where('bills_id', $id)->update([
            'amount' => '0'
        ]);
        if($request->building_id){
            $bills->building_id = $request->building_id;
        }
        $bills->name = $request->name;
        $bills->amount = $request->amount;
        $bills->save();
        return redirect('bills')->with('message', __('Expenses Updated successfully'));
        } catch (\Exception $e) {
            return  redirect('bills')->with('message',$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bills  $bills
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bills = Bills::find($id);
        $bills->delete();
        return redirect('bills')->with('message', __('Successfully removed expenses'));
    }
}
