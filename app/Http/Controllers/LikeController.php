<?php

    namespace App\Http\Controllers;

    use App\Article;
    use Illuminate\Http\Request;

    class LikeController extends Controller
    {
        //
        public function newLike(Request $request, $id)
        {
            $article = Article::findOrFail($id);
            $likes = $article->newLike();
            return $likes;
        }
    }
