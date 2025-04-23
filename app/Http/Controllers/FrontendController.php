<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Carousel;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.index');
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
        $equipo = User::where('type', 'colaborador')->orWhere('type', 'tesista')->orWhere('type', 'lider')->orderBy('type', 'asc')->get();
        return view('frontend.info.equipo', compact('equipo'));
    }

}
