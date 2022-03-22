<?php
use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\User\UserController;
Use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/',[IndexController::class,'index']);

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//===========================Admin Route ==========================================
Route::group(['prefix'=>'admin','middleware' =>['admin','auth'],'namespace'=>'Admin'], function(){
   Route::get('dashboard',[AdminController::class,'index'])->name('admin.dashboard');
    //profile
    Route::get('profile',[AdminController::class,'profile'])->name('admin.profile');
    Route::post('Update-admin-profile',[AdminController::class,'updateadminprofile'])->name('update.admin.profile');
    Route::get('admin-image-page',[AdminController::class,'adminimage'])->name('admin.image');
    Route::post('admin/image/store',[AdminController::class,'adminimagestore'])->name('admin.store.image');
    Route::get('update/adminpassword',[AdminController::class,'adminpasswordpage'])->name('admin.profile.password');
    Route::post('admin/password/store',[AdminController::class,'adminstorepassword'])->name('admin.store.password');
    //Brand
    Route::get('all-brands',[BrandController::class,'index'])->name('brands');
    Route::post('brand/store',[BrandController::class,'brandstore'])->name('brand-store');
    Route::get('/brand-edit/{brand_id}',[BrandController::class,'brandedit']);
    Route::post('brand/update',[BrandController::class,'brandupdate'])->name('brand-update');
    Route::post('brand/delete/{id}',[BrandController::class,'delete'])->name('brand.delete');
    //category
    Route::get('category',[CategoryController::class,'index'])->name('category');
    Route::post('category/store',[CategoryController::class,'categoryStore'])->name('category-store');
    Route::get('/category-edit/{cat_id}',[CategoryController::class,'edit']);
    Route::post('category/update',[CategoryController::class,'catUpdate'])->name('update-category');
    Route::post('/category-delete/{cat_id}',[CategoryController::class,'delete'])->name('category.delete');
    //subcategory
    Route::get('sub-category',[CategoryController::class,'subIndex'])->name('sub-category');
    Route::post('subcategory/store',[CategoryController::class,'subcategoryStore'])->name('subcategory-store');
    Route::get('subcategory-edit/{subcat_id}',[CategoryController::class,'subedit']);
    Route::post('subcategory/update',[CategoryController::class,'subcatUpdate'])->name('subupdate-category');
    Route::post('subcategory-delete/{subcat_id}',[CategoryController::class,'subdelete'])->name('subcategory.delete');

    //SUB subcategory
    Route::get('sub-sub-category',[CategoryController::class,'subSubIndex'])->name('sub-sub-category');
    Route::get('subcategory/ajax/{cat_id}',[CategoryController::class,'getSubCat'])->name('ajax-subcat');
    Route::post('sub-subcategory/store',[CategoryController::class,'subSubcategoryStore'])->name('sub-subcategory-store');
    Route::get('sub-subcategory-edit/{subsubcat_id}',[CategoryController::class,'subsubedit']);
    Route::post('sub-subcategory/update',[CategoryController::class,'subsubcatUpdate'])->name('update-sub-subcategory');
    Route::post('sub-subcategory-delete/{subsubcat_id}',[CategoryController::class,'subsubdelete'])->name('subsubcategory.delete');
    //Product Route
    Route::get('add-product',[ProductController::class,'addProduct'])->name('add-product');
    Route::post('product/store',[ProductController::class,'store'])->name('store-product');
   Route::get('sub-subcategory/ajax/{subcat_id}',[ProductController::class,'getSubSubCat']);
    Route::get('manage-product',[ProductController::class,'manageProduct'])->name('manage-product');
    Route::get('product-edit/{product_id}',[ProductController::class,'edit']);
    Route::post('product/data-update',[ProductController::class,'productDataUpdate'])->name('update-product-data');
    Route::post('product/multi-image/update',[ProductController::class,'multiImgUpdate'])->name('update-product-image');
    Route::post('product/thambnail/update',[ProductController::class,'thambnailUpdate'])->name('update-product-thambnail');
    /*Route::post('product-delete/{product_id}',[ProductController::class,'subdelete'])->name('subcategory.delete');*/
    Route::get('product/multiimg/delete/{id}',[ProductController::class,'multiImageDelete']);

    Route::get('product-inactive/{id}',[ProductController::class,'inactive']);
    Route::get('product-active/{id}',[ProductController::class,'active']);

    //Sliders
    Route::get('slider',[SliderController::class,'index'])->name('sliders');
    Route::post('slider/store',[SliderController::class,'sliderstore'])->name('slider-store');
    Route::get('/slider-edit/{id}',[SliderController::class,'slideredit']);
    Route::post('slider/update',[SliderController::class,'sliderupdate'])->name('slider-update');
});
//===========================User Route ==========================================
Route::group(['prefix'=>'user','middleware' =>['user','auth'],'namespace'=>'User'], function(){
    Route::get('dashboard',[UserController::class,'index'])->name('user.dashboard');
    Route::post('update-profile',[UserController::class,'updateData'])->name('update.profile');
    Route::get('image',[UserController::class,'imagePage'])->name('user.image');
    Route::post('update/image',[UserController::class,'updateimage'])->name('update-image');
    Route::get('update/Password',[UserController::class,'updatepassPage'])->name('update-password');
    Route::post('Password/Store',[UserController::class,'storePassword'])->name('password-store');
});

//===========================Frontend Route ==========================================