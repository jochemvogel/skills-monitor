<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Results extends Model {
    protected $fillable = [
        'course', 'blok', 'grade', 'ec',
    ];
}