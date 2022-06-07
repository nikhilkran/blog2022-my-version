<?php

namespace App;                                         

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;          //since we are using softdeletes which is eloquent



class Category extends Model
{
    //
    use SoftDeletes;

    public function blogs()
    {
        return $this->hasMany('App\Blog');                  // Mistake of backward slash we uses forward slash
    }
   
}
