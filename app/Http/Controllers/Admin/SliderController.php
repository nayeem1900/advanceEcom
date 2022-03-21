<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
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
             'title' =>$request->title,
            'description' =>$request->description,
            'image' =>$save_url,
            'created_at' => Carbon::now(),


        ]);

        $notification=array(
            'message'=>'Slider Insert',
            'alert-type'=>'success'
        );
        return Redirect()->back()->with($notification);



    }



}
