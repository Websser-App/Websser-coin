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
        $buildings = count(Building::all());
        $buildingsAll = Building::latest()->take(5)->get();
        $tenants = count(Tenants::all());
        $departaments = count(Depataments::all());
        $departamentsAll = Depataments::latest()->take(5)->get();
        $payments = TenantPayments::where('isActive', 1)->sum('amount');

        return view('dashboard', compact('buildings', 'tenants', 'payments', 'departaments', 'buildingsAll', 'departamentsAll'));
    }
}
