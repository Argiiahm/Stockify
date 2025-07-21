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
            return $this->belongsTo(Suppliers::class);
        }

        public function categories() {
            return $this->belongsTo(Categories::class);
        }

}
