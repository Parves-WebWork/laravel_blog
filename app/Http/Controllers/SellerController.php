<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
class SellerController extends Controller
{
    public function Index(){

        return view('seller.seller_login');
    }//end method 

    public function SellerDashboard(){

    return view('seller.index');

    }//end method

    public function SellerLogin(Request $request){


        $check = $request->all();

        if(Auth::guard('seller')->attempt(['email' => $check['email'], 'password' => $check['password'] ])){

            return redirect()->route('seller.dashboard')->with('error', 'Vendor Login Successfully');
        }else{

            return back()->with('error', 'Invaild Email Or Password');
        }

    }//End Mehtod


    public function SellerLogout(){

    Auth::guard('seller')->logout();

    return redirect()->route('seller_login_from')->with('error', 'Seller LogOut Successfully');


    }

    public function SellerRegister(){

        return view('seller.seller_regiter');
    }

   public function SellerRegisterCreate(Request $request){
    
    Seller::insert([

        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'created_at' => Carbon::now(),

    ]);



    return redirect()->route('login_from')->with('success', 'Seller Created Successfully');
}//End Mehtod



    public function SellerProfile(){

       // return view('')
    }











   }
    

