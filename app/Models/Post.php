<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Post extends Model implements HasMedia
{
    use InteractsWithMedia;

    /**
     * @var string
     */
    protected $table = 'posts';

    /**
     * @var string
     */
    const MEDIA_COLLECTION_NAMESPACE = 'blogs';

    /**
     * @var string[]
     */
    protected $fillable = [
        'title',
        'description',
        'slug'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class)->withDefault();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * @return string
     */
    public function getPostImageAttribute(): string
    {
        return $this->getFirstMediaUrl(self::MEDIA_COLLECTION_NAMESPACE);
    }
}
