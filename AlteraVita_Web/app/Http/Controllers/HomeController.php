<?php

namespace App\Http\Controllers;

use App\Annonce;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $announce = Annonce::orderBy('id_annonce','DESC')->get();
        return view('index')->with('annonce', $announce);
    }
}
