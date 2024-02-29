<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'image_path',
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeSearch($query,$filter){
        if ($filter['id'] ?? null) {
            $query->where(function ($query) use ($filter) {
                    $query
                        ->where('id', 'Like', '%' . $filter['id'] . '%');
                });
        }
    }
}
