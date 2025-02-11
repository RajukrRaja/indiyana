<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class AboutUsController extends Controller
{
    public function About_page()
    {
        $aboutUs = AboutUs::all();
        return view('backend.pages.About_page', compact('aboutUs'));
    }

    public function about_page_view()
    {
        $aboutUs = AboutUs::all();
        return view('frontend.about_page_view', compact('aboutUs'));
    }

    public function edit_about($id)
    {
        $aboutUs = AboutUs::find($id);

        if (!$aboutUs) {
            return redirect()->back()->with('error', 'No About Us data found.');
        }

        return view('backend.pages.edit_about', compact('aboutUs'));
    }
    public function update_about(Request $request, $id)
    {
        $request->validate([
            'heading' => 'required|string|max:255',
            'description' => 'required|string',
            'bullet_point_1' => 'nullable|string',
            'bullet_point_2' => 'nullable|string',
            'bullet_point_3' => 'nullable|string',
            'image_main' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'image_small' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'is_active' => 'required|boolean'
        ]);
    
        $about = AboutUs::findOrFail($id);
        $about->heading = $request->heading;
        $about->description = $request->description;
        $about->is_active = $request->is_active;
    
        // Store bullet points as JSON
        $bulletPoints = array_filter([
            $request->bullet_point_1,
            $request->bullet_point_2,
            $request->bullet_point_3
        ]);
        $about->bullet_points = json_encode($bulletPoints);
    
        // Handle Main Image Upload
        if ($request->hasFile('image_main')) {
            if ($about->image_main && Storage::exists('public/' . $about->image_main)) {
                Storage::delete('public/' . $about->image_main); // Delete old image
            }
            $about->image_main = $request->file('image_main')->store('about_images', 'public');
        }
    
        // Handle Small Image Upload
        if ($request->hasFile('image_small')) {
            if ($about->image_small && Storage::exists('public/' . $about->image_small)) {
                Storage::delete('public/' . $about->image_small);
            }
            $about->image_small = $request->file('image_small')->store('about_images', 'public');
        }
    
        $about->save();
    
        return redirect('panel/pages/About_page')->with('success', 'About Us updated successfully!');
    }
    

}
