<?php

namespace App\Http\Controllers;

use App\Models\Postimage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageUploadController extends Controller
{
    public function addImage()
    {
        return view("add_image");
    }

    public function storeImage(Request $request)
    {
        $data = new Postimage;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = md5(time()) . '_' . $image->getClientOriginalName();
            $image->storeAs('public/images', $image_name);
            $data['image'] = $image_name;
        }

        $data->save();
        return redirect()->route('images.view');
    }


    public function viewImage()
    {
        $imageData = Postimage::all();
        return view('view_image', compact('imageData'));
    }
}
