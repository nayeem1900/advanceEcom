<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    public function index(){
        return view('admin.home');
    }

   // ===========================profile==================

    public function profile(){
        return view('admin.profile.index');
    }
//update personel prifile
    public function updateadminprofile(Request $request){

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



        Toastr::success('Profile Update SUccess','Success');
        return Redirect()->back();

        return Redirect()->back();
    }


    public function adminimage (){


        return view('admin.profile.change-image');



    }
//admin image store

public function adminimagestore(Request $request){

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

    Toastr::success('Image Update Success','Success');
    return Redirect()->back();

}

public function adminpasswordpage(){


    return view ('admin.profile.admin-password');

}


    public function adminstorepassword(Request $request){
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
