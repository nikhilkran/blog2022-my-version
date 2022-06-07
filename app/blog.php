<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Traits\searchTrait;


class Blog extends Model
{
    //
    use SoftDeletes;           // camelcase written     // we have used softDelete and searchTrait here beacuse we have used model everywhere in controller
    Use searchTrait;
    
    public function category()                              // not used on any blade page since we already have category_id table in blog module
    {
        
    return $this->belongsTo('App\Category');                                  
    }

    public function tags()                                    // what we have defined in blade page i,e in foreach loop and (blog_tag or tag_blog in both cases it is (many to many) relationship
    {
        return $this->belongsToMany('App\Tag');
    }
}
