<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
        protected $table = 'products';
        protected $guarded = [];

        public function suppliers() {
            return $this->belongsTo(Suppliers::class, 'suplier_id');
        }

        public function categories() {
            return $this->belongsTo(Categories::class, 'category_id');
        }

        public function attributes() {
            return $this->hasMany(Attribute::class);
        }

        public function stock() {
            return $this->hasMany(Stock::class, 'product_id');
        }

}
