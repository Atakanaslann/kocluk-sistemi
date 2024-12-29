<?php 

namespace App\Http\Controllers;

use Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Str;

class AuthController extends Controller
{
    public function register(){
        return view('auth.register');
    }

    public function register_post(Request $request){

        $user = request()->validate([
            'name' => 'required',
            'email'=> 'required|unique:users',
            'password' => 'required|min:6',
            'role' => 'required',
        ]);

        $user = new User;
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->role = trim($request->role);
        $user->remember_token = Str::random(50);
        $user->save();

        return redirect('login')->with('success','başarılı');
    }

    public function login(){
        return view('auth.login');
    }

    public function login_post(Request $request){
        if(Auth::attempt(['email' => $request->email , 'password'=>$request->password],true)){
            if(Auth::User()->role == '2'){
                return redirect()->intended('student/dashboard');
            }else if(Auth::User()->role == '1'){
                return redirect()->intended('coach/dashboard');
            }else if(Auth::User()->role == '0'){
                return redirect()->intended('admin/dashboard');
        }else{
            return redirect('login')->with('error','Giriş Başarısız');
        }
    }else {
        return redirect()->back()->with('error','başarısız giriş');
    }
}

    public function forgot(){
        return view('auth.forgot');
    }
}