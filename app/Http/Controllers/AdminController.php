<?php

namespace App\Http\Controllers;

use App\Models\Admin; // Assuming you have an Admin model
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function Index(){

        return view('admin.admin_login');

    } //End Mehtod

    public function Dashboard(){

        return view('admin.index');

    }//End Mehtod

    public function Login(Request $request){


        $check = $request->all();

        if(Auth::guard('admin')->attempt(['email' => $check['email'], 'password' => $check['password'] ])){

            return redirect()->route('admin.dashboard')->with('error', 'Admin Login Successfully');
        }else{

            return back()->with('error', 'Invaild Email Or Password');
        }

    }//End Mehtod

    public function AdminLogout(){

    Auth::guard('admin')->logout();

        return redirect()->route('login_from')->with('error', 'Admin LogOut Successfully');

    }//End Mehtod



    

    public function AdminRegister(){

        return view('admin.admin_register');

    }//End Mehtod

    public function AdminRegisterCreate(Request $request)
    {

        Admin::insert([

            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'created_at' => Carbon::now(),

        ]);



        return redirect()->route('login_from')->with('success', 'Admin Created Successfully');
    }//End Mehtod
}

