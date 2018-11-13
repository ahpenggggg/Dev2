<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $fillable = [
      'item',
      'name',
      'price',
      'description',
      'amount'
    ];
}
