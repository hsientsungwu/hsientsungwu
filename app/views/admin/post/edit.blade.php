@extends('template.master')

@section('title')
  Edit Post | HsienTsungWu
@stop

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <!-- msg -->
                @if (Session::has('msg-success'))
                    <div class="alert alert-success" role="alert">{{ Session::get('msg-success') }}</div>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="error alert alert-danger"></div>
            <div class="success alert alert-success"></div>
         
            {{ Form::open(array('method' => 'PATCH', 'route' => array('admin.posts.update', $post->id))) }}
		        <div class="title-editable" id="post-title">{{ $post->title }}</div>
		        <div class="body-editable" id="post-content">{{ $post->content }}</div>
		        <input type="hidden" id="post-id" value="{{ $post->id }}">
		        {{ Form::submit('Update Post', array('class' => 'btn btn-primary', 'id' => 'form-update')) }}
		    {{ Form::close() }}
        </div>
    </div>
@stop

@section('scripts')
    @include('admin.post.partial.posts_script')
@stop

@section('head')
    @include('admin.post.partial.posts_style')
@stop