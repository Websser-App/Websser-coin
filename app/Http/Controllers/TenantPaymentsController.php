<?php

namespace App\Http\Controllers;

use App\Models\Bills;
use App\Models\Building;
use App\Models\Contacts;
use App\Models\Depataments;
use App\Models\TenantPayments;
use App\Models\Tenants;
use App\Models\Withdrawals;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;
use PDF;

class TenantPaymentsController extends Controller
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
        return view('TenantPayments.index')->with('buildings', $buildings)->with('tenantPayments', $tenantPayments)->with('sumAmounts', $sumAmounts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $buildings = Building::all();
        return view('TenantPayments.create')->with('buildings', $buildings);
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
            ]);
            


            $tenantPayments = new TenantPayments();
            $tenantPayments->user_id = $request->user_id;
            $tenantPayments->buildings_id = $request->building_id;
            $tenantPayments->save();

            $departaments = Depataments::where('building_id', $request->building_id)->get();
            $bills = Bills::where('building_id', $request->building_id)->get();
            return view('TenantPayments.completePayment', compact('departaments', 'bills'))->with('message', __('Payment added successfully'));
        } catch (\Exception $e) {
            return redirect('tenantpayments')->with('message',$e->getMessage());
        }
    }

    public function storeDepartament(Request $request)
    {
        try {
            $this->validate($request, [
                'departament_id' => 'required',
                'bill_id' => 'required',
                'amount' => 'required'

            ]);

            $departaments = Depataments::where('id', $request->departament_id)->first();
            $tenants = Tenants::where('depatament_id', $request->departament_id)->first();
            if(empty($tenants)){
                return redirect('tenantpayments')->with('message', __('There is no tenant in this apartment'));
            }
            $tenantPayments = TenantPayments::where('buildings_id', $departaments->building_id)->where('depataments_id', null)->first();
            $tenantPayments->depataments_id = $request->departament_id;
            $tenantPayments->tenants_id = $tenants->id;
            $tenantPayments->bills_id = $request->bill_id;
            $tenantPayments->amount = $request->amount;
            $tenantPayments->save();
            
            return redirect('tenantpayments')->with('message', __('Payment added successfully'));
        } catch (\Exception $e) {
            var_dump($e->getMessage());
            die();               
            return redirect('tenantpayments')->with('message',$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TenantPayments  $tenantPayments
     * @return \Illuminate\Http\Response
     */
    public function show(TenantPayments $tenantPayments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TenantPayments  $tenantPayments
     * @return \Illuminate\Http\Response
     */
    public function edit(TenantPayments $tenantPayments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TenantPayments  $tenantPayments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TenantPayments $tenantPayments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TenantPayments  $tenantPayments
     * @return \Illuminate\Http\Response
     */
    public function destroy(TenantPayments $tenantPayments)
    {
        //
    }

    public function chooseBills(Request $request){
        try {
            $this->validate($request, [
                'building_id' => 'required',
            ]);
        $bills = Bills::where('building_id', $request->building_id)->get();
        return view('TenantPayments.chooseBills')->with('bills', $bills);
        } catch (\Exception $e) {         
            return redirect('tenantpayments')->with('message',$e->getMessage());
        }
    }

    public function generatePDF(Request $request){
        try {
            $this->validate($request, [
                'bill_id' => 'required',
            ]);

            $bills = Bills::find($request->bill_id);
            $sumAmounts = TenantPayments::where('bills_id', $bills->id)->where('buildings_id', $bills->building_id)->where('user_id', auth()->user()->id)->where('isActive', 1)->sum('amount');
            $tenants = Tenants::leftjoin('tenant_payments', function($query) use($bills){
                $query->on('tenant_payments.tenants_id', 'tenants.id');
                $query->where('tenant_payments.buildings_id', $bills->building_id);
            })->where('tenants.building_id', $bills->building_id)->where('tenants.user_id', auth()->user()->id)->select('tenants.*','tenant_payments.*', 'tenant_payments.id as payments_id')->get();
            view()->share ('bills', $bills);
            view()->share('tenants', $tenants);
            view()->share('sumAmounts', $sumAmounts);
            $pdf = PDF ::loadView ('TenantPayments.pdf.reportAllPDF', ['bills' => $bills, 'tenants' => $tenants, 'sumAmounts' => $sumAmounts, 'bills' => $bills]);
            return $pdf->download ('PaymentsReports.pdf');
            return redirect('tenantpayments')->with('message', __('PDF generated successfully')); 
            

        } catch (\Exception $e) {         
            return redirect('tenantpayments')->with('message',$e->getMessage());
        }
    }

    public function wallet(){
        // Withdrawals::each()->delete()w
        Withdrawals::where('status', 0)->delete();
        $sumAmounts = TenantPayments::where('isActive', 1)->where('user_id', auth()->user()->id)->get()->sum('amount');
        $sumWithdrawals = Withdrawals::where('user_id', auth()->user()->id)->where('status', 1)->get()->sum('amount');
        $contacts = Contacts::all();
        return view('TenantPayments.wallet')->with('sumAmounts', $sumAmounts)->with('sumWithdrawals', $sumWithdrawals)->with('contacts', $contacts);

    }
}
