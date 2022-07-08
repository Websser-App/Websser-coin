<?php

namespace App\Http\Controllers;

use App\Models\Bills;
use App\Models\Voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
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
        $vouchers = Voucher::where('user_id', auth()->user()->id)->get();
        return view('bills.vouchers.index')->with('vouchers', $vouchers);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bills = Bills::where('user_id', auth()->user()->id)->get();
        return view('bills.vouchers.create')->with('bills', $bills);
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
                'bills_id' => 'required',
                'voucher' => 'required',
            ]);
            $vouchers = new Voucher();
            $vouchers->user_id = $request->user_id;
            $vouchers->bills_id = $request->bills_id;
            $voucher = file_get_contents($request->file('voucher'));
            $voucher = base64_encode($voucher);
            $vouchers->voucher = $voucher;
            $vouchers->save();
        return redirect('vouchers')->with('message', __('Expenses added successfully'));
        } catch (\Exception $e) {
            return  redirect('vouchers')->with('message',$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function show(Voucher $voucher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function edit(Voucher $voucher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Voucher $voucher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Voucher  $voucher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Voucher $voucher)
    {
        //
    }
}
