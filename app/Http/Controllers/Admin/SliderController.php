<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    public function index(){
       /* dd('ok');*/

        $sliders=Slider::latest()->get();
        return view('admin.slider.index',compact('sliders'));
    }
    //slider storr
    public function sliderstore(Request $request){

        $request->validate([
            'image' =>'required',

        ]);

        $image =$request->file('image');
        $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(870,370)->save('upload/slider/'.$name_gen);
        $save_url='upload/slider/'.$name_gen;

        Slider::insert([
             'title_en' =>$request->title_en,
            'title_bn' =>$request->title_bn,
            'description_en' =>$request->description_en,
            'description_bn' =>$request->description_bn,
            'image' =>$save_url,
            'created_at' => Carbon::now(),


        ]);

        $notification=array(
            'message'=>'Slider Insert',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);



    }
    //Edit Slider

    public function slideredit($id){

$slider = Slider::findOrFail($id);

return view('admin.slider.edit',compact('slider'));

    }
    //Slider Update
    public function sliderupdate(Request $request){

        $id=$request->id;
        $old_img=$request->old_image;


        if ($request->file('image')){
            unlink($old_img);
            $image =$request->file('image');
            $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(870,370)->save('upload/slider/'.$name_gen);
            $save_url='upload/slider/'.$name_gen;


            Slider::findOrFail($id)->update([
                'title_en' =>$request->title_en,
                'title_bn' =>$request->title_bn,
                'description_en' =>$request->description_en,
                'description_bn' =>$request->description_bn,
                'image' =>$save_url,
                'created_at' => Carbon::now(),

            ]);
            Toastr::success('Slider Update Success','Success');
            return Redirect()->route('sliders');
        }else{
            Slider::findOrFail($id)->update([
                'title_en' =>$request->title_en,
                'title_bn' =>$request->title_bn,
                'description_en' =>$request->description_en,
                'description_bn' =>$request->description_bn,

                'created_at' => Carbon::now(),

            ]);
            Toastr::success('Slider Update Success','Success');
            return Redirect()->route('sliders');
        }





}



}
