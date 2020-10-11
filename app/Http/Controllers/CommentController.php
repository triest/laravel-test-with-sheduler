<?php

    namespace App\Http\Controllers;

    use App\Http\Requests\RComment;
    use App\Service\CommentService;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Auth;

    class CommentController extends Controller
    {
        //
        public function add(RComment $RComment)
        {
            $auth = Auth::user();
            if ($auth == null) {
                return null;
            }
            CommentService::saveComment($RComment->article, $RComment->commentText, $RComment->title, $auth->id);
        }
    }
