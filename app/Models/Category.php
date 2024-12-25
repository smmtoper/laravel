<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function scopeWithName($query, $name)
    {
        return $query->where('name', 'like', '%' . $name . '%');
    }

    public function scopeWithPostCount($query, $count)
    {
        return $query->whereHas('posts', function ($query) use ($count) {
            $query->havingRaw('count(*) >= ?', [$count]);
        });
    }

    public function scopeWithActivePosts($query)
    {
        return $query->whereHas('posts', function ($query) {
            $query->whereNull('deleted_at');  
        });
    }
}
