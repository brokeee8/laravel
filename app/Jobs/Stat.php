<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Mail\StatMail;


class Stat implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct(public $article_count, public $comment_count)
    {
        // 
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Mail::to('vladpadik@mail.ru')->send(new StatMail($this->article_count, $this->comment_count));

    }
}
