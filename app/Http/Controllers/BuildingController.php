<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\Depataments;
use Illuminate\Http\Request;

class BuildingController extends Controller
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
        $buildings = Building::all();
        return view('building.index')->with('buildings', $buildings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('building.create');
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
                'type_building' => 'required',
                'rows' => 'required',
                'address' => 'required',
                'columns' => 'required',
                'latitude' => 'required',
                'longitude' => 'required'

            ]);

            $building = new Building();
            $building->UUID = uniqid();
            $building->type_building = $request->type_building;
            $building->rows = $request->rows;
            $building->address = $request->address;
            $building->columns = $request->columns;
            $building->latitude = $request->latitude;
            $building->longitude = $request->longitude;
            $building->save();

            return redirect('building')->with('message', __('Building added successfully'));
        } catch (\Exception $e) {
            return redirect('')->with('message',$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $building = Building::find($id);
        return view('building.edit')->with('building', $building);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $this->validate($request, [
                'rows' => 'required',
                'address' => 'required',
                'columns' => 'required',
                'latitude' => 'required',
                'longitude' => 'required'

            ]);

            $building = Building::find($id);
            if(!is_null($request->type_building)){
                $building->type_building = $request->type_building;
            }
            $building->rows = $request->rows;
            $building->address = $request->address;
            $building->columns = $request->columns;
            $building->latitude = $request->latitude;
            $building->longitude = $request->longitude;
            $building->save();

            return redirect('building')->with('message', __('Successfully Updated building'));
        } catch (\Exception $e) {
            return redirect('building')->with('message',$e->getMessage());
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $building = Building::find($id);
        $building->delete();
        return redirect('building')->with('message', __('Successfully removed building'));

    }
}
