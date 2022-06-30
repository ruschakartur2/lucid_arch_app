<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Spatie\MediaLibrary\InteractsWithMedia;

class Comment extends Model
{
    use InteractsWithMedia;

    /**
     * @var string
     */
    protected $table = 'comments';

    /**
     * @var string
     */
    const MEDIA_COLLECTION_NAMESPACE = 'comments';

    /**
     * @var string[]
     */
    protected $fillable = [
        'comment',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function post(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Post::class)->withDefault();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class)->withDefault();
    }
}
