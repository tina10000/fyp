<?php

namespace App\Http\Controllers;


use App\Models\Booking;
use App\Models\Event;
use App\Models\UserType;
use Illuminate\Http\Request;
use App\Models\Ticket;
use Illuminate\Support\Facades\Validator;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::all();
        return view('secretary.ticket.tickets',compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $events = Event::all();
        return view('secretary.ticket.createTicket',compact('events'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'event_id' => 'required',
            'amount' => 'required',
            'available_from' => 'required',
            'available_to' => 'required',

        ]);

        if ($validator->fails()) {
            return redirect('create-ticket')
                ->withErrors($validator)
                ->withInput();
        }
        $data = [
            'event_id' => $request->event_id,
            'amount' => $request->amount,
            'available_from' =>$request->available_from,
            'available_to' => $request->available_to,

        ];
        if($request->member_price){
            $data['member_price'] = $request->member_price;
        }
        if($request->nonmember_adult){
            $data['nonmember_adult'] = $request->nonmember_adult;
        }
        if($request->nonmember_kid){
            $data['nonmember_kid'] = $request->nonmember_kid;
        }

        Ticket::create($data);

        return redirect('tickets')->with('message','Ticket created');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        $events = Event::all();
        return view('secretary.ticket.edit',compact('ticket' , 'events'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
        $validator = Validator::make($request->all(), [
            'event_id' => 'required',
            'amount' => 'required',
            'available_from' => 'required',
            'available_to' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('ticket/'.$ticket->id)
                ->withErrors($validator)
                ->withInput();
        }

        $data = [
            'event_id' => $request->event_id,
            'amount' => $request->amount,
            'available_from' =>$request->available_from,
            'available_to' => $request->available_to,

        ];
        if($request->member_price){
            $data['member_price'] = $request->member_price;
        }
        if($request->nonmember_adult){
            $data['nonmember_adult'] = $request->nonmember_adult;
        }
        if($request->nonmember_kid){
            $data['nonmember_kid'] = $request->nonmember_kid;
        }

        $ticket->update($data);


        return redirect('tickets')->with('message','Ticket update');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();


        return redirect('tickets')->with('message','Ticket deleted');
    }


        //BookingOfTickets
    public function book(Ticket $ticket)
    {
        return view('secretary.ticket.book',compact('ticket'));
    }

    public function storeBooking(Request $request, Ticket $ticket)
    {
        $req = $request->all();
        unset($req['_token']);
        //dd($req);
        if(empty(array_filter($req))){
            return redirect('ticket/'.$ticket->id.'/book')->with('error','Atleast one ticket has to be booked');
        }

        $data = [
            'ticket_id' => $ticket->id,
            'user_id' => \Auth::user()->id,
            ];

        if($request->no_tickets_members){
            $data['no_tickets_members'] = $request->no_tickets_members;
        }
        if($request->no_tickets_nonmembers){
            $data['no_tickets_nonmembers'] = $request->no_tickets_nonmembers;
        }
        if($request->no_tickets_kids){
            $data['no_tickets_kids'] = $request->no_tickets_kids;
        }



        Booking::create($data);

        return redirect('tickets')->with('message','Ticket booked');


    }

    public function viewBooking(Ticket $ticket)
    {
        return view('secretary.ticket.bookings',compact('ticket'));
    }


}
