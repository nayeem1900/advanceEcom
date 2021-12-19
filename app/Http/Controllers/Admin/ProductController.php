<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function addProduct(){
$categories=Category::latest()->get();
$brands=Brand::latest()->get();
    return view('admin.product.create',compact('categories','brands'));

    }


}

