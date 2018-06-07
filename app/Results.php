<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Results extends Model {
    protected $fillable = [
        'course_id', 'blok', 'grade', 'ec',
    ];

    public function course() {
       return $this->belongsTo(Course::class);
    }
}