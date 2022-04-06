<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reader extends Model
{
    use HasFactory;
    protected $fillable =['title','readername','price', 'description','author', 'image', 'image', 'path'];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
