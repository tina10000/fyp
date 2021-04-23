<?php

namespace App\Http\Controllers;

use App\Models\Poll;
use App\Models\Poll_option;
use App\Models\PollAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PollController extends Controller
{
    public function index()
    {
        $polls = Poll::all();
        return view('secretary.poll.index' , compact('polls'));
    }
    public function create()
    {

        return view('secretary.poll.create-poll');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [

            'title' => 'required',
            'description' => 'required',

        ]);

        if ($validator->fails()) {
            return redirect('create-poll')
                ->withErrors($validator)
                ->withInput();
        }

       $poll = Poll::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => auth()->id()
        ]);
        $options = $request->options;
        $data = [];
        foreach ($options as $option){
            $data[] = [
                'name' =>$option,
                'poll_id' =>$poll->id,
            ];

        }
        Poll_option::insert($data);


        return redirect('poll')->with('message','Poll created');

    }

    public function polls()
    {
        $polls = Poll::with('options')
            ->select('poll.*','poll_answers.poll_option_id')
            ->leftjoin('poll_answers', function ($join) {
            $join->on('poll.id', '=', 'poll_answers.poll_id')
                ->where('poll_answers.user_id', Auth::id());
        })->get();
        //dd($polls);
        $answers = PollAnswer::pluck('user_id', 'poll_id')->toArray();

        return view('secretary.poll.polls' , compact('polls' , 'answers'));
    }

    public function savePolls(Request $request)
    {
        $data = $request->all();
        unset($data['_token']);
        $option_id = current($data);
        $key = array_keys($data);

        $req['poll_id'] = $key[0];
        $req['poll_option_id'] = $option_id;
        $req['user_id'] = Auth::user()->id;
        PollAnswer::create($req);
        return redirect('polls')->with('message','Poll Answer submitted');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $poll
     * @return \Illuminate\Http\Response
     */
    public function destroy(Poll $poll)
    {
        $poll->answers()->delete();
        $poll->options()->delete();

        $poll->delete();

        return redirect('polls')->with('message','Poll deleted');
    }

}
