<?php

namespace App\Ocr;
use App\Ocr;
use Auth;
use TesseractOCR;

class Reader {
	public static function read($file)
	{
		$path = storage_path('app/'.$file);
		ob_start();
		echo (new TesseractOCR($path))->run();
		$data = ob_get_clean();
		$data = trim($data);
		if(empty($data)) {
			return false;
		}
		$ocr = Ocr::create([
			'user_id' => Auth::user()->id,
			'file' => $file,
			'data' => $data
		]);
		return $ocr;
	}
}