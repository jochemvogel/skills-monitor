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
        'name', 'cols', 'course_id', 'user_id'
    ];

    // Unit test function
    public function getName() {
        return 'Test rubric';
    }

    public function rowobjects()
    {
        return $this->hasMany('App\Rows')->orderBy('order','asc');
    }

    public function courses()
    {
      return $this->belongsToMany(Course::class);
    }

    public function courses_id()
    {
        return $this->belongsTo('App\Course', 'course_id');
    }

    public function creator()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
