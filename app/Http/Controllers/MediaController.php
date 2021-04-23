<?php

namespace App\Http\Controllers;
use App\Models\Feed;
use App\post;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class MediaController extends Controller
{
    public function index()
    {
        $feeds = Feed::all();
        return view('secretary.media.createmedia',compact('feeds'));
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $imageFilePath = '';
        if($request->hasFile('image')){
            $extension = $request->file('image')->getClientOriginalExtension();
            $imageName = Auth::user()->name.rand().'.'.$extension;
            $imageFilePath = 'Posts'.'/'.$imageName;
            $request->file('image')->storeAs('public/Posts',$imageName);
            //dd('ff');
        }
        $array = [
            'post' => $request->post,
            'user_id' => Auth::user()->id,
            'image_path' => $imageFilePath,
        ];
        Feed::create($array);
        return redirect()->back();

    }

    public function editPost(int $id){

        $post = Feed::find($id);
        $posts = Feed::all();
        $users = User::all();
        return view('secretary.media.editpost',['post'=>$post, 'posts'=>$posts,'users'=>$users]);

    }
    public function updatePost(Request $request,$id){
        $imageFilePath = '';
        if($request->hasFile('image')){
            $extension = $request->file('image')->getClientOriginalExtension();
            $imageName = Auth::user()->name.rand().'.'.$extension;
            $imageFilePath = 'Posts'.'/'.$imageName;
            $uplode = $request->file('image')->storeAs('public/Posts',$imageName);
        }

        $post = Feed::find($id);
        $post->post = $request->post;
        if($imageFilePath){
            $post->image =  $imageFilePath;
        }
        $post->update();
        return redirect('secretary.media.createmedia');
    }
    public function deletePost(int $id){
        $posts = Feed::find($id);
        $posts->delete();
        return redirect('media')->with('message','Fitness class deleted');
    }



}
