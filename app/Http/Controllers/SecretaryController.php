<?php

namespace App\Http\Controllers;

use App\Models\ActivityClass;
use App\Models\Fitness;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\Event;


class SecretaryController extends Controller
{


    public function index()
    {
        $event = Event::all();
        return view('secretary.dashboard',compact('event'));
    }

    public function storeEvent(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'event_title' => 'required',
            'event_details' => 'required',
            'start' => 'required',
            'end' => 'required',
            'color' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('secretary/dashboard')
                ->withErrors($validator)
                ->withInput();
        }

        Event::create([
            'event_title' => $request->event_title,
            'event_details' => $request->event_details,
            'start' => $request->start,
            'end' => $request->end,
            'color' => $request->color
        ]);

        return redirect('secretary/dashboard')->with('message', 'Event created');

    }

    public function getEventsJson(Request $request)
    {

        $data = Event::get(['id', 'event_title as title', 'start', 'end', 'color']);
        return response()->json($data);

    }

    public function getEvents(Request $request)
    {

        $data = Event::get(['id', 'event_title', 'event_details', 'start', 'end', 'color']);
        return view('secretary.events', compact('data'));
    }

    public function editEvent($id)
    {
        $data = Event::where('id', $id)->first();
        return view('secretary.edit_Event', compact('data'));;
    }


    public function updateEvent($id, Request $request)
    {

        $event = Event::where('id', $id)->first();

        $val = [
            'event_title' => 'required',
            'event_details' => 'required',
            'start' => 'required',
            'end' => 'required',

        ];

        $validator = Validator::make($request->all(), $val);

        if ($validator->fails()) {
            /// dd($validator);
            return redirect('event/' . $id)
                ->withErrors($validator)
                ->withInput();

        }
        $data = [
            'event_title' => $request->event_title,
            'event_details' => $request->event_details,
            'start' => $request->start,
            'end' => $request->end,
            'color' => $request->color
        ];
//dd($data);

        $event->update($data);
        return redirect('/event/' . $id)->with('message', 'Event details have been updated successfully');
    }

    // Delete
    public function deleteEvent($id)
    {
        Event::destroy($id);
        //Event::flash('message', 'Delete successfully!');
        //Event::flash('alert-class', 'alert-success');

        return redirect('events')->with('message', 'Event deleted successfully');
    }

    // FitnessClass
    public function create_fitness(Request $request)
    {

        return view('secretary.fitness.create_class');
    }

    public function store_fitness(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'venue' => 'required',
            'date' => 'required',
            'time' => 'required',
            'price' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('create-class')
                ->withErrors($validator)
                ->withInput();
        }

        Fitness::create([
            'title' => $request->title,
            'venue' => $request->venue,
            'date' => $request->date,
            'time' =>$request->time,
            'price' => $request->price,
            'user_id' =>auth()->user()->id

        ]);

        return redirect('class')->with('message','Class created');

    }
        /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Fitness  $fitness
     * @return \Illuminate\Http\Response
     */

    public function edit_fitness(Fitness $class)
    {
        $fitness = Fitness::all();
        return view('secretary.fitness.edit',compact('class' , 'fitness'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticket  $class
     * @return \Illuminate\Http\Response
     */
    public function update_fitness (Request $request, Fitness $class)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'venue' => 'required',
            'date' => 'required',
            'time' => 'required',
            'price' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('ticket/'.$class->id)
                ->withErrors($validator)
                ->withInput();
        }
        $data = [
            'title' => $request->title,
            'venue' => $request->venue,
            'date' => $request->date,
            'time' =>$request->time,
            'price' => $request->price,
            'user_id' =>auth()->user()->id
        ];

        $class->update($data);


        return redirect('class')->with('message','Class updated');

    }
    public function destroy_fitness(Fitness $class)
    {
        $class->delete();
        return redirect('class')->with('message','Fitness class deleted');
    }


    public function viewClass()
    {
        $class = Fitness::all();
        return view('secretary.fitness.class',compact('class'));
    }

    //JoinForClasses
    public function join(Fitness $class)
    {
        return view('secretary.fitness.join',compact('class'));
    }
    public function storeJoin(Request $request, Fitness $class)
    {
        $req = $request->all();
        unset($req['_token']);
        //dd($req);

        $data = [
            'class_id' => $class->id,
            'user_id' => \Auth::user()->id,
        ];


        ActivityClass::create($data);

        return redirect('class')->with('message','Enrolled');

    }
    public function viewJoining()
    {
        $class = ActivityClass::all();
        return view('secretary.fitness.view',compact('class'));
    }
}

?>
