<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Judgement extends Model
{
    function rubrics(){
        return $this->BelongsTo(Rubrics::class);
    }
}
