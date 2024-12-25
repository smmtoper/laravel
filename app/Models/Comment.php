<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['content', 'post_id'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
    public function scopeActive($query)
    {
        return $query->whereNull('deleted_at');  
    }

    public function scopeContaining($query, $text)
    {
        return $query->where('content', 'like', '%' . $text . '%');
    }

    public function scopeRecent($query)
    {
        return $query->where('created_at', '>=', now()->subWeek());
    }
}
