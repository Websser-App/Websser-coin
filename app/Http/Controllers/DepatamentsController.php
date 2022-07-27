<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\Depataments;
use App\Models\Tenants;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\Deprecated;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;
use Session;

class DepatamentsController extends Controller
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
        $departaments = Depataments::where('user_id', auth()->user()->id)->get();
        return view('departaments.index')->with('departaments', $departaments);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {;
        $buildings = Building::find($id);
        $countDepartaments= count(Building::where('buildings.id', $id)->join('depataments', 'buildings.id', 'depataments.building_id')->select('buildings.*', 'depataments.*')->get()); 
        $inputsDepartaments = ($buildings->rows * $buildings->columns);
        if($inputsDepartaments != $countDepartaments){
            $departaments = Depataments::where('building_id', $buildings->id)->get();
            $departamentsCount = count(Depataments::where('building_id', $buildings->id)->get());

            return view('departaments.create')->with('buildings', $buildings)->with('inputsDepartaments', $inputsDepartaments)->with('departaments', $departaments);
        } else {
            return redirect()->route('departaments.show', $buildings->id);
        }   
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
                'buildings_row' => 'required', '[]',
                'number_departament' => 'required', '[]',

            ]);

            $buildings = Building::find($request->building_id);

            if ( $request->number_departament ) {
                foreach(array_combine($request->number_departament, $request->buildings_row) as $departaments => $key){
                    $departament = new Depataments;
                    $departament->user_id = $request->user_id;
                    $departament->UUID = uniqid();
                    $departament->building_id = $buildings->id;
                    $departament->floor = $key;
                    $departament->number_departament = $departaments;
                    $departament->save();
                }
            }

            return redirect('building')->with('message', __('Departaments added successfully'));
        } catch (\Exception $e) {
            return redirect('building')->with('message',$e->getMessage());
        }
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Depataments  $depataments
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $departaments = Depataments::where('building_id',$id)->get();
        return view('departaments.index')->with('departaments', $departaments);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Depataments  $depataments
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $departaments = Depataments::find($id);
        return view('departaments.edit')->with('departaments', $departaments);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Depataments  $depataments
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $this->validate($request, [
                'number_departament' => 'required',

            ]);

            $departament = Depataments::find($id);
            $departament->number_departament = $request->number_departament;
            $departament->save();

            $buildings = Building::find($departament->building_id);

            Session::flash('message', __('Departaments updated successfully'));
            return redirect()->route('departaments.show', $buildings->id)->with('message', __('Departaments updated successfully'));
        } catch (\Exception $e) {
            return redirect()->route('departaments.show', $buildings->id)->with('message', __('Error updating department'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Depataments  $depataments
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $departament = Depataments::find($id);
            $departament->delete();
            $buildings = Building::find($departament->building_id);
            return redirect()->route('departaments.show', $buildings->id)->with('message', __('Departaments deleted successfully'));
        } catch (\Exception $e) {
            return redirect()->route('departaments.show', $buildings->id)->with('message', __('Error deleted department'));
        }
    }
}
