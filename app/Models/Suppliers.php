<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Suppliers extends Model
{
    use HasFactory;
    protected $table = 'suppliers';
    protected $guarded = [];

    public function products() {
        return $this->hasMany(Product::class, 'supplier_id');
    }
}
