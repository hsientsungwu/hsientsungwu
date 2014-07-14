@extends('template.master')

@section('title')
	Blog | HsienTsungWu
@stop

@section('content')
    @foreach ($posts as $post)
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <h1 class="section-heading">{{ $post->title }}</h1>
                    <p class="lead section-lead">{{ Str::words($post->content, $words = 50, $end = '... <a href="/blog/post/' . $post->alias . '/">Read More</a>') }}</p>
                </div>
            </div>
        </div>
    @endforeach

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@stop