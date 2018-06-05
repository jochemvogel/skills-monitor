<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'course_abbreviation', 'real_abbreviation', 'course_code',
    ];

    public function rubrics() {
      return $this->belongsToMany(Rubric::class);
    }

    public function users() {
        return $this->belongsToMany(User::class);
    }

}
