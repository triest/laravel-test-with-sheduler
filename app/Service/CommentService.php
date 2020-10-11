<?php


    namespace App\Service;


    use App\Article;
    use App\Comment;

    class CommentService
    {

        public static function saveComment($article_id, $comment_text, $comment_title,$user_id=null)
        {
            $comment = new Comment();
            $article = Article::select(['*'])->where('id', $article_id)->first();

            $comment->article_id = $article_id;
            $comment->description = $comment_text;
            $comment->title = $comment_title;
            $comment->user_id=$user_id;
            $comment->save();
            return $comment;
        }
    }