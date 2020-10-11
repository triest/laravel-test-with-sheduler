@extends('layouts.app',['title'=>"Статьи"])

@section('content')
    @foreach($articles as $item)
        <div class="card mb-4">
            <img class="card-img-top" src="http://placehold.it/750x300" alt="Card image cap">
            <div class="card-body">
                <h2 class="card-title">{{$item->title}}</h2>
                <p class="card-text">{{$item->getShort()}}...</p>
                <a href="{{route('articleItem',['slug'=>$item->slug])}}" class="btn btn-primary">Read More &rarr;</a>
            </div>
            <div class="card-footer text-muted">
                Posted on January 1, 2020 by
                <a href="">Start Bootstrap</a>
            </div>
        </div>
    @endforeach
    {{ $articles->links() }}
@endsection
