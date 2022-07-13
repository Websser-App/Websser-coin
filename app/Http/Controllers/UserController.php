<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
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
    public function profile()
    {
        return view('profile.edit');
    }

    public function update(Request $request, $id){
        try {

            $users =  User::find($id);
            $users->name = $request->name;
            $users->surname = $request->surname;
            $users->second_surname = $request->second_surname;
            if($request->country){
                $users->country = $request->country;
            }
            if($request->gender){    
                $users->gender = $request->gender;
            }
            $users->email = $request->email;
            $users->phone = $request->phone;
            if($request->password){
                $users->password = $request->password;
            }
            $users->save();

            return redirect('profile')->with('message', __('Successfully updated user'));
        } catch (\Exception $e) {
            return redirect('profile')->with('message',$e->getMessage());
        }
    }

    public function uploadUserAvatar(Request $request){
            
        $user = User::find($request->user_id);
    
        $avatar = file_get_contents($request->file('avatar'));
        $avatar = base64_encode($avatar);
        $user->avatar = $avatar;
        $user->save(); 


        return response()->json(['success'=>'done']);
    }
}
