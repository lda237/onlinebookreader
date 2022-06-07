<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Banner;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Reader;
use Illuminate\Support\Facades\Stroage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Svg\Tag\Rect;

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

    public function about()
    {
      $abouts=About::first();
      return view("User.about",compact('abouts'));
    }

    public function shop_single($id)
    {
        $readers=Reader::orderBy('id','Desc')->get();
   $reader=Reader::findOrFail($id);
$user=Auth::user();
      return view("User.shop-single",compact('reader','user','readers'));

    }

public function buy($reader_id){
$user=Auth::user();
//dd($user);
// if($user!=""){
    $reader=Reader::find($reader_id);
    $reader->users()->attach($user->id);
    return redirect('/auth_user/dashboard');
// }else{
// return back()->with('status',"pour acheter un livre, vous devez vous authentifier. et si vous n'avez pas de compte créez en un");
// }

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
public function search(Request $request){
    $search=$request->input('search');
    $search_reader = Reader::where('title','like','%'.$search.'%')->orderBy('id')->paginate(6);
    return view("User.search",compact('search_reader'));
}
}
