<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rows extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'rubrics_id',
    ];

    public function fields()
    {
        return $this->hasMany('App\Field');
    }
}
