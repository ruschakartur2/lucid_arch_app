<?php

namespace App\Console\Commands;

use App\Repository\PostRepository;
use Illuminate\Console\Command;

class UpdatePostStatusCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update-post-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update post statuses command';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param PostRepository $postRepository
     * @return void
     */
    public function handle(PostRepository $postRepository)
    {
        $posts = $postRepository->getOldPostList();

        foreach ($posts as $post) {
            $post->status = 'close';
            $post->save();
        }
    }
}
