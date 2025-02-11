<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Http\Request;

class PageController extends Controller
{
    // Display all pages
    public function Navbar_page()
    {
        $pages = Page::all();
        return view('backend.pages.Navbar_page');
    }

    

    public function Contact_page()
    {
        $pages = Page::all();
        return view('backend.pages.Contact_page');
    }

    public function Service_page()
    {
        $pages = Page::all();
        return view('backend.pages.Navbar_page');
    }



    // Handle updating an existing page
    public function edit_page(Request $request)
    {
        // Validate request data
        $validatedData = $request->validate([
            'id' => 'required|exists:pages,id',
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'status' => 'required|in:Draft,Published,Archived',
            'tags' => 'nullable|string',
        ]);

        // Update the page
        $page = Page::findOrFail($validatedData['id']);
        $page->update([
            'title' => $validatedData['title'],
            'content' => $validatedData['content'],
            'status' => $validatedData['status'],
            'tags' => $validatedData['tags'] ?? null,
        ]);

        // Return success response
        return response()->json(['message' => 'Page updated successfully!', 'page' => $page]);
    }

    // Show the edit page form
    public function edit_page_view($id)
    {
        $page = Page::findOrFail($id); // Throws 404 if not found
        return view('backend.pages.edit_page_view', compact('page'));
    }

    // Display the about page
    public function about_page_view()
    {
        $AboutUs = AboutUs::all(); // Changed $Aboutus to $AboutUs
        return view('frontend.about_page_view', compact('AboutUs'));
    }
    
}
