
@extends('layouts.layout')
@section('title', "Category")

@section('banner')
    <div class="heading-page header-text">
        <section class="page-heading">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-content">
                            <h4>Recent Posts</h4>
                            <h2>Our Recent Blog Entries</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@section('content')




    <div class="all-blog-posts">
        <div class="row">
            @if($posts->count())
                @foreach($posts as $post)
                    <div class="col-lg-6">
                        <div class="blog-post">

                            <div class="blog-thumb">
                                <img src="{{$post->getImage()}}" alt="">
                            </div>
                            <div class="down-content">
                                <span>{{$category->title}}</span>
                                <a href="{{route('posts.single', ['slug' => $post->slug])}}"><h4>{{$post->title}}</h4></a>
                                <ul class="post-info">
                                    <li><a href="#">{{$post->user->name ?? 'Нет автора'}}</a></li>
                                    <li><a href="#">{{$post->getPostDate()}}</a></li>

                                </ul>
                                <div>{!! $post->description !!}</div>
                                <div class="post-options">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <ul class="post-tags">
                                                <li><i class="fa fa-tags"></i></li>
                                                @foreach($post->tags as $tag)
                                                    <li><a href="{{route('tags.single', ['slug' => $tag->slug])}}">{{$tag->title}}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                Нет категорий
            @endif



            <div class="col-lg-12">
                @if($posts->count())
                {{$posts->links()}}
                @endif
            </div>
        </div>
    </div>
@endsection
