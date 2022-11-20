<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session;

class AdminController extends Controller
{
    public function adminLoginView()
    {
        return view('backend.login');
    }

    public function adminLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        
        if(Auth::guard('admin')->attempt(['email'=>$request->email, 'password'=>$request->password])){
            return redirect()->route('admin.dashboard');
        }else{
            Session::flash('error-msg', 'Invalid email or password');
            return redirect()->back();
        }
    }

    public function adminLogout()
    {
       Auth::guard('admin')->logout();
       return redirect()->route('admin.login');
    }
}
