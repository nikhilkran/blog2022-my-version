<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class cmnt extends Model
{
    //
    
    public function blog()     // not used on any blade page since we already have category_id column in blog module
    {
        
    return $this->belongsTo('App\Blog');                  // using one to many inverse relationship concept                
    }
}
