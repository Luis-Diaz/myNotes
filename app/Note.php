<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Moloquent;

class Note extends Moloquent
{
    protected $fillable = [
        'content'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
