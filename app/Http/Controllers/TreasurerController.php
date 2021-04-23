<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventExpense;
use Illuminate\Http\Request;

class TreasurerController extends Controller
{

    public function addEventExpense($id)
    {
        $event = Event::where('id', $id)->first();
        return view('treasurer.expenses',compact('event'));
    }

    public function updateEventExpense($id, Request $request)
    {
        $expenses = $request->expenses;
        $prices = $request->prices;

        $event = Event::where('id', $id)->first();
        if(empty(array_filter($expenses))){
            return redirect('event/'.$id.'/expense')->with('error','Atleast one expenses has to be added');
        }
        //dd($expenses,$prices);
        $data = [];
        foreach ($expenses as $k => $ex){
            if(!empty($prices[$k]))
            $data[] = ['event_id'=>$id,'expense'=>$ex,'price'=>$prices[$k]];
        }
        EventExpense::insert($data);
        return redirect('event/'.$id.'/expenses')->with('message','Expenses added!');
    }

    public function eventExpenses($id)
    {
        $event = Event::where('id', $id)->first();
        $expenses = EventExpense::where('event_id', $id)->get();
        return view('treasurer.viewExpenses',compact('event','expenses'));
    }

    public function deleteEventExpense($id, $ex)
    {
        $event = Event::where('id', $id)->first();
       EventExpense::where('id', $ex)->delete();
        return redirect('event/'.$id.'/expenses')->with('message','Expense deleted!');
    }

}
