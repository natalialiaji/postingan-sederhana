<?php

namespace App\Models;

// use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded = 'id';

    public function Posts()
    {
        return $this->hasMany(Post::class);
    }

    public function getcount_ctname()
    {
        Post::where('category_id')->count();
    }
}
