<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Category;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    public function index(){
        $admin = Admin::with('category')->get();
        return view('admin.index',compact('admin'));
    }
    public function create(){
        $catigories = Category::all();
        return view('admin.create',compact('catigories'));
    }
    public function store(Request $request){
        $admin = new Admin;
        $admin->title = $request->input('title');
        $admin->text = $request->input('text');
        if($request->hasfile('profile_image'))
        {
            $file = $request->file('profile_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/admins/', $filename);
            $admin->profile_image = $filename;
        }
        $admin->category_id = $request->input('category_id');
        $admin->save();
        return redirect()->back()->with('status','Image Added Successfully');
    }

    public function edit($id){
        $admin = Admin::find($id);
        $catigories = Category::all();
        return view('admin.edit',compact('admin','catigories'));
    }

    public function update(Request $request, $id){
        $admin = Admin::find($id);
        $admin->title = $request->input('title');
        $admin->text = $request->input('text');
        if($request->hasfile('profile_image'))
        {
            $destination = 'uploads/admins/'.$admin->profile_image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('profile_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('uploads/admins/', $filename);
            $admin->profile_image = $filename;
        }
        $admin->category_id = $request->input('category_id');
        $admin->update();
        return redirect()->back()->with('status','Image Update Successfully');
    }

    public function destroy($id){
        $admin = Admin::find($id);
        $destination = 'uploads/admins/'.$admin->profile_image;
        if(File::exists($destination)){
            File::delete($destination);
        }
        $admin->delete();
        return back();
    }

    public function main($category_id = null){
        $admin = Admin::all();
        $categories = Category::all();
        if ($category_id) {
            $admin = Admin::where('category_id', $category_id)->get();
        }

        return view('news',compact('admin', 'categories'));
    }
     
    public function shows($id){
        $item = Admin::find($id);
        return view('show',compact('item'));
    }

}
