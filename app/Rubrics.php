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
        'name', 'cols',
    ];


    public function rowobjects()
    {
        return $this->hasMany('App\Rows')->orderBy('order','asc');
    }

}
