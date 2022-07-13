<?php

namespace App\Http\Controllers;

use App\Models\TenantPayments;
use App\Models\Withdrawals;
use Illuminate\Http\Request;

class WithdrawalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    
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
                'amount' => 'required',

            ]);
            $sumAmounts = TenantPayments::where('isActive', 1)->where('user_id', auth()->user()->id)->get()->sum('amount');
            $sumWithdrawals = Withdrawals::where('user_id', auth()->user()->id)->get()->sum('amount');

            if($request->amount <= ($sumAmounts-$sumWithdrawals)){
                $withdrawals = new Withdrawals();
                $withdrawals->user_id = auth()->user()->id;
                $withdrawals->amount = $request->amount;
                $withdrawals->save();
                return redirect('tenantpayments/wallet')->with('message', __('The withdrawal was successful'));
            } else {
                return redirect('tenantpayments/wallet')->with('message', __('You do not have enough balance in your wallet'));
            }

        } catch (\Exception $e) {
            return redirect('tenantpayments/wallet')->with('message',$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Withdrawals  $withdrawals
     * @return \Illuminate\Http\Response
     */
    public function show(Withdrawals $withdrawals)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Withdrawals  $withdrawals
     * @return \Illuminate\Http\Response
     */
    public function edit(Withdrawals $withdrawals)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Withdrawals  $withdrawals
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Withdrawals $withdrawals)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Withdrawals  $withdrawals
     * @return \Illuminate\Http\Response
     */
    public function destroy(Withdrawals $withdrawals)
    {
        //
    }
}
