<?php

namespace App\Http\Controllers;


use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index()
    {
        $user = User::where('id','!=',Auth::user()->id)->orderBy('name','asc')->first();
        return redirect('message/'.$user->id);
    }
    public function userMessage($id)
    {
        $userM = User::where('id',$id)->first();
        $users = User::where('id','!=',Auth::user()->id)->orderBy('name','asc')->get();
        $messages = Message::where(function($query) use($id){
                $query->where('sender_id' , $id)
                    ->orwhere('sender_id' , Auth::user()->id);
        })->where(function($query) use($id){
            $query->where('receiver_id' , $id)
                ->orwhere('receiver_id' , Auth::user()->id);
        })->orderBy('created_at','asc')->get();
        return view('message.index',compact('userM' , 'users' , 'messages'));
    }
    public function saveMessage($id, Request $request)
    {
        $data['message'] = $request->message;
        $data['sender_id'] =  Auth::user()->id;
        $data['receiver_id'] =  $id;

        Message::create($data);

        return redirect('message/'.$id);
    }
}
