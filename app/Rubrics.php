<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rubrics extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'cols', 'course_id',
    ];


    public function rowobjects()
    {
        return $this->hasMany('App\Rows');
    }

    public function courses()
    {
      return $this->belongsToMany(Course::class);
    }

}
