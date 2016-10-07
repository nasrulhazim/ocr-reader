<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Ocr\Reader;
use App\Ocr;
use Illuminate\Support\Facades\Storage;
use Auth;
use Carbon\Carbon;

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
    	$file = request()->file('ocr');
    	$ext = $file->guessClientExtension();
    	$filename = $file->storeAs('public/' . auth()->id(), Carbon::now()->timestamp . '.' . $ext);
		$ocr = Reader::read($filename);

		if(!$ocr) {
			Storage::delete(storage_path('app/'.$filename));
			$request->session()->flash('message-error', 'OCR unable to get any text from image provided '.storage_path($filename));
			return back();
		}
		return redirect('/home');
    }

    public function show(Request $request, $id)
    {
    	$ocr = Ocr::find($id);
    	return view('ocrs.show', compact('ocr'));
    }

    public function destroy(Request $request, $id)
    {
    	if(Ocr::destroy($id)) {
    		return response()->json(['data' => 'Record removed', 'status' => true]);	
    	} else {
    		return response()->json(['data' => 'Unable to remove the record', 'status' => false]);
    	}
    }
}
