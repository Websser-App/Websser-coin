<?php

namespace App\Http\Controllers;
use App\Models\Contacts;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;


class contactsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $contacts = Contacts::where('user_id', auth()->user()->id)->get();
        return view('contacts.index')->with('contacts', $contacts);
    }


    public function create()
    {
        return view('contacts.create');
    }

    public function store(Request $request)
    {
        try {
            $this->validate($request, [
                'alias' => 'required',
                'fullname' => 'required',
                'email' => 'required',
                'key_account' => 'required',

            ]);

            $contacts = new Contacts();
            $contacts->user_id = auth()->user()->id;
            $contacts->alias = $request->alias;
            $contacts->fullname = $request->fullname;
            $contacts->email = $request->email;
            $contacts->key_account = $request->key_account;
            $contacts->save();

            return redirect('contacts')->with('message', __('Successfully added contact'));
        } catch (\Exception $e) {
            return redirect('contacts')->with('message',$e->getMessage());
        }
    }

    public function edit($id){
        $contacts = Contacts::find($id);
        return view('contacts.edit')->with('contacts', $contacts);
    }

    public function update(Request $request, $id){
        try {
            $this->validate($request, [
                'alias' => 'required',
                'fullname' => 'required',
                'email' => 'required',
                'key_account' => 'required',

            ]);

            $contacts =  Contacts::find($id);
            $contacts->alias = $request->alias;
            $contacts->fullname = $request->fullname;
            $contacts->email = $request->email;
            $contacts->key_account = $request->key_account;
            $contacts->save();

            return redirect('contacts')->with('message', __('Successfully updated contact'));
        } catch (\Exception $e) {
            return redirect('contacts')->with('message',$e->getMessage());
        }
    }

    public function destroy($id){
        $contacts = Contacts::find($id);
        $contacts->delete();
        return redirect('contacts')->with('message', __('Successfully removed contact'));
    }
}