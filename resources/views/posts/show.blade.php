@extends('layouts.layout')

@section('title', 'Aktan Nurkaydarov Blog' . $post->title)
@section('content')

    <div class="blog-post">
        <div class="blog-thumb">
            <img src="{{$post->getImage()}}" alt="">
        </div>
        <div class="down-content">
            <span><a href="{{route('categories.single', ['slug'=>$post->category->slug])}}">{{$post->category->title}}</a></span>
            <h4>{{$post->title}}</h4>
            <ul class="post-info">
                <li><a href="#">{{$post->user->name ?? 'Нет автора'}}</a></li>
                <li><a href="#">{{$post->getPostDate()}}</a></li>

            </ul>
            <div>{!!$post->content!!}</div>
            <div class="post-options">
                <div class="row">
                    <div class="col-6">
                        <ul class="post-tags">
                            <li><i class="fa fa-tags"></i></li>
                            @if($post->tags->count())
                                @foreach($post->tags as $tag)
                                    <li><a href="{{route('tags.single', ['slug' => $tag->slug])}}">{{$tag->title}}</a></li>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                    <div class="col-6">
                        <span><i class="fa fa-eye"></i> {{$post->views}}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
