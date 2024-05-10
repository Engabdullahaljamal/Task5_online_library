<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use PhpParser\Builder\Function_;

class category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'id',
        'super_category_id',

    ];
    public function super_category()
    {
        return $this->belongsTo(super_category::class, 'super_category_id', 'id');
    }
    public function book()
    {
        return $this->hasMany(book::class);
    }
}
