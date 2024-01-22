<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;
class BlogCategoryController extends Controller
{
    public function AllBlogCategory(){

        $blogcategory = BlogCategory::latest()->get();
        return view('admin.blog_category.blog_category_all', compact('blogcategory'));

    }//end method


    public function AddBlogCategory(){

        
       
        return view('admin.blog_category.blog_category_add');

    }//End Method

    public function StoreBlogCategory(Request $request){

        $request->validate([
            'blog_category' => 'required'

        ], [
            'blog_category.required' => 'Blog Category Name is Required',
           
        ]);

      

        BlogCategory::insert([
            'blog_category' => $request->blog_category
            
        ]);

        $notification = [
            'message' => 'Blog Category Inserted' . (isset($save_url) ? 'With Image' : 'Without Image') . ' Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.blog.category')->with($notification);
    }

    public function EditeBlogCategory($id){

        $blogcategory = BlogCategory::findOrFail($id);
        return view('admin.blog_category.blog_category_edit', compact('blogcategory'));    

    }//End Method


    public function UpdateBlogCategory(Request $request,$id){

        BlogCategory::findOrFail($id)->update([
            'blog_category' => $request->blog_category
            
        ]);

        $notification = [
            'message' => 'Blog Category Updated' . (isset($save_url) ? 'With Image' : 'Without Image') . ' Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.blog.category')->with($notification);



    }//End Method

    public function DeleteBlogCategory($id){

        BlogCategory::findOrFail($id)->delete();

        $notification = [
            'message' => 'Blog Category Delete' . (isset($save_url) ? 'With Image' : 'Without Image') . ' Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($notification);

    }//End Method

}
