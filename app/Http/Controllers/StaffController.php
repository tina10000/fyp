<?php

namespace App\Http\Controllers;


use App\Models\Event;
use App\Models\Meetings;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StaffController extends Controller
{

    public function index()
    {
        return view('home');
    }
    public function requestMeeting()
    {
        return view('/staff/requestMeeting');
    }

    public function storeMeeting(Request $request)
    {
        //dd($request->all());

        $validator = Validator::make($request->all(), [
            'subject' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'description' => 'required|string|max:255',
        ]);
        $now =  Carbon::now()->format('Y-m-d');

        if ($validator->fails()) {
            return redirect('/staff/requestMeeting')
                ->withErrors($validator)
                ->withInput();
        }
        $status = 'Took place';
        if($now < $request->date){
            $status = 'Pending';
        }


        Meetings::create([
            'subject' => $request->subject,
            'date' => $request->date,
            'time' => $request->time,
            'description' => $request->description,
            'meeting_status' =>  $status,

             'user_id' =>auth()->user()->id
        ]);
        return redirect('viewMeeting')->with('message','Meeting has successfully created');
    }

    public function viewMeeting(Request $request)
    {
        $user = User::all();
        $meeting = Meetings::all();
        return view('secretary.viewMeeting', compact('meeting', 'user'));
    }

    public function editMeeting($id)
    {
        $meeting = Meetings::where('id',$id)->first();
        return view('secretary.editMeeting',compact('meeting'));
    }

    public function updateMeeting($id,Request $request)
    {
        $meeting = Meetings::where('id',$id)->first();
        $validator = Validator::make($request->all(), [
            'subject' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'description' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('/meeting/'.$id)
                ->withErrors($validator)
                ->withInput();
        }

        $data = [
            'subject' => $request->subject,
            'date' => $request->date,
            'time' => $request->time,
            'description' => $request->description,
        ];

        if($request->start_time){
            $data['start_time'] = $request->start_time;
        }
        if($request->end_time){
            $data['end_time'] = $request->end_time;
        }



        $meeting->update($data);


        return redirect('viewMeeting')->with('message','Meeting updated');
    }







}
