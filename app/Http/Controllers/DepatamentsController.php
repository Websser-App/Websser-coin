<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Models\Depataments;
use App\Models\Tenants;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;

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
        $departaments = Depataments::all();
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
            return view('departaments.create')->with('buildings', $buildings)->with('inputsDepartaments', $inputsDepartaments);
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
                'building_id' => 'required',
                'number_departament' => 'required', '[]',

            ]);
            $buildings = Building::find($request->building_id);

            if ( $request->number_departament ) {
                foreach($request->number_departament as $departaments){
                    $departament = new Depataments;
                    $departament->UUID = uniqid();
                    $departament->building_id = $buildings->id;
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
    public function edit(Depataments $depataments)
    {
        $departaments = Depataments::all();
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Depataments  $depataments
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
