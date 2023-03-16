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

        $extension = $request->file('image')->getClientOriginalExtension();

        $hashName = md5(time());
        $image_name = $hashName . "." .$extension;


        $file_path = $request->file('image')->storeAs(
            "images",
            $image_name,
            'public'
        );


        return back()
            ->with('success', 'You have successfully upload image.')
            ->with('image', $image_name);
    }
}
