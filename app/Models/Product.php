<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'sku', 'tempate_id'];

    public function template()
    {
        return $this->belongsTo('App\Models\Template');
    }    
}
