<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{

	protected $fillable = [
        'name', 'type', 'user_id'
    ];

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
