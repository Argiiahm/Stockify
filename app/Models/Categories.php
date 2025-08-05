<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categories extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $guarded = [];

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }

    protected static function booted()
    {
        static::created(function ($Category) {
            if (Auth::check()) {
                UserActivity::create([
                    'user_id' => auth()->user()->id,
                    'action' => 'create',
                    'activity' => 'Membuat Category: ' . $Category->name
                ]);
            }
        });

        static::updated(function ($Category) {
            if (Auth::check()) {
                UserActivity::create([
                    'user_id' => auth()->user()->id,
                    'action' => 'update',
                    'activity' => 'Mengubah Category: ' . $Category->name
                ]);
            }
        });

        static::deleted(function ($Category) {
            if (Auth::check()) {
                UserActivity::create([
                    'user_id' => auth()->user()->id,
                    'action' => 'delete',
                    'activity' => 'Menghapus Category: ' . $Category->name
                ]);
            }
        });
    }
}
