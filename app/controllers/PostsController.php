<?php

class PostsController extends BaseController {
	protected $post;

	public function __construct(Post $post) 
	{
		$this->post = $post;
	}

	public function index() 
	{
		$posts = $this->post->all();

		return View::make('admin.post.index', compact('posts'));
	}

	public function create() 
	{
		return View::make('admin.post.create');
	}

	public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, Post::$rules);
 
        if ($validation->passes())
        {
            $this->post->create($input);
            return Response::json(array('success' => true, 'errors' => '', 'message' => 'Post created successfully.'));
        }
        return Response::json(array('success' => false, 'errors' => $validation, 'message' => 'All fields are required.'));
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $post = $this->post->findOrFail($id);
 
        return View::make('posts.show', compact('post'));
    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $post = $this->post->find($id);
 
        if (is_null($post))
        {
            return Redirect::route('admin.posts.index');
        }
 
        return View::make('posts.edit', compact('post'));
    }
 
    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        $input = array_except(Input::all(), '_method');
        $validation = Validator::make($input, Post::$rules);
 
        if ($validation->passes())
        {
            $post = Post::find($id);
            $post->update($input);
 
            return Response::json(array('success' => true, 'errors' => '', 'message' => 'Post updated successfully.'));
        }
 
        return Response::json(array('success' => false, 'errors' => $validation, 'message' => 'All fields are required.'));
    }
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->post->find($id)->delete();
 
        return Redirect::route('admin.posts.index');
    }
}