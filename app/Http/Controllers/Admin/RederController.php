<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Reader;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class RederController extends Controller
{
    public function index()
   {
       $readers=reader::all();
      $categories=Category::all();

       return view('Admin.reader',compact('readers','categories'))->with('status','reader have been added with success');
   }

    //saving the new reader and redirect  to the view reader
    public function store(Request $request)
    {

        $category=Category::findOrFail($request->category_id);



           $this->validate($request,[
            // 'url' => 'empty_if:attachment|url|URL|string',
            // 'attachment' => 'empty_if:url|attachment',
            // 'attachment.*' => 'mimes:jpg,jpeg,bmp,png,doc,docx,zip,rar,pdf,rtf,xlsx,xls,txt,csv|max:1999',
            // 'client' => 'required|string',
            // 'projectTask' => 'required',
            'file.*' => 'mimes:csv,txt,xlx,xls,pdf|max:2048',
      ]);
$file=$request->file;
$pdfname=time().'.'.$file->getClientOriginalExtension();
$request->file->move('assets',$pdfname);
        //    $readername = $request->file('file')->getClientOriginalName();

        //    $path = $request->file('file')->store('public/files');

        //    $file=$request->file;
        //    $readername=$file->getClientOriginalName();
        //    $file->save(public_path('public/files').$readername);

           $image=$request->image;
           $filename=$image->getClientOriginalName();
           $image_resize=Image::make($image->getRealpath());
          // $image_resize->resize(1024,259);
           $image_resize->save(public_path('storage/').$filename);

           $reader = new Reader;
           $reader->title=$request->input('title');
           $reader->autor=$request->input('autor');
           $reader->readername = $pdfname;
           $reader->path = $pdfname;
           $reader->image=$filename;
           $reader->description=$request->input('description');
           $reader->price=$request->input('price');

        $category->readers()->save($reader);

        return redirect('/admin/reader')->with('status','reader have been added with success');
    }

     public function update(Request $request,$id)
    {

 $reader=reader::findOrFail($id);

     //  $imagePath = request('image')->store('uploads','public');

            if($reader){
         $reader->name=$request->input('name');
        $reader->price=$request->input('price');
        $reader->image=$request->input('image');
        $reader->description=$request->input('description');
         $reader->save();

            }

       return redirect('/reader');
    }

    public function delete($id)
    {

        $reader=Reader::findORFail($id);
        $reader->delete();
        return back();

    }
}
/*
$this->validate($request, [
            'name' => 'required',
            'imgFile' => 'required|image|mimes:jpg,jpeg,png,svg,gif|max:2048',
        ]);

        $image = $request->file('imgFile');
        $input['imagename'] = time().'.'.$image->extension();

        $filePath = public_path('/thumbnails');

        $img = Image::make($image->path());
        $img->resize(110, 110, function ($const) {
            $const->aspectRatio();
        })->save($filePath.'/'.$input['imagename']);

        $filePath = public_path('/images');
        $image->move($filePath, $input['imagename']);

        return back()
            ->with('success','Image uploaded')
            ->with('fileName',$input['imagename']);
*/


