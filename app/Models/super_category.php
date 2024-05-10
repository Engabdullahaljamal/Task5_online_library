<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class super_category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];

    public function category()
    {
        return $this->hasMany(category::class);
    }
}
