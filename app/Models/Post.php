<?php

namespace App\Models;

use App\Casts\KeyValueCast;
use App\Enums\PostStatusEnum;
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
        'slug',
        'status'
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
     * @var string[]
     */
    protected $casts = [
        'status' => KeyValueCast::class . ':' . PostStatusEnum::class,
    ];

    /**
     * @return string
     */
    public function getPostImageAttribute(): string
    {
        return $this->getFirstMediaUrl(self::MEDIA_COLLECTION_NAMESPACE);
    }
}
