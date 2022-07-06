<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\Depataments;
use App\Models\TenantPayments;
use App\Models\Tenants;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $buildings = count(Building::where('user_id', auth()->user()->id)->get());
        $buildingsAll = Building::where('user_id', auth()->user()->id)->latest()->take(5)->get();
        $tenants = count(Tenants::where('user_id', auth()->user()->id)->get());
        $departaments = count(Depataments::where('user_id', auth()->user()->id)->get());
        $departamentsAll = Depataments::where('user_id', auth()->user()->id)->latest()->take(5)->get();
        $payments = TenantPayments::where('isActive', 1)->where('user_id', auth()->user()->id)->sum('amount');

        return view('dashboard', compact('buildings', 'tenants', 'payments', 'departaments', 'buildingsAll', 'departamentsAll'));
    }
}
