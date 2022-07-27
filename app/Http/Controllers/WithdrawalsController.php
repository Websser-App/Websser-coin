<?php

namespace App\Http\Controllers;

use App\Models\TenantPayments;
use App\Models\Withdrawals;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Session;

class WithdrawalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Withdrawals::where('status', 0)->delete();
        $withdrawals = Withdrawals::where('user_id', auth()->user()->id)->get();
        return view('withdrawals.index')->with('withdrawals', $withdrawals);
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
                'contact_id' => 'required',
                'amount' => 'required',

            ]);
            $sumAmounts = TenantPayments::where('isActive', 1)->where('user_id', auth()->user()->id)->get()->sum('amount');
            $sumWithdrawals = Withdrawals::where('user_id', auth()->user()->id)->where('status', 1)->get()->sum('amount');

            if($request->amount <= ($sumAmounts-$sumWithdrawals)){
                $withdrawals = new Withdrawals();
                $withdrawals->user_id = auth()->user()->id;
                $withdrawals->contact_id = $request->contact_id;
                $withdrawals->amount = $request->amount;
                $withdrawals->code = mt_rand(0, 999999);
                $withdrawals->save();

                $url = "https://apps.ecdevelopment.mx/SmsEngine/Services/SmsEngine.svc/SMSRequest";
                Http::post($url, [
                    "security" => [
                        "AppId" => 6,
                        "Time" => "1634093106",
                        "Hash" => "41d7c1734734ff80b12d02a3a961af51",
                        "Encode" => "2"
                    ],
                    "message" => [
                        "SiteId" => "SMS",
                        "Cellphone" => auth()->user()->phone,
                        "Message"=> "Tu código de verificacion es: $withdrawals->code",
                        "Encode" => "2"
        
                    ]
                ]);
                Session::flash('message', __('An SMS was sent to the administrators number'));
                return view('Tenantpayments.validate')->with('withdrawals', $withdrawals)->with('message', __('An SMS was sent to the administrators number'));
            } else {
                return redirect('tenantpayments/wallet')->with('message', __('You do not have enough balance in your wallet'));
            }

        } catch (\Exception $e) {
            return redirect('tenantpayments/wallet')->with('message',$e->getMessage());
        }
    }

    public function validationWithdrawals(Request $request, $id){
        try {
            $this->validate($request, [
                'code' => 'required',

            ]);
            $withdrawals = Withdrawals::find($id);

            if($request->code == $withdrawals->code){
                $withdrawals->status = 1;
                $withdrawals->save();
                return redirect('tenantpayments/wallet')->with('message', __('The withdrawal was successful'));
            } else {
                return redirect('tenantpayments/wallet')->with('message', __('Failed to withdraw'));
            }

        } catch (\Exception $e) {
            return redirect('tenantpayments/wallet')->with('message', __('Failed to withdraw'));
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
