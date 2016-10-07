<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ocr extends Model
{
    protected $fillable = [
    	'user_id', 'file', 'data'
    ];

    public function owner()
    {
    	return $this->belongsTo('App\User');
    }
}
