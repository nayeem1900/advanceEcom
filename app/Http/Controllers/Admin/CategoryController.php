<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\SubsubCategory;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // index
    public function index(){
        $categories = Category::latest()->get();
        return view('admin.category.index',compact('categories'));
    }

    public function categoryStore(Request $request)
    {
        $request->validate([

            'category_name_en' => 'required',
            'category_name_bn' => 'required',
            'category_icon' => 'required',

        ]);
        Category::insert([
            'category_name_en'=>$request->category_name_en,
            'category_name_bn'=>$request->category_name_bn,
            'category_slug_en'=>strtolower(str_replace(' ','-',$request->category_name_en)),
            'category_slug_bn'=>(str_replace(' ','-',$request->category_name_bn)),
            'category_icon' =>$request->category_icon,
            'created_at' =>Carbon::now(),
        ]);
        Toastr::success('Category Added Success','Success');
        return Redirect()->back();

    }


public function edit($cat_id){
$category=Category::findOrFail($cat_id);
return view('admin.category.edit',compact('category'));

}
public function catUpdate(Request $request){
$cat_id=$request->id;
    Category::findorFail($cat_id)->Update([
        'category_name_en'=>$request->category_name_en,
        'category_name_bn'=>$request->category_name_bn,
        'category_slug_en'=>strtolower(str_replace(' ','-',$request->category_name_en)),
        'category_slug_bn'=>(str_replace(' ','-',$request->category_name_bn)),
        'category_icon' =>$request->category_icon,
        'created_at' =>Carbon::now(),
    ]);
    Toastr::success('Category Update Success','Success');
    return Redirect()->route('category');

}



    public  function  delete($cat_id){

        Category::findOrFail($cat_id)->delete();
        Toastr::success('Category Delete Success','Success');
        return Redirect()->back();
    }


  /*  ================sub category=======================*/

  public function subIndex(){
      $categories=Category::orderBy('category_name_en','ASC')->get();
      $subcategories=Subcategory::latest()->get();
      return view('admin.sub-category.index',compact('subcategories','categories'));

  }
public function subcategoryStore(Request $request){
    $request->validate([

        'subcategory_name_en' => 'required',
        'subcategory_name_bn' => 'required',
        'category_id' => 'required',

    ],[
        'category_id.required' => 'select any category',

        ]);

    Subcategory::insert([
        'category_id' =>$request->category_id,
        'subcategory_name_en'=>$request->subcategory_name_en,
        'subcategory_name_bn'=>$request->subcategory_name_bn,
        'subcategory_slug_en'=>strtolower(str_replace(' ','-',$request->subcategory_name_en)),
        'subcategory_slug_bn'=>(str_replace(' ','-',$request->subcategory_name_bn)),

        'created_at' =>Carbon::now(),
    ]);
    Toastr::success('Sub Category Added Success','Success');
    return Redirect()->back();



}

public function subedit($subcat_id)
{

    $subcategory = Subcategory::findOrFail($subcat_id);
    $categories=Category::orderBy('category_name_en','ASC')->get();
    return view('admin.sub-category.edit', compact('subcategory','categories'));


}

public function subcatUpdate(Request $request){

    $subcat_id=$request->id;
    Subcategory::findorFail($subcat_id)->Update([
        'category_id' =>$request->category_id,
        'subcategory_name_en'=>$request->subcategory_name_en,
        'subcategory_name_bn'=>$request->subcategory_name_bn,
        'subcategory_slug_en'=>strtolower(str_replace(' ','-',$request->subcategory_name_en)),
        'subcategory_slug_bn'=>(str_replace(' ','-',$request->subcategory_name_bn)),

        'updated_at' =>Carbon::now(),
    ]);
    Toastr::success('Sub Category Update Success','Success');
    return Redirect()->route('sub-category');


}
    public  function  subdelete($subcat_id){

       Subcategory::findOrFail($subcat_id)->delete();
        Toastr::success('Sub Category Delete Success','Success');
        return Redirect()->back();
    }

    //=====================================Sub Sub Category======================================


    public function subSubIndex(){

        $categories=Category::orderBy('category_name_en','ASC')->get();
        $subsubcategories=SubsubCategory::latest()->get();
        return view('admin.sub-sub-category.index',compact('categories','subsubcategories'));


    }
    //Get Subcategory With Ajax

    public function getSubCat($cat_id){

$subcat=Subcategory::where('category_id',$cat_id)->orderBy('subcategory_name_en','ASC')->get();

return json_encode($subcat);
    }

    //Store
    public function subSubcategoryStore(Request $request){
        $request->validate([

            'subsubcategory_name_en' => 'required',
            'subsubcategory_name_bn' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',

        ],[
            'category_id.required' => 'select any category',
            'subcategory_id.required' => 'select any category',

        ]);

        SubsubCategory::insert([
            'category_id' =>$request->category_id,
            'subcategory_id' =>$request->subcategory_id,
            'subsubcategory_name_en'=>$request->subsubcategory_name_en,
            'subsubcategory_name_bn'=>$request->subsubcategory_name_bn,
            'subsubcategory_slug_en'=>strtolower(str_replace(' ','-',$request->subsubcategory_name_en)),
            'subsubcategory_slug_bn'=>(str_replace(' ','-',$request->subsubcategory_name_bn)),

            'created_at' =>Carbon::now(),
        ]);
        Toastr::success('Sub-Sub Category Added Success','Success');
        return Redirect()->back();



    }
//edit
public function subsubedit ($subsubcat_id){
$subsubcat=SubsubCategory::findOrFail($subsubcat_id);
return view('admin.sub-sub-category.edit',compact('subsubcat'));


}
//Update

public function subsubcatUpdate(Request $request){
    $subsubcat_id=$request->id;
    SubsubCategory::findorFail($subsubcat_id)->Update([

        'subsubcategory_name_en'=>$request->subsubcategory_name_en,
        'subsubcategory_name_bn'=>$request->subsubcategory_name_bn,
        'subsubcategory_slug_en'=>strtolower(str_replace(' ','-',$request->subsubcategory_name_en)),
        'subsubcategory_slug_bn'=>(str_replace(' ','-',$request->subsubcategory_name_bn)),

        'updated_at' =>Carbon::now(),
    ]);
    Toastr::success('Sub sub Category Update Success','Success');
    return Redirect()->route('sub-sub-category');

}

//Delete

public function subsubdelete($subsubcat_id){

    SubsubCategory::findOrFail($subsubcat_id)->delete();
    Toastr::success('Sub sub Category Delete Success','Success');
    return Redirect()->back();


}


}
