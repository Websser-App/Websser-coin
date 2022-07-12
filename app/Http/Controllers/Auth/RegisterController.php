<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Http;
use Auth;
use Illuminate\Support\Facades\Storage;
use Session;



class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function index()
    {
        return view('auth.register');
    }  

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function register (Request $request)
    {
        $code = mt_rand(0, 999999);
        $user = User::create([
            'phone' => $request->phone,
            'code' => $code
        ]);

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
                "Cellphone" => $request->phone,
                "Message"=> "Tu código de verificacion es: $code",
                "Encode" => "2"

            ]
        ]);
        Session::flash('message', __('Confirmed your phone'));
        return view('auth.validation')->with('user', $user);
    }


    public function validation(Request $request, $id){
        $user = User::find($id);
        if($request->code == $user->code){
            $user->isActive = 1;
            $user->save();
            Session::flash('message', __('Phone confirmed successfully'));
            return view('auth.completedRegister', compact('user'));
        }
    }

    public function ajaxIneFrontUploadPost(Request $request){
    
            $user = User::find($request->user_id);
    
            $ine_front = file_get_contents($request->file('ine_front'));
            $ine_front = base64_encode($ine_front);
            $user->ine_front = $ine_front;
            $user->save(); 
    
    
            return response()->json(['success'=>'done']);

    }

    public function ajaxIneBackUploadPost(Request $request){
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'ine_back' => 'required',
          ]);
    
    
          if ($validator->passes()) {
    
    
            $user = User::find($request->user_id);
    
            $ine_back = file_get_contents($request->file('ine_back'));
            $ine_back = base64_encode($ine_back);
            $user->ine_back = $ine_back;
            $user->save(); 
    
    
            return response()->json(['success'=>'done']);
          }
    
          return response()->json(['error'=>$validator->errors()->all()]);
    }

    public function ajaxCertificateUploadPost(Request $request){
        $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'certificate' => 'required',
          ]);
    
    
          if ($validator->passes()) {
    
    
            $user = User::find($request->user_id);
    
            $certificate = file_get_contents($request->file('certificate'));
            $certificate = base64_encode($certificate);
            $user->certificate = $certificate;
            $user->save(); 
    
    
            return response()->json(['success'=>'done']);
          }
    
          return response()->json(['error'=>$validator->errors()->all()]);
    }

    public function ajaxUploadPost(Request $request)
    {
      $validator = Validator::make($request->all(), [
        'user_id' => 'required',
        'ine_front' => 'required',
        'ine_back' => 'required',
        'certificate' => 'required',
      ]);


      if ($validator->passes()) {


        $user = User::find($request->user_id);

        $ine_front = file_get_contents($request->file('ine_front'));
        $ine_front = base64_encode($ine_front);
        $user->ine_front = $ine_front;

        $ine_back = file_get_contents($request->file('ine_back'));;
        $ine_back = base64_encode($ine_back);
        $user->ine_back = $ine_back;


        if(!is_null($request->certificate)){ 
            $certificate = file_get_contents($request->file('certificate'));
            $certificate = base64_encode($certificate);
            $user->certificate = $certificate;
            $user->save(); 
            return response()->json(['success'=>'done']);
        }
        $user->save(); 


        return response()->json(['success'=>'done']);
      }

      return response()->json(['error'=>$validator->errors()->all()]);
    }

    public function completedRegister(Request $request){
        $user = User::find($request->id);
        switch ($request) {
            case $request->email != NULL && $request->password != NULL:
                $user = User::find($request->id);
                $user->email = $request->email;
                $user->password = Hash::make($request->password);
                $user->save();
                Session::flash('message', __('Phone and password created successfully'));
                return redirect('login')->with('message', __('Phone and password created successfully'));
                break;

            case $request->surname != NULL && $request->second_surname != NULL && $request->country != NULL && $request->gender != NULL:
                $user = User::find($request->id);
                $user->name = $request->name;
                $user->surname = $request->surname;
                $user->second_surname = $request->second_surname;
                $user->country = $request->country;
                $user->gender = $request->gender;
                $user->save();
                Session::flash('message', __('Data registered successfully'));
                return view('auth.completedRegister')->with('user', $user);
                break;
            case $user->ine_front != NULL && $user->ine_back != NULL:
                $user = User::find($request->id);
                Auth::login($user);
                Session::flash('message', __('User completed successfully'));
                return redirect('home');
                break;
            case $user->ine_front == NULL && $user->ine_back == NULL:
                return view('auth.completedRegister')->with('user', $user);
                break;
        }

    }

    public function completeImagen($id){
        $user = User::find($id);
        if($user->ine_front != NULL && $user->ine_back != NULL){
            Auth::login($user);
            Session::flash('message', __('User completed successfully'));
            return redirect('home');
            break;
        } else {
            Session::flash('message', __('Error al subir las imagenes'));
            return view('auth.completedRegister')->with('user', $user);
            break;
        } 
    }

    public function validateUserAuth(Request $request, $id){
        $user = User::find($id);
        if($request->code == $user->code){
            $user->isActive = 1;
            $user->save();
            Session::flash('message', __('User verificated successfull'));
            return redirect('home');
        }
    }

    public function resendCode($id){
        $user = User::find($id);
        $code = mt_rand(0, 999999);
        $user->code = $code;
        $user->save();
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
                "Cellphone" => $user->phone,
                "Message"=> "Tu código de verificacion es: $code",
                "Encode" => "2"

            ]
        ]);
    }
}
