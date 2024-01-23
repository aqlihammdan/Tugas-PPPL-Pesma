<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;

class LoginController extends Controller
{
    
    public function halamanlogin(){
        return view ('Login.Login-aplikasi');
    }

    public function postlogin(Request $request){
       if(Auth::attempt($request->only('email','password'))){
        return redirect('/home');
       }
       return redirect('/Login');
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
        }

    public function registrasi(){
        return view ('Login.registrasi');
    }

    public function forgot(){
        return view ('Login.forgot');
    }

    public function reset(){
        return view ('Login.reset');
    }

    public function simpanregistrasi(Request $request){
        //dd($request->all());
        $this->validate($request, [
            'name' =>['required', 'string','max:255'],
            'email' =>['required','email:dns','string','max:255','unique:users'],
            'password' =>['required', 'string', Password::min(8)],
        ]);

        $user = User::create([
            'name' => $request->name,
            'level' => 'santri',
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'remember_token' => Str::random(60),
        ]);
        
        $user->sendEmailVerificationNotification(); 
        
        return view('Login.Login-aplikasi');
    }
    //
}
