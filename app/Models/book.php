<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    use HasFactory;
    protected $fillable = [
        'book_name',
        'book_author_name',
        'category_id',
        'rate',
    ];


    public function category()
    {
        return $this->belongsTo(category::class, 'category_id', 'id');
    }
}
