<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

class HomeController extends Controller
{
    public function index()
    {
        // echo URL::to('/');
        return view('frontend.home');
    }

    

    public function store(Request $request)
    {
        # code...
    }


}
