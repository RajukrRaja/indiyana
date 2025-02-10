<?php

namespace App\Http\Controllers;
use \App\Models\Page;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function allpages()
    {
        $pages = Page::all();
        return view('backend.pages.allpages', ['pages' => $pages]);
    }



   

    public function edit_page(Request $request)
    {
        // Validation rules for updating an existing page
        $rules = [
            'id' => 'required|exists:pages,id', // ID *must* be present and exist
            'title' => 'required|string|max:255',
            'content' => 'nullable|string',
            'status' => 'required|in:Draft,Published,Archived',
            'tags' => 'nullable|string', // Add validation for tags if exists
        ];
    
        $validatedData = $request->validate($rules);
    
        // Find the page. findOrFail will throw a 404 if the ID isn't valid.
        $page = Page::findOrFail($validatedData['id']);
    
        // Update the page attributes
        $page->title = $validatedData['title'];
        $page->content = $validatedData['content'];  // Update the content
        $page->status = $validatedData['status'];
        $page->tags = $validatedData['tags'] ?? null; //Update tags, using null coalescing operator
    
        $page->save();
    
        // Return a JSON response indicating success
        return response()->json(['message' => 'Page updated successfully!', 'page' => $page]);
    }
    

    public function edit_page_view($id)
    {
        // Fetch the page details from the database
        $page = Page::find($id);
    
        // Check if the page exists
        if (!$page) {
            abort(404, 'Page not found');
        }
    
        // Pass the page details to the view
        return view('backend.pages.edit_page_view', compact('page'));
    }
    
    public function about_page(){

        return view('frontend.about_page');
    }
    
    
}


