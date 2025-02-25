<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{



    public function user()
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id')->where('status', 'active');
    }

    public function product()
    {
        return $this->hasOne('App\Models\Product', 'id', 'product_id')->where('is_available', true);
    }


}
