<?php

namespace App\Domains\Post\Jobs;

use App\Models\Post;
use Illuminate\Http\UploadedFile;
use Lucid\Units\Job;

class UploadPostImageJob extends Job
{
    /**
     * @var UploadedFile
     */
    private UploadedFile $image;

    /**
     * @var Post
     */
    private Post $post;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(UploadedFile $image, Post $post)
    {
        $this->image = $image;
        $this->post = $post;
    }

    /**
     * @return \Spatie\MediaLibrary\MediaCollections\Models\Media
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist
     * @throws \Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig
     */
    public function handle()
    {
        return $this->post
            ->addMedia($this->image)
            ->toMediaCollection($this->post::MEDIA_COLLECTION_NAMESPACE);
    }
}
