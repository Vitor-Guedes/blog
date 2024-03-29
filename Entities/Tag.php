<?php

namespace Modules\Blog\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tag extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'article_id',
        'code'
    ];
    
    protected static function newFactory()
    {
        return \Modules\Blog\Database\factories\TagFactory::new();
    }
}
