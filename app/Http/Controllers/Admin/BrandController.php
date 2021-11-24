<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class BrandController extends Controller
{
    //

    public function index(){



     $brands=Brand::latest()->get();
        return view('admin.brands.index',compact('brands'));

    }
//store Brand
    public function brandstore(Request $request){
$request->validate([

'brand_name_en' => 'required',
    'brand_name_bn' => 'required',
    'brand_image' => 'required',

],[
    'brand_name_en.required'=> 'Enter Brand Name In English',
    'brand_name_bn.required'=> 'Enter Brand Name In Bangla',
    'brand_image.required'=> 'Enter Brand Image',

    ]);


        $image =$request->file('brand_image');
        $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(166,110)->save('upload/brand/'.$name_gen);
        $save_url='upload/brand/'.$name_gen;

        Brand::insert([
            'brand_name_en'=>$request->brand_name_en,
            'brand_name_bn'=>$request->brand_name_bn,
            'brand_slug_en'=>strtolower(str_replace(' ','-',$request->brand_name_en)),
            'brand_slug_bn'=>(str_replace(' ','-',$request->brand_name_bn)),
            'brand_image'=>$save_url,
            'created_at'=>Carbon::now()

        ]);
        Toastr::success('Brand Added Success','Success');
        return Redirect()->back();

    }

    public function brandedit($brand_id){


$brand=Brand::findOrFail($brand_id);

return view('admin.brands.edit',compact('brand'));

    }


public function brandupdate(Request $request){

    $brand_id=$request->id;
    $old_img=$request->old_image;


    if ($request->file('brand_image')){
        unlink($old_img);
        $image =$request->file('brand_image');
        $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(166,110)->save('upload/brand/'.$name_gen);
        $save_url='upload/brand/'.$name_gen;

        Brand::findOrFail($brand_id)->update([
            'brand_name_en'=>$request->brand_name_en,
            'brand_name_bn'=>$request->brand_name_bn,
            'brand_slug_en'=>strtolower(str_replace(' ','-',$request->brand_name_en)),
            'brand_slug_bn'=>(str_replace(' ','-',$request->brand_name_bn)),
            'brand_image'=>$save_url,
            'created_at'=>Carbon::now()

        ]);
        Toastr::success('Brand Update Success','Success');
        return Redirect()->route('brands');
    }else{
        Brand::findOrFail($brand_id)->update([
            'brand_name_en'=>$request->brand_name_en,
            'brand_name_bn'=>$request->brand_name_bn,
            'brand_slug_en'=>strtolower(str_replace(' ','-',$request->brand_name_en)),
            'brand_slug_bn'=>(str_replace(' ','-',$request->brand_name_bn)),

            'created_at'=>Carbon::now()

        ]);
        Toastr::success('Brand Update Success','Success');
        return Redirect()->route('brands');
    }


}

public  function  delete(Request $request, $id){

    $brand = Brand::findOrFail($id);
    $img = $brand->brand_image;
    @unlink($img);
    Brand::findOrFail($id)->delete();
    Toastr::success('Brand Delete Success','Success');
    return Redirect()->back();
}

}
