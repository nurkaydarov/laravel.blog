
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
            @if($categories->count())
                @foreach($categories as $category)
                    <div class="col-lg-6">
                        <div class="blog-post">

                            <div class="blog-thumb">
                                <img src="{{$category->getImage()}}" alt="">
                            </div>
                            <div class="down-content">
                                <span>{{$category->title}}</span>
                                <a href="{{route('posts.single', ['slug' => $category->slug])}}"><h4>{{$category->title}}</h4></a>

                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                Нет категорий
            @endif



            <div class="col-lg-12">
                @if($categories->count())
                    {{$categories->links()}}
                @endif
            </div>
        </div>
    </div>
@endsection
