<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gallery;

class GalleryController extends Controller
{
    public function showform()
    {
        $images = Gallery::all();
        return view('admin.gallery.index', compact('images'));
    }
    
    
    public function index()
    {
        $images = Gallery::all();
        return view('gallary', compact('images'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'images.*' => 'required|image|mimes:jpg,jpeg,png,gif'
        ]);
    
        foreach ($request->file('images') as $image) {
            $imageName = time() . '-' . uniqid() . '.' . $image->extension();
            $image->move(public_path('uploads/gallery'), $imageName);
    
            Gallery::create(['image' => $imageName]);
        }
    
        return redirect()->back()->with('success', 'Images uploaded successfully!');
    }

   
    public function destroy($id)
    {
        $image = Gallery::findOrFail($id);
        $imagePath = public_path('uploads/gallery/' . $image->image);

        if (file_exists($imagePath)) {
            unlink($imagePath);
        }

        $image->delete();

        return redirect()->back()->with('success', 'Image deleted successfully!');
    }
}
