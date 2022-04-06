<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
class BannerController extends Controller
{
    public function index()
    {
        $banners=Banner::orderBy('id','Desc')->get();

        return view('Admin.banner',compact('banners'));
    }

     public function store(Request $request)
     {
        $image=$request->file;
        $filename=$image->getClientOriginalName();
        $image_resize=Image::make($image->getRealpath());
        //$image_resize->resize(1024,259);
        $image_resize->save(public_path('storage/').$filename);

         $banner =new Banner;
         $banner->description=$request->input('description');
         $banner->image=$filename;
         $banner->save();

         return back()->with('status','banner have been added with success');
     }

     public function delete($id)
     {

         $banner=banner::findORFail($id);
         $banner->delete();
         return back()->with('status','banner have been delete with success');

     }
 }

