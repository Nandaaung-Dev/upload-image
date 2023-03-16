<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageUploadController extends Controller
{
    public function index()
    {
        return view('imageUpload');
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // $imageName = time() . '.' . $request->image->extension();
        $name = $request->file('image')->getClientOriginalName();
        $extension = $request->file('image')->getClientOriginalExtension();

        $hashName = md5(time());
        $image_name = $name . $hashName . "." .$extension;

        // $location = storage_path("");

        $file_path = $request->file('image')->storeAs(
            "images",
            $image_name,
            'public'
        );


        //To Store Image in Storage Folder
        // $request->image->storeAs('images', $imageName); // storage/app/images/file.png


        return back()
            ->with('success', 'You have successfully upload image.')
            ->with('image', $image_name);
    }
}
