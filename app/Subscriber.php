<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name', 'email',
    ];
}
