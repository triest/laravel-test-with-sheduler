@extends('layouts.app',['title'=>$item->title])

@section('content')
    <script type="application/javascript" src="{{ asset('js/comments.js') }}"></script>

    <div class="card mb-4">
        <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
        <div class="card-body">
            <h2 class="card-title">{{$item->title}}</h2>
            <p class="card-text">{{$item->description}}</p>

        </div>
        <i class="fa fa-eye">{{$item->views}}</i>

        <i class="fa fa-heart" style="cursor:pointer;" id="like"> {{$item->likes}}</i>

        <div class="card-footer text-muted">
            <a href={{ url()->previous() }}>Назад</a>
        </div>
    </div>

    <div class="alert alert-success alert-block" id="success" style="display: none">
        Ваше сообщение успешно отправленно!
    </div>

    <div class="alert alert-danger" id="error" style="display: none">
        Ошибка.Заполните все поля!
    </div>
    @if (Auth::check())
        <form id="commentform" name="commentform" action="">
            @csrf
            <div class="form-group">
                <input type="hidden" id="article_id" value="{{$item->id}}" name="article">
                <input type="text" name="title" id="title"></input>
            </div>
            <div class="form-group">
                <textarea name="commentText" id="commentText"></textarea>
            </div>
            <div class="form-group">
                <button type="submit">Отправить комментарий</button>
            </div>
        </form>
    @endif
    <div class="container">
        <div class="row">
            @foreach($comments as $comment)
                <div class="col-md-8">
                    <div class="media g-mb-30 media-comment">
                        <div class="media-body u-shadow-v18 g-bg-secondary g-pa-30">
                            <div class="g-mb-15">
                                <h5 class="h5 g-color-gray-dark-v1 mb-0">{{$comment->user()->first()->name}}</h5>
                                <span class="g-color-gray-dark-v4 g-font-size-12">{{$comment->created_at}}</span>
                            </div>

                            <p>{{$comment->description}}</p>

                        </div>
                    </div>
                </div>
        </div>
        @endforeach
    </div>


@endsection
