<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'parent_id'
    ];

    public function parent()
    {
        return $this->belongsTo(Tag::class);
    }

    public function posts() {
        return $this->belongsToMany(Post::class, 'post_tag');
    }
}
