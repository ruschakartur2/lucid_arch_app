<?php

namespace App\Domains\Post\Jobs;

use App\Mail\PostMail;
use App\Models\Post;
use Illuminate\Support\Facades\Mail;
use Lucid\Units\Job;

class SendPostMailMessageJob extends Job
{
    /**
     * @var Post
     */
    private Post $post;

    /**
     * @var array
     */
    private array $emails;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Post $post, array $emails)
    {
        $this->post = $post;
        $this->emails = $emails;
    }

    /**
     * @return void
     */
    public function handle()
    {
        Mail::to($this->emails)->send(new PostMail($this->post));
    }
}
