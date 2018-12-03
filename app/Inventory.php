<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $fillable = [
      'inventoryName',
      'itemID',
      'inventoryPrice',
      'inventoryDesc',
      'inventoryAmount'
    ];
}
