<?php

namespace App\Http\Controllers\Heder_blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Heder_blog;
use App\Models\BlogCategory;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Carbon;
class Header_blogcontroller extends Controller
{
    public function HeaderBlog(){
        $allSiteBlog = Heder_blog::all();
        return view('admin.headder_side_title.all_side_title',compact('allSiteBlog'));
    }

    public function AddBlog(){

        $categories = BlogCategory::orderBy('blog_category', 'ASC')->get();
        $allblogs=BlogCategory::latest()->paginate(2);

        return view('admin.headder_side_title.add_side_title',compact('categories'));
    }

    public function StoreHeaderBlog(Request $request){

        $request->validate([
            'blog_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $image = $request->file('blog_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(430, 327)->save(public_path('upload/blog/') . $name_gen);
        $save_url = 'upload/blog/' . $name_gen;
    
        $side_blog = new Heder_blog();
        $side_blog->blog_category_id = $request->blog_category_id; // Change $side_request to $request
        $side_blog->blog_title = $request->blog_title;
        $side_blog->blog_tags = $request->blog_tags;
        $side_blog->blog_description = substr($request->blog_description, 0, 255); // Truncate to fit within column length
        $side_blog->blog_image = $save_url;
        $side_blog->created_at = Carbon::now();
        $side_blog->save();
    
        $notification = [
            'message' => 'Blog Inserted ' . (isset($save_url) ? 'With Image' : 'Without Image') . ' Successfully',
            'alert-type' => 'success'
        ];
    
        return redirect()->route('all.side_blog')->with($notification);
    }
    
  
}
