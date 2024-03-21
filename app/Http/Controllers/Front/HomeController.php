<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Slider;

class HomeController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view('front.home.index', [
            'title' => 'Home',
            'sliders' => $sliders
        ]);
    }
}
