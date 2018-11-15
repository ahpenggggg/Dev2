<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesExport extends Model
{
  protected $fillable = [
    'item_name',
    'item_code',
    'item_price',
    'item_qty',
    'item_tax',
    'item_status',
    'created_at'
  ];
}
