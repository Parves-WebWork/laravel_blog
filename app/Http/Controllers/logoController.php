<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Image;
use Illuminate\Support\Facades\Auth;

use App\Models\Logo;

class LogoController extends Controller
{

    public function show()
    {
    
        // $images = Image::all();
        return view('admin.logo.show');
    }
    
    public function UploadLogo()
    {
        return view('admin.logo.upload');
    }

    public function Storelogo(Request $request)
    {

        dd($request->all());


        // $request->validate([
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        // ]);

        // $imageName = time() . '.' . $request->image->extension();
        // $request->image->move(public_path('images'), $imageName);

        // Image::create([
        //     'image_path' => 'images/' . $imageName,
        //     'image_name' => $imageName,
        // ]);

        // return redirect()->back()->with('success', 'Image uploaded successfully.');
    }

    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        // ]);

        // $imageName = time() . '.' . $request->image->extension();
        // $request->image->move(public_path('images'), $imageName);

        // $image = Image::find($id);
        // $oldImagePath = $image->image_path;
        // $image->update([
        //     'image_path' => 'images/' . $imageName,
        //     'image_name' => $imageName,
        // ]);

        // // Delete the old image from the server
        // if (file_exists(public_path($oldImagePath))) {
        //     unlink(public_path($oldImagePath));
        // }

        // return redirect()->back()->with('success', 'Image updated successfully.');
    }

   


}