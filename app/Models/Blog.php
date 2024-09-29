<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    public function getRouteKeyName(){
        return 'slug';
    }

    protected $fillable = ['title', 'slug', 'thumbnail', 'excerpt', 'content', 'category_id', 'user_id', 'user_photo', 'views'];

    # clockwork queries first working
    protected $with = ['category', 'user'];

    public function category(){
        return $this->belongsTO (Category::class);
    }

    public function user(){
        return $this->belongsTO (User::class);
    }
}
