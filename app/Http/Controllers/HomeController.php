<?php

    namespace App\Http\Controllers;

    use App\Article;
    use App\Jobs\CalculateViews;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Log;

    class HomeController extends Controller
    {
        /**
         * Create a new controller instance.
         *
         * @return void
         */
        public function __construct()
        {
            //  $this->middleware('auth');
        }

        /**
         * Show the application dashboard.
         *
         * @return \Illuminate\Contracts\Support\Renderable
         */
        public function index()
        {
            $articles = Article::select(['*'])->paginate(10);

            return view('home')->with(['articles' => $articles]);
        }

        public function view($slug)
        {
            $article = Article::select(['*'])->where('slug', $slug)->first();

            if ($article == null) {
                return 404;
            } else {
                $article->addView();
            }

            $comments = $article->comments()->get();

            return view('article.view')->with(['item' => $article, 'comments' => $comments]);
        }

        public function log()
        {
            Log::info('This is some useful information.');
            CalculateViews::dispatchAfterResponse();
            return response("ok", 200);
        }
    }
