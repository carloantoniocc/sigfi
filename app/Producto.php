<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    public function scopeSearch($query,$search) {
        if( trim($search) != "" ){
            $query->where('name', "LIKE", "%$search%");
        }
    }

    public function compras()
    {
        return $this->hasMany(Compra::class);
    }



}
