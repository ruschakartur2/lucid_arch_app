<?php

namespace App\Console\Commands;

use App\Models\Post;
use Carbon\Carbon;
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
     * @return void
     */
    public function handle()
    {
        Post::where('created_at', '<=', Carbon::now()->subWeek())->update(['status' => 'draft']);
    }
}
