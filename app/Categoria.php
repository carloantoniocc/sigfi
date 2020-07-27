<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    public function scopeSearch($query,$search) {
        if( trim($search) != "" ){
            $query->where('name', "LIKE", "%$search%");
        }
    }
}
