<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use App\Post;

class PostsController extends AdminController
{
    public $categories;

    /**
     * PostsController constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->categories = array(
            '' => 'Choose category',
            config('constants.NEWS_CATEGORY_ID') => 'Tin Tức',
            config('constants.NEWS_CATEGORY_ID') => 'Sự Kiện'
        );
    }


    public function index(Request $request)
    {

        $searchPost = '';
        $categoryId = '';
        $posts = Post::latest('updated_at');
        if ($request->input('q')) {
            $searchPost = urldecode($request->input('q'));
            $posts = $posts->where('title', 'LIKE', '%'. $searchPost. '%');
        }

        if ($request->input('category_id')) {
            $categoryId = $request->input('category_id');
            $posts = $posts->where('category_id', '=', $categoryId);
        }

        $posts = $posts->paginate(env('ITEM_PER_PAGE'));

        return view('admin.post.index', compact('posts', 'searchPost', 'categoryId'));
    }

    public function create()
    {
        $categories = $this->categories;
        return view('admin.post.form', compact('categories'));
    }

    public function store(PostRequest $request)
    {
        $data = $request->all();
        $data['image'] =  ($request->file('image') && $request->file('image')->isValid()) ? $this->saveImage($request->file('image')) : '';
        $data['status'] = ($request->input('status') == 'on') ? true : false;
        Post::create($data);
        flash('Create post success!', 'success');
        return redirect('admin/posts');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        $categories = $this->categories;
        return view('admin.post.form', compact('post', 'categories'));
    }

    public function update($id, PostRequest $request)
    {
        $data = $request->all();
        $post = Post::find($id);
        if ($request->file('image') && $request->file('image')->isValid()) {
            $data['image'] = $this->saveImage($request->file('image'), $post->image);
        }
        $data['status'] = ($request->input('status') == 'on') ? true : false;
        $post->update($data);
        flash('Update post success!', 'success');
        return redirect('admin/posts');
    }

    public function destroy($id)
    {
       $post = Post::find($id);
        if (file_exists(public_path('files/' . $post->image))) {
            @unlink(public_path('files/' . $post->image));
        }
        $post->delete();
        flash('Success deleted post!');
        return redirect('admin/posts');
    }

}
