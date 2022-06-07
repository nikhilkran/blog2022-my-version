<?php
namespace App\Traits;

trait searchTrait  // trait is a class don't confuse with folder name Traits
{
    public function scopeSearch($query, $field, $search)
    {
        if ($search !== '')
        {
            return $query->where($field, 'like', "%$search%");
        }
    }
}