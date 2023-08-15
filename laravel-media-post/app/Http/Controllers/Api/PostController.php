<?php
namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
class PostController extends Controller {

    public function delay(){
        $data = DB::table('slider')->value('delay_seconds');
        return response()->json($data); 
    }

    public function posts(){
        $data = Post::where('status', '=', 'Active')->orderBy('id','desc')->get();
        return response()->json($data); 
    }

    public function images(){
        // $data = Post::where('status', '=', 'Active')->where('media_type', '=', 'Image')->orderBy('id','desc')->get();
        // return response()->json($data); 
        
        $images = Post::where('status', 'Active')->where('media_type', 'Image')->pluck('media_path')->map(function ($url) {
            return "https://dev.bytrixtech.com/media-post/public/uploads/".$url;
        })->toArray();
        
        $delaytime = DB::table('slider')->value('delay_seconds');
        return ['images' => $images, 'delaytime' => $delaytime];
    }

    public function videos(){
        // $data = Post::where('status', '=', 'Active')->where('media_type', '=', 'Video')->orderBy('id','desc')->get();
        // return response()->json($data); 
        
        $videos = Post::where('status', 'Active')->where('media_type', 'Video')->pluck('media_path')->map(function ($url) {
            return "https://dev.bytrixtech.com/media-post/public/uploads/".$url;
        })->toArray();
        
        $delaytime = DB::table('slider')->value('delay_seconds');
        return ['videos' => $videos, 'delaytime' => $delaytime];
    }
}
