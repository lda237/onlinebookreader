<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Reader;
use Illuminate\Support\Facades\Stroage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
      $readers=Reader::orderBy('id','Desc')->get();
      $banners=Banner::orderBy('id','Desc')->get();
      return view("User.index",compact('readers','banners'));
    }

    public function shop()
    {
      $readers=Reader::orderBy('id','desc')->simplePaginate(4);
      $categories=Category::all();
      return view("User.shop",compact('readers','categories'));
    }

    public function shop_single($id)
    {
   $reader=Reader::findOrFail($id);
      return view("User.shop-single",compact('reader',));

    }

public function payment($method){
if ($method=="orange") {
    return redirect("orange");
}elseif($method=="mtn"){
    return redirect("mtn");
}else{
return redirect("paypal");
}

}
    public function download(Request $request,$readername)
    {
//dd($readername);
return response()->download(public_path('assets/'. $readername));
    }

//counting the number of readerin a cart  calling it to the user nave bar
static function cart_item()
{
if(Auth::user())
{
  $userId=Auth::user()->id;
return Cart::where('user_id',$userId)->count();
}
else {
  return (0);
}
}
}
