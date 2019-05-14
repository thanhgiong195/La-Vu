<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'name', 'address', 'email', 'content', 'create_by'
    ];

    public function user() {
        return $this->belongsTo('App\User', 'create_by')->withDefault();
    }
}
