<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogHashtag extends Model
{
    use HasFactory;

    protected $table = 'blog_hashtag';

    protected $guarded = ['id'];
}
