<?php

    namespace App\Jobs;

    use App\Article;
    use Illuminate\Bus\Queueable;
    use Illuminate\Contracts\Queue\ShouldQueue;
    use Illuminate\Foundation\Bus\Dispatchable;
    use Illuminate\Queue\InteractsWithQueue;
    use Illuminate\Queue\SerializesModels;
    use Illuminate\Support\Facades\Log;

    class CalculateViews implements ShouldQueue
    {
        use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

        /**
         * Create a new job instance.
         *
         * @return void
         */
        public function __construct()
        {
            //
        }

        /**
         * Execute the job.
         *
         * @return void
         */
        public function handle()
        {
            //
            Log::info('Calculate views');
            $articles = Article::select(['*'])->get();

            foreach ($articles as $article) {
                 $count=$article->view()->count();
                 $article->views=$count;
                 $article->save();
            }
        }
    }
