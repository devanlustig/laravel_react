<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function index(){
        return view('auth.login');
     }

     public function register(){ 
        return view('auth.register'); 
     }

     public function proses_login(Request $request){

       
        $credentials =  $request->only('email','password');
       
        $validate = Validator::make($credentials,[
            'email'=>'required|email',
            'password'=>'required'
        ]);

        
        if($validate->fails()){
            return back()->withErrors($validate)->withInput();
        }

       
        if(Auth::attempt($credentials)){
            return redirect()->intended('dashboard')->with('success','Successfully Login');
        }
       
        return redirect('login')->withInput()->withErrors(['login_error'=>'Username or password are wrong!']);
      }

      public function dashboard(){ 
        
        if(Auth::check()){
            return view('home');
        }

        return redirect('login')->with('You dont have access');
      }

      public function proses_register(Request $request){
    // Lakukan validasi data yang diterima dari form registrasi
    $validate = Validator::make($request->all(),[
        'fullname'=>'required',
        'email'=>'required|email|unique:users,email', // Pastikan email unik dalam tabel users
        'password'=>'required|min:6',
    ]);

    // Jika validasi gagal, kembalikan ke halaman registrasi bersama dengan pesan kesalahan
    if($validate->fails()){
        return back()->withErrors($validate)->withInput();
    }

    try {
        // Buat pengguna baru jika tidak ada masalah dengan validasi
        $user = User::create([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => 'admin'
        ]);

        // Jika berhasil, kembalikan ke halaman dashboard dengan pesan sukses
        return redirect('dashboard')->with('success','You have successfully registered');
    } catch (\Exception $e) {
        // Jika terjadi kesalahan, tangani dengan menampilkan pesan kesalahan
        return back()->withInput()->withErrors(['error' => $e->getMessage()]);
    }
}

       public function logout(){
        //  clear session dan memberitahu auth dengan status logout
            Session::flush();
            Auth::logout();

            return Redirect('login');
        }
}