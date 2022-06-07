<?php

namespace App\Http\Controllers;

use App\Models\About;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $abouts=About::orderBy('id','Desc')->get();

        return view('Admin.about',compact('abouts'));
    }

     public function store(Request $request)
     {
        $image=$request->file;
        $filename=$image->getClientOriginalName();
        $image_resize=Image::make($image->getRealpath());
        //$image_resize->resize(1024,259);
        $image_resize->save(public_path('storage/').$filename);

         $about =new About;
         $about->description=$request->input('description');
         $about->image=$filename;
         $about->save();

         return back()->with('status','about have been added with success');
     }

     public function delete($id)
     {

         $about=About::findORFail($id);
         $about->delete();
         return back()->with('status','about have been delete with success');

     }
 }

