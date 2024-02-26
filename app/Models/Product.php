<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $guarded=[
        'id'
    ];

    #a product belongsTo a Category
    public function category(){
        return $this->belongsTo(Category::class);
    }

    # a product belongsTo a user
   public function user(){
        return $this->belongsTo(User::class);
   }
   
   public function carts()
    {
        return $this->belongsToMany(Cart::class)->withPivot('quantity');
    }

    public function scopeSearch($query,$filter){
        if ($filter['search'] ?? null) {
            $query
                ->where(function ($query) use ($filter) {
                    $query
                        ->where('name', 'Like', '%' . $filter['search'] . '%');
                });
        }
            if ($filter['category'] ?? null) {
                $query->whereHas('category', function ($catQuery) use ($filter) {
                    $catQuery->where('name', $filter['category']);
                });
            }
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
   
}


