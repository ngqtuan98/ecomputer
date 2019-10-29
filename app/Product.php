<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function presentPrice()
    {
        return number_format($this->price);
    }
    public function scopeMightAlsoLike($query)
    {
        return $query->inRandomOrder()->take(9);
    }
}
