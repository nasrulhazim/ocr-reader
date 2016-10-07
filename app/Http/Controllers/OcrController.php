<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Ocr\Reader;
use App\Ocr;
use Storage;
use Auth;

class OcrController extends Controller
{
	public function create()
	{
		return view('ocrs.create');
	}

    public function store(Request $request)
    {
    	$this->validate($request, [
	        'ocr' => 'required|image'
	    ]);
    	$file = request()->file('ocr')->store('ocr');
		Reader::read($file);
		return redirect('/home');
    }
}
