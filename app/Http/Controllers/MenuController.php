<?php

namespace App\Http\Controllers;
use \App\Models\Menu;

use Illuminate\Http\Request;

class MenuController extends Controller
{
   public function Navbar_page(){

    $menus = Menu::with('submenus')->orderBy('order')->get();
    return view('backend.pages.Navbar' , compact('menus'));
  
   }



   public function Navbar_page_view()
   {
       $menus = Menu::with('submenus')->orderBy('order')->get();
       return view('Navbar_page_view', compact('menus'));
   }

public function add_menu_view()
{
    return view('backend.pages.add_menu_view');
}

public function index() {
    $menus = Menu::with('submenus')->get();
    return view('manage', compact('menus'));
}

public function store(Request $request) {
    Menu::create($request->all());
    return back()->with('success', 'Menu added successfully.');
}

public function update(Request $request, $id) {
    $menu = Menu::findOrFail($id);
    $menu->update($request->all());
    return back()->with('success', 'Menu updated successfully.');
}

public function destroy($id) {
    Menu::findOrFail($id)->delete();
    return back()->with('success', 'Menu deleted successfully.');
}
}
   

