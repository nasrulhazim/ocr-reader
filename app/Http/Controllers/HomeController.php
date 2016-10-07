<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ocr;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ocrs = Ocr::where('user_id', auth()->id())->paginate(5);
        return view('home', compact('ocrs'));
    }
}
