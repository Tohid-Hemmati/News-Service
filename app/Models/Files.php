<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    use HasFactory;

    public $fillable = ['url', 'post_id', 'name'];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
