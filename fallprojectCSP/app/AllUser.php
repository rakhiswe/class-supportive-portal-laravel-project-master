<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AllUser extends Model
{
 public function teacher()
    {
        return $this->belongsTo(AllUser::class,'user_id');
    }
}
