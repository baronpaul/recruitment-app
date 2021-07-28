<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'title', 
    ];
}
