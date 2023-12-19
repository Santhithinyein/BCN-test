<?php

namespace App\Models;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model  implements Authenticatable
{
    use AuthenticatableTrait;
    use HasFactory;
    protected $guarded =[
        'id'
    ];
  
    public function products(){
        return $this->hasMany(Product::class);
    }

   
    public function cart()
    {
        return $this->hasOne(Cart::class);
    }


}
