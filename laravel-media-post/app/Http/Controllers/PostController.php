<?php
namespace App\Http\Controllers; 
use App\Models\Post;
use App\Models\Models;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PostController extends Controller
{
    public function index(){
        $data['posts'] = Post::orderBy('id','desc')->paginate(10);    
        return view('posts.index', $data);
    }
     
    public function create(){
        return view('posts.create');
    }
    
    public function store(Request $request){
        $image = $request->file('file');
        $path = rand() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads'), $path);

        $post = new Post;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->media_path = $path;

        $extension = $image->getClientOriginalExtension();
        if($extension =='mp4'){ $post->media_type = 'Video'; }
        else { $post->media_type = 'Image'; }

        $post->status = $request->status;
        $post->save();     
        return redirect()->route('posts.index')->with('success','Post has been created successfully.');
    }

    public function show(Post $post){
        return view('posts.show',compact('post'));
    } 
     
    public function edit(Post $post){
        return view('posts.edit',compact('post'));
    }
    
    public function update(Request $request, $id){
        $post = Post::find($id);
        if($request->hasFile('file')){
            $image = $request->file('file');
            $path = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $path);
            $post->media_path = $path;
        }
        $post->title = $request->title;
        $post->description = $request->description;
        $post->status = $request->status;
        $post->save();
        
        return redirect()->route('posts.index')->with('success','Post updated successfully');
    }
    
    public function destroy(Post $post){
        $post->delete();    
        return redirect()->route('posts.index')->with('success','Post has been deleted successfully');
    }


    public function sliderdelay_read(){
        $data['slider'] = DB::table('slider')->limit(1)->get();
        return view('posts.slider', $data);
    }

    public function sliderdelay_update(Request $request){
        DB::table('slider')->where('id', 1)->update(array('delay_seconds' => $request->input('delay_seconds')));
        return redirect()->route('posts.index')->with('success','Successfully Updated, Slider Timer');
    }
}