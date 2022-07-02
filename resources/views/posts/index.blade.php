@extends('layouts.layout')

@section('title', 'Aktan Nurkaydarov Blog')

@section('carousel')
    <div class="item">
        <img src="{{asset('assets/images/banner-item-01.jpg')}}" alt="">
        <div class="item-content">
            <div class="main-content">
                <div class="meta-category">
                    <span>Fashion</span>
                </div>
                <a href="post-details.html"><h4>Morbi dapibus condimentum</h4></a>
                <ul class="post-info">
                    <li><a href="#">Admin</a></li>
                    <li><a href="#">May 12, 2020</a></li>
                    <li><a href="#">12 Comments</a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('content')
    @foreach($posts as $post)
    <div class="blog-post">
        <div class="blog-thumb">
            <img src="{{$post->getImage()}}" alt="">
        </div>
        <div class="down-content">
            <span><a href="{{route('categories.single', ['slug' => $post->category->slug])}}" style="color: #f48840;">{{$post->category->title}}</a></span>
            <a href="{{route('posts.single', ['slug' => $post->slug])}}"><h4>{{$post->title}}</h4></a>
            <ul class="post-info">
                <li><a href="#">
                        {{$post->user->name ?? "Нет автора"}}
                    </a>
                </li>
                <li>{{$post->getPostDate()}}</li>
                <li><i class="fa fa-eye"></i> {{$post->views}}</li>
            </ul>
            <div>
                {!! $post->description !!}
            </div>
            <div class="post-options">
                <div class="row">
                    <div class="col-6">
                        <ul class="post-tags">
                            <li><i class="fa fa-tags"></i></li>
                            @if($post->tags->count())
                            @foreach($post->tags as $tag)
                                <li><a href="#">{{$tag->title}}</a></li>
                            @endforeach
                            @endif


                        </ul>
                    </div>
                    <div class="col-6">
                        <ul class="post-share">
                            <li><i class="fa fa-share-alt"></i></li>
                            <li><a href="#">Facebook</a>,</li>
                            <li><a href="#"> Twitter</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <div class="row">
        <div class="col-lg-12">
            {{$posts->links()}}

        </div>
    </div>
@endsection


