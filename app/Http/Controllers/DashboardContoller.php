<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardContoller extends Controller
{
    

    public function dashboard(){

        return view('backend.dashboard');
    }

  


}
