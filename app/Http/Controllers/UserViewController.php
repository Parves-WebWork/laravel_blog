<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
class UserViewController extends Controller
{
    public function viewUser()
    {
        $usersCategory = User::latest()->get();
        return view('admin.users.users_view', compact('usersCategory'));
    }

    public function uploadImage(Request $request, $id)
    {
        $request->validate([
            'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = User::findOrFail($id);

        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload/user_images/'), $name_gen);
            $save_url = 'upload/user_images/' . $name_gen;
            $user->profile_image = $save_url;
            $user->save();
        }

        return redirect()->back()->with('success', 'Profile image uploaded successfully.');
    }

    public function EditeUser($id)
    {
        $users = User::findOrFail($id);
        return view('admin.users.users_edit', compact('users'));
    }

    public function UpdateUser(Request $request, $id)
    {
        $user_id = $id;
        $save_url = null;
    
        // Check if a new profile image is uploaded
        if ($request->hasFile('profile_image')) {
            $image = $request->file('profile_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('upload/user_images/'), $name_gen);
            $save_url = 'upload/user_images/' . $name_gen;
        }
    
        // Find the User model by ID
        $user = User::findOrFail($user_id);
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'profile_image' => $save_url,
        ]);
    
        $notification = [
            'message' => 'User Updated ' . (isset($save_url) ? 'With Image' : 'Without Image') . ' Successfully',
            'alert-type' => 'success'
        ];
    
        return redirect()->route('users.view')->with($notification);
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        $portfolioImage = $user->portfolio_image;
        
        // Check if the portfolio image exists before attempting to delete it
        if (File::exists(public_path($portfolioImage))) {
            // Delete the portfolio image
            File::delete(public_path($portfolioImage));
        }
        
        // Delete the user record
        $user->delete();
        
        $notification = [
            'message' => 'User and Portfolio Image Deleted Successfully',
            'alert-type' => 'success'
        ];
        
        return redirect()->back()->with($notification);
    }
    
   
    public function showUserDetails($id)
    {
        $user = User::findOrFail($id);

        return view('admin.users.user_details', compact('user'));
    }
    
    public function viewUsers()
    {
        $activeUsers = User::where('status', true)->get();
        $inactiveUsers = User::where('status', false)->get();

        return view('admin.view_users', compact('activeUsers', 'inactiveUsers'));
    }
        
    public function UserStatus()
{
    $activeUsers = User::where('active', true)->get();
    $inactiveUsers = User::where('active', false)->get();

    return view('admin.users.users_active', compact('activeUsers', 'inactiveUsers'));
}



}

    

