<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderitem extends Model
{
    use HasFactory;

    public function order()
    {
      return $this->belongsTo('App\Models\Order');
    }

    public function product()
    {
      return $this->belongsTo('App\Models\Product');
    }
}
