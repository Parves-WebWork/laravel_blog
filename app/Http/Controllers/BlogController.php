<?php

namespace App\Http\Controllers;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Heder_blog;
use Intervention\Image\Facades\Image;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Carbon;
class BlogController extends Controller
{
    public function AllBlog()
    {
        $blogs = Blog::latest()->get();
        return view('admin.blogs.blogs_all', compact('blogs'));
    }

    public function AddBlog()
    {
        $categories = BlogCategory::orderBy('blog_category', 'ASC')->get();
        return view('admin.blogs.blogs_add', compact('categories'));
    }

    public function StoreBlog(Request $request)
    {
        $request->validate([
            'blog_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $image = $request->file('blog_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        Image::make($image)->resize(430, 327)->save(public_path('upload/blog/') . $name_gen);
        $save_url = 'upload/blog/' . $name_gen;

        $blog = new Blog;
        $blog->blog_category_id = $request->blog_category_id;
        $blog->blog_title = $request->blog_title;
        $blog->blog_tags = $request->blog_tags;
        $blog->blog_description = substr($request->blog_description, 0, 255); // Truncate to fit within column length
        $blog->blog_image = $save_url;
        $blog->created_at = Carbon::now();
        $blog->save();

        $notification = [
            'message' => 'Blog Inserted ' . (isset($save_url) ? 'With Image' : 'Without Image') . ' Successfully',
            'alert-type' => 'success'
        ];

        return redirect()->route('all.blog')->with($notification);
    }

    public function EditBlog($id)
    {
        $blogs = Blog::findOrFail($id);
        $categories = BlogCategory::orderBy('blog_category', 'ASC')->get();
        return view('admin.blogs.blogs_edit', compact('blogs', 'categories'));
    }

    public function UpdateBlog(Request $request)
    {
        $blog_id = $request->id;
        $notification = []; // Initialize the $notification variable
    
        if ($request->hasFile('blog_image')) {
            $image = $request->file('blog_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
    
            // Make sure the "upload/blog" directory exists
            if (!is_dir('upload/blog')) {
                mkdir('upload/blog', 0777, true);
            }
    
            // Save the image using Intervention Image
            Image::make($image)->resize(430, 327)->save('upload/blog/' . $name_gen);
    
            $save_url = 'upload/blog/' . $name_gen;
    
            Blog::findOrFail($blog_id)->update([
                'blog_category_id' => $request->blog_category_id,
                'blog_title' => $request->blog_title,
                'blog_tags' => $request->blog_tags,
                'blog_description' => $request->blog_description,
                'blog_image' => $save_url,
            ]);
    
            $notification = [
                'message' => 'Blog Updated Successfully',
                'alert-type' => 'success'
            ];
        } else {
            // Handle the case where no image is uploaded
            Blog::findOrFail($blog_id)->update([
                'blog_category_id' => $request->blog_category_id,
                'blog_title' => $request->blog_title,
                'blog_tags' => $request->blog_tags,
                'blog_description' => $request->blog_description,
            ]);
    
            $notification = [
                'message' => 'Blog Updated Successfully (Without Image)',
                'alert-type' => 'success'
            ];
        }
    
        return redirect()->route('all.blog')->with($notification);
    }
    

    public function DeleteBlog($id)
    {
        $blog = Blog::findOrFail($id);
        $img = $blog->blog_image;

        // Check if the file exists before attempting to delete it
        if (file_exists(public_path($img))) {
            // Delete the file
            File::delete(public_path($img));

            // Delete the record from the database
            $blog->delete();

            $notification = [
                'message' => 'Blog Deleted Successfully',
                'alert-type' => 'success'
            ];
        } else {
            $notification = [
                'message' => 'Unable to delete blog. File not found.',
                'alert-type' => 'error'
            ];
        }

        return redirect()->back()->with($notification);
    }


      public function BlogDetails($id) {

        $allblogs=Blog::latest()->limit(5)->get();

        $blogs=Blog::findOrFail($id);
        $categories = BlogCategory::orderBy('blog_category', 'ASC')->get();

        return view('frontend.blog_details',compact('blogs','allblogs','categories')); 
        
    }

    public function CategoryBlog($id){

        $blogpost= Blog::where('blog_category_id',$id)->orderBy('id','DESC')->get();
        $allblogs=Blog::latest()->limit(5)->get();
        $categories = BlogCategory::orderBy('blog_category', 'ASC')->get();
        $categoryname=BlogCategory::findOrFail($id);
        return view('frontend.cat_blog_details',compact('blogpost','categories','allblogs','categoryname'));


    }

    public function HomeBlog(){
        $categories = BlogCategory::orderBy('blog_category', 'ASC')->get();
        $allblogs=Blog::latest()->paginate(2);

        return view('frontend.blog',compact('allblogs','categories'));
    }


   public function index(){
        $titleBlogs = Heder_blog::latest()->paginate(4);
        return view('blog.index',compact('titleBlogs'));
   }
}
