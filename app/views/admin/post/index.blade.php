@extends('template.master')

@section('title')
  Blog Posts | HsienTsungWu
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
            <h1>All Posts</h1>
         
            <p>{{ link_to_route('admin.posts.create', 'Add new post') }}</p>
             
            @if ($posts->count())
                <table class="table table-striped posttable">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Body</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
             
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td style="width: 200px;">{{{ strip_tags($post->title) }}}</td>
                                <td>{{{ strip_tags(Str::words($post->body, 20)) }}}</td>
                                <td>{{ link_to_route('admin.posts.show', 'View', array($post->id), array('class' => 'btn btn-info')) }}</td>
                                <td>{{ link_to_route('admin.posts.edit', 'Edit', array($post->id), array('class' => 'btn btn-info')) }}</td>
                                <td>
                                     {{ Form::open(array('method' => 'DELETE', 'route' => array('admin.posts.destroy', $post->id))) }}
                                     {{ Form::submit('Delete', array('class' => 'btn btn-danger')) }}
                                     {{ Form::close() }}
                               </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                There are no posts
            @endif
        </div>
    </div>
@stop

@section('scripts')
    @include('admin.post.partial.posts_script')
@stop

@section('head')
    @include('admin.post.partial.posts_style')
@stop