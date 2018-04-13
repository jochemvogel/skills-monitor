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
        'name', 'rows', 'cols',
    ];


    public function rowobjects()
    {
        return $this->hasMany('App\Rows');
    }
}
