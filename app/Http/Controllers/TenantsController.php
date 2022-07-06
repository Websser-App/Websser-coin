<?php

namespace App\Http\Controllers;

use App\Models\Depataments;
use App\Models\Tenants;
use Illuminate\Http\Request;
use Session;

class TenantsController extends Controller
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
        $tenants = Tenants::where('user_id', auth()->user()->id)->get();
        return view('tenants.index')->with('tenants', $tenants);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {   
        $departament = Depataments::find($id);
        return view('tenants.create')->with('departament', $departament);
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
                'departament_id' => 'required',
                'name' => 'required',
                'surname' => 'required',
                'second_surname' => 'required',
                'email' => 'required',
                'type' => 'required',

            ]);
            $departament = Depataments::where('id', $request->departament_id)->first();
            $tenants = new Tenants();
            $tenants->user_id = $request->user_id;
            $tenants->depatament_id = $request->departament_id;
            $tenants->building_id = $departament->building_id;
            $tenants->name = $request->name;
            $tenants->surname = $request->surname;
            $tenants->second_surname = $request->second_surname;
            $tenants->email = $request->email;
            $tenants->type = $request->type;
            $tenants->save();
            Session::flash('message', __('Tenants added successfully'));
            return redirect()->route('departaments.show', $request->building_id)->with('message', __('Tenants added successfully'));
        } catch (\Exception $e) {
            Session::flash('message',$e->getMessage());
            return redirect()->route('departaments.show', $request->building_id)->with('message',$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tenants  $tenants
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tenants  $tenants
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tenants = Tenants::find($id);
        return view('tenants.edit')->with('tenants', $tenants);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tenants  $tenants
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $this->validate($request, [
                'name' => 'required',
                'surname' => 'required',
                'second_surname' => 'required',
                'email' => 'required',
                'type' => 'required',

            ]);

            $tenants = Tenants::find($id);
            $tenants->name = $request->name;
            $tenants->surname = $request->surname;
            $tenants->second_surname = $request->second_surname;
            $tenants->email = $request->email;
            $tenants->type = $request->type;
            $tenants->save();

            Session::flash('message', __('Tenants Updated successfully'));
            return redirect()->route('departaments.show', $request->building_id)->with('message', __('Tenants Updated successfully'));
        } catch (\Exception $e) {
            Session::flash('message',$e->getMessage());
            return redirect()->route('departaments.show', $request->building_id)->with('message',$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tenants  $tenants
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tenants = Tenants::find($id);
        $tenants->delete();
        return redirect('tenants')->with('message', __('Successfully removed tenants'));
    }
}
