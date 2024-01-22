<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Blog\BlogCategoryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\LoginWithGoogleController;
use App\Http\Controllers\LogoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SellerController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserLoginWithGoogleController;
use App\Http\Controllers\UserViewController;
use App\Http\Controllers\Heder_blog\Header_blogcontroller;
use App\Http\Controllers\BreakingNewsController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/* Admin Route */

Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'Index'])->name('login_from');
    Route::post('/login/owner', [AdminController::class, 'Login'])->name('admin.login');
    Route::get('/dashboard', [AdminController::class, 'Dashboard'])->name('admin.dashboard')->middleware('admin');
    Route::get('/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout')->middleware('admin');
    Route::get('/register/$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', [AdminController::class, 'AdminRegister'])->name('admin.register')->middleware('admin');
    Route::post('/register/create', [AdminController::class, 'AdminRegisterCreate'])->name('admin.register.create')->middleware('admin');
    


});

/* seller Route */

/* seller Route */

Route::prefix('seller')->group(function () {
    Route::get('/login', [SellerController::class, 'Index'])->name('seller_login_from');
    Route::post('/login', [SellerController::class, 'SellerLogin'])->name('seller.login');
    Route::get('/dashboard', [SellerController::class, 'SellerDashboard'])->name('seller.dashboard')->middleware('seller');
    
    Route::get('/logout', [SellerController::class, 'SellerLogin'])->name('seller.logout')->middleware('seller');

    Route::get('/register', [SellerController::class, 'SellerRegister']);
    Route::post('/register/create', [SellerController::class, 'SellerRegisterCreate'])->name('seller.register.create');

    // Route::get('/seller/profile','SellerProfile')->name('seller.profile');

});


/* user Route */
Route::controller(UserController::class)->group(function(){

  
    Route::get('/user/profile','UserProfile')->name('user.profile');
    Route::get('/edit/profile','EditProfile')->name('edit.profile');
    Route::post('/user/login','UserLogin')->name('login');

    Route::get('/user/logout', 'destroy')->name('user.logout');

    Route::post('/store/profile','StoreProfile')->name('store.profile');
    Route::get('/change/password','ChangePassword')->name('change.password');
    Route::get('/update/password','UpdatePassword')->name('update.password');
    

});


/* user View  Route */

Route::prefix('users')->group(function () {
    Route::get('/view/users', [UserViewController::class, 'ViewUser'])->name('users.view');
    Route::get('/edit/users/{id}', [UserViewController::class, 'EditeUser'])->name('edit.users');
    Route::put('/users/edit/{id}', [UserViewController::class, 'UpdateUser'])->name('update.users');

    Route::get('/delete/users/{id}', [UserViewController::class, 'DeleteUser'])->name('delete.users');

    Route::get('/user-status', [UserViewController::class, 'getUserStatus'])->name('user.status');

 
    Route::get('/users/details/{id}', [UserViewController::class, 'showUserDetails'])->name('users.details');

    Route::get('/user-status', [UserViewController::class, 'getUserStatus'])->name('user.status');

    Route::get('/user/active', [UserViewController::class, 'UserStatus'])->name('users.active');



    

});

Route::controller(logoController::class)->group(function(){


     Route::get('/logo/show', 'show')->name('logo.show');
     Route::get('/store/logo', 'UploadLogo')->name('logo.upload');
    Route::post('/store/logo', 'Storelogo')->name('upload');
    // Route::get('/', [logoController::class, 'index']);
    // Route::post('/upload', [logoController::class, 'upload']);
    // Route::post('/update/{id}', [logoController::class, 'update']);
    
});



//Blog Category


Route::controller(BlogCategoryController::class)->group(function(){

    Route::get('/all/blog/category', 'AllBlogCategory')->name('all.blog.category');

    Route::get('/add/blog/category', 'AddBlogCategory')->name('add.blog.category');

    Route::post('/store/blog/Category',  'StoreBlogCategory')->name('store.blog.category');

    Route::get('/edite/blog/category/{id}', 'EditeBlogCategory')->name('edite.blog.category');

    Route::post('/update/blog/category/{id}', 'UpdateBlogCategory')->name('update.blog.category');


    Route::get('/delete/blog/category/{id}',  'DeleteBlogCategory')->name('delete.blog.category');
});
//Blog Category End





//Blog Route


Route::controller(BlogController::class)->group(function(){

 
    Route::get('/all/blog', 'AllBlog')->name('all.blog');

    Route::get('/add/blog', 'AddBlog')->name('add.blog');

    Route::post('/store/blog',  'StoreBlog')->name('store.blog');


    Route::get('/edit/blog/{id}',  'EditBlog')->name('edit.blog');

    Route::post('/update/blog',  'UpdateBlog')->name('update.blog');
  

    Route::get('/delete/blog/{id}',  'DeleteBlog')->name('delete.blog');

    Route::get('/blog/details/{id}',  'BlogDetails')->name('blog.details');

    Route::get('/category/blog/{id}','CategoryBlog')->name('category.blog');

    Route::get('/blog',  'HomeBlog')->name('home.blog');
});


Route::get('/',[BlogController::class,'index']);

//End Blog Route




Route::controller(Header_blogcontroller ::class)->group(function(){

 
    Route::get('/all/header_side/blog', 'HeaderBlog')->name('all.side_blog');

    Route::get('/add/header_side/blog', 'AddBlog')->name('add.header_side_blog');


    Route::post('/store/header/blog',  'StoreHeaderBlog')->name('store.header_blog');



});
Route::controller(BreakingNewsController::class)->group(function(){

 
    Route::get('/header_side/breaking_bews', 'BreakingNews')->name('breaking.news');


    Route::post('/store/news',  'UpdaHeaderNews')->name('update.news');



});











// Route::get('authorized/google',[LoginWithGoogleController::class,'redirectToGoogle']);
// Route::get('authorized/callback',[LoginWithGoogleController::class,'handleGoogleCallback']);


Route::get('auth/login',[UserLoginWithGoogleController::class,'loginWithGoogle'])->name('google');

Route::any('auth/google/callback',[UserLoginWithGoogleController::class,'CallBackGoogle'])->name('callback');





// Route::get('/', function () {

//     return view('blog.index');
// });

Route::get('/dashboard', function () {
    return view('user.index');
})->middleware(['auth', 'verified'])->name('dashboard');






Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
   
    
});

require __DIR__.'/auth.php';



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
