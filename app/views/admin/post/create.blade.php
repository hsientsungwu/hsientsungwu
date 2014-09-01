@extends('template.master')

@section('title')
  Create Post | HsienTsungWu
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
         
            {{ Form::open(array('route' => 'admin.posts.store')) }}
                <div class="title-editable" id="post-title"><h1>Enter post title</h1></div>
                <div class="body-editable" id="post-body"><p>Enter post body</p></div>
            {{ Form::submit('Save Post', array('class' => 'btn btn-primary', 'id' => 'form-submit')) }}
         
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