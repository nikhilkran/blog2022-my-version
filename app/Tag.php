<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    //
    use SoftDeletes;

    public function blogs()                                                                                                                           // what we have used in index page foreach loop
    {
        return $this->belongsToMany('App\Blog');
    }

}
