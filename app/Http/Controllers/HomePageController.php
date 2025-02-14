<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function Home_page(){
       
        return view('backend.pages.Home_page');

    }
}
