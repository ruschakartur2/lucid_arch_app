<?php

namespace App\Domains\Http\Jobs;

use Lucid\Units\Job;
use phpDocumentor\Reflection\Types\String_;

class RedirectBackJob extends Job
{
    /**
     * @var String_
     */
    private $withMessage;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($withMessage)
    {
        $this->withMessage = $withMessage;
    }

    /**
     * Execute the job.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function handle()
    {
        $back = back();

        if ($this->withMessage) {
            $back->with('success', $this->withMessage);
        }
        return $back;
    }
}
