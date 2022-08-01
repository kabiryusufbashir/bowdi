<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        return view('welcome');
    }

    public function whereWeWork(){
        return view('wherewework');
    }

    public function whoWeAre(){
        return view('whoweare');
    }

    public function whatWeDo(){
        return view('whatwedo');
    }

    public function contactUs(){
        return view('contactus');
    }
}
