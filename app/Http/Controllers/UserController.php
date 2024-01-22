<?php

namespace App\Http\Controllers;

use App\Helper\Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\UserStatus;

class UserController extends Controller
{
    // public function index()
    // {
    //     $users = User::with('status')->get();
    //     return view('admin.users.index', compact('users'));
    // }

    // public function create()
    // {
    //     return view('admin.users.create');
    // }

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'email' => 'required|email|unique:users',
    //         'password' => 'required',
    //         'status' => 'required',
    //     ]);

    //     $user = new User();
    //     $user->name = $request->name;
    //     $user->email = $request->email;
    //     $user->password = bcrypt($request->password);
    //     $user->save();

    //     $status = new User();
    //     $status->user_id = $user->id;
    //     $status->active = $request->status;
    //     $status->save();

    //     return redirect()->route('users.index')->with('success', 'User created successfully.');
    // }

    // public function edit($id)
    // {
    //     $user = User::findOrFail($id);
    //     return view('admin.users.edit', compact('user'));
    // }

    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'name' => 'required',
    //         'email' => 'required|email|unique:users,email,' . $id,
    //         'password' => 'nullable',
    //         'status' => 'required',
    //     ]);

    //     $user = User::findOrFail($id);
    //     $user->name = $request->name;
    //     $user->email = $request->email;
    //     if ($request->password) {
    //         $user->password = bcrypt($request->password);
    //     }
    //     $user->save();

    //     $status = UserStatus::where('user_id', $id)->first();
    //     if (!$status) {
    //         $status = new UserStatus();
    //         $status->user_id = $id;
    //     }
    //     $status->active = $request->status;
    //     $status->save();

    //     return redirect()->route('users.index')->with('success', 'User updated successfully.');
    // }

    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }







    
    public function userProfile()
    {
        $id = Auth::user()->id;
        $userData = User::find($id);

        return view('user.user_profile_view', compact('userData'));
    }






    public function EditProfile()
    {
        $id = Auth::user()->id;
        $editData = User::find($id);

        return view('user.user_profile_edit', compact('editData'));
    }



    public function StoreProfile(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);

        $data->name = $request->name;
        $data->email = $request->email;
        $data->username = $request->username;

        if ($request->file('profile_image')) {
            $file = $request->file('profile_image');

            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/user_images'), $filename);

            $data['profile_image'] = 'upload/user_images/'.$filename;
        }

        $data->save();

        $notification = array(
            'message' => 'User Profile Updated Successfully',
            'alert-type' => 'info'
        );

        return redirect()->route('user.profile')->with($notification);
    }





    public function ChangePassword()
    {
        return view('user.user_change_password');
    }

    public function UpdatePassword(Request $request)
    {
        $validateData = $request->validate([
            'oldpassword' => 'required',
            'newpassword' => 'required',
            'confirm_password' => 'required|same:newpassword',
        ]);

        $hashedPassword = Auth::user()->password;

        if (Hash::check($request->oldpassword, $hashedPassword)) {
            $users = User::find(Auth::id());
            $users->password = bcrypt($request->newpassword);
            $users->save();

            session()->flash('message', 'Password Updated Successfully');

            return redirect()->back();
        } else {
            session()->flash('message', 'Old Password is not match');
            return redirect()->back();
        }
    }

    public function UserLogin(Request $request)
    {
        // Validate the login data
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Attempt to authenticate the user
        if (auth()->attempt(['username' => $request->username, 'password' => $request->password])) {
            // Authentication successful
            return redirect()->intended($this->redirectTo);
        } else {
            // Authentication failed
            return redirect()->back()->with('error', 'Invalid credentials. Please try again.');
        }
    }

    public function index2(){

        Helper::text();
    }
  

}