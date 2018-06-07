<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    function rubrics(){
        return $this->BelongsTo(Rubrics::class);
    }
}
