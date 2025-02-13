<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Submenu;

class SubmenuController extends Controller
{
    // Store a new submenu
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|string|max:255',
            'menu_id' => 'required|exists:menus,id',
        ]);

        Submenu::create([
            'name' => $request->name,
            'url' => $request->url,
            'menu_id' => $request->menu_id,
        ]);

        return redirect()->back()->with('success', 'Submenu added successfully!');
    }

    // Update an existing submenu
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'url' => 'required|string|max:255',
        ]);

        $submenu = Submenu::findOrFail($id);
        $submenu->update([
            'name' => $request->name,
            'url' => $request->url,
        ]);

        return redirect()->back()->with('success', 'Submenu updated successfully!');
    }

    // Delete a submenu
    public function destroy($id)
    {
        $submenu = Submenu::findOrFail($id);
        $submenu->delete();

        return redirect()->back()->with('success', 'Submenu deleted successfully!');
    }
}
