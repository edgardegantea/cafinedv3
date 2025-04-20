<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carousel;

class FrontendController extends Controller
{
    public function index()
    {
        $carouselItems = Carousel::where('is_active', true)
            ->orderBy('order')
            ->get();

        return view('frontend.index', compact('carouselItems'));
    }


    public function about()
    {
        return view('frontend.info.about');
    }


    public function contact()
    {
        return view('frontend.info.contact');
    }

    public function faq()
    {
        return view('frontend.info.faq');
    }


    public function terms()
    {
        return view('frontend.info.terms');
    }

    public function privacy()
    {
        return view('frontend.info.privacy');
    }

    public function equipo()
    {
        return view('frontend.info.equipo');
    }

}
