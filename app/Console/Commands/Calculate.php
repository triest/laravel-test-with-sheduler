<?php

    namespace App\Console\Commands;

    use App\Jobs\CalculateLikes;
    use App\Jobs\CalculateViews;
    use Illuminate\Console\Command;
    use Illuminate\Support\Facades\Log;

    class Calculate extends Command
    {
        /**
         * The name and signature of the console command.
         *
         * @var string
         */
        protected $signature = 'calculate:all';

        /**
         * The console command description.
         *
         * @var string
         */
        protected $description = 'Command description';

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
         * Execute the console command.
         *
         * @return int
         */
        public function handle()
        {
            CalculateViews::dispatchAfterResponse();
            CalculateLikes::dispatchAfterResponse();
            return 0;
        }
    }
