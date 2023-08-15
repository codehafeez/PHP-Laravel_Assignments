<?php
namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;
class PostController extends Controller {

    public function index(){
        $posts = Post::latest()->paginate(5);
        return view('post.index',compact('posts'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create(){
        return view('post.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
  
        Post::create($request->all());
        return redirect()->route('posts.index')->with('success','Post created successfully.');
    }

    public function show(Post $post){
        return view('post.show',compact('post'));
    }

    public function edit(Post $post){
        return view('post.edit',compact('post'));
    }

    public function update(Request $request, Post $post){
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);
  
        $post->update($request->all());
        return redirect()->route('posts.index')->with('success','Post updated successfully');
    }

    public function destroy(Post $post){
        $post->delete();  
        return redirect()->route('posts.index')->with('success','Post deleted successfully');
    }
}
