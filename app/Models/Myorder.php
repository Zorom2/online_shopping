<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Myorder extends Model
{
    use HasFactory;

    public function orderitem()
    {
      return $this->belongsTo('App\Models\Orderitem');
    }
    
}
