<?php

namespace Modules\Blog\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'active',
        'url'
    ];

    protected $casts = [
        'active' => 'boolean'
    ];
    
    protected static function newFactory()
    {
        return \Modules\Blog\Database\factories\ArticleFactory::new();
    }

    public function getGridColumns()
    {
        return [
            'id',
            'title',
            'url',
            'is_active'
        ];
    }

    public function setActiveAttribute($value)
    {
        $this->attributes['active'] = $value;
    }

    public function getIsActiveAttribute()
    {
        return $this->attributes['active'] ? 'true' : 'false';
    }

    public function tags()
    {
        return $this->hasMany(Tag::class, 'article_id', 'id');
    }
}
