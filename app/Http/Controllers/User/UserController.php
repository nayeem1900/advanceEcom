<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;


class UserController extends Controller
{
    public function index(){
        return view('user.home');
    }


    public function updateData(Request $request){
        $request->validate([

            'name'=>'required',
            'phone'=>'required',
        ],[
            'name.required'=>'Input Name',

        ]);


        User::findOrFail(Auth::id())->update([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'updated_at'=>Carbon::now(),

        ]);

//        $notification=array(
//        'message'=>'Your Message Here',
//            'alert-type'=>'success',
//
//        );

        Toastr::success('Profile Update SUccess','Success');
        return Redirect()->back();

    }

    //image page

    public function imagePage(){


        return view ('user.change-image');

    }
    //update Image

    public function updateimage(Request $request){
        $old_image=$request->old_image;

        if(User::findOrFail(Auth::id())->image == 'frontend/media/no.jpg'){

            $image =$request->file('image');
            $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('frontend/media/user/'.$name_gen);
            $save_url='frontend/media/user/'.$name_gen;
            User::findOrfail(Auth::id())->update([
                'image'=>$save_url



            ]);



        }else{

            unlink($old_image);
            $image =$request->file('image');
            $name_gen=hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('frontend/media/user/'.$name_gen);
            $save_url='frontend/media/user/'.$name_gen;
            User::findOrfail(Auth::id())->update([
                'image'=>$save_url
                ]);
        }

        Toastr::success('Image Insert Success','Success');
        return Redirect()->back();

    }

    public function updatepassPage(Request $request){


        return view ('user.password');

    }


///storePassword
    public function storePassword(Request $request){
        $request->validate([
            'old_password'=>'required',
             'new_password'=>'required',
            'password_confirmation'=>'required',

        ]);
        $db_pass=Auth::user()->password;
        $current_password=$request->old_password;
        $new_pass=$request->new_password;
        $confirm_pass=$request->password_confirmation;

       if( Hash::check($current_password,$db_pass)){
        if($new_pass==$confirm_pass){
            User::findOrfail(Auth::id())->update([
            'password'=>Hash::make($new_pass)

           ]);

           Auth::logout();
            Toastr::success('Your Password Change Successfully','Now Login With New Password');
            return Redirect()->route('login');

        }else{
            Toastr::error('New Password and Confirm Password Not Same','Inconceivable!');
            return Redirect()->back();

        }

       }else{
           Toastr::error('Old Password Not Match','Inconceivable!');
           return Redirect()->back();

       }



    }

}
