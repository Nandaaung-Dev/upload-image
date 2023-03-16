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

        $imageName = time() . '.' . $request->image->extension();

        $location = storage_path("app/public");


        //Store Image in Public Folder
        // $request->image->move(storage_path('images'), $imageName); // public/images/file.png

        Storage::put(
            "$location/$imageName",
            $request->file('image'),
            'public'
        );


        //To Store Image in Storage Folder
        // $request->image->storeAs('images', $imageName); // storage/app/images/file.png


        return back()
            ->with('success', 'You have successfully upload image.')
            ->with('image', $imageName);
    }
}
