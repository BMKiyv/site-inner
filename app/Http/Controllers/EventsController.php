<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Carbon\Carbon;

class EventsController extends Controller
{
    public function getEvents (Request $request) {
        return (string) Event::all();
    }

    public function postEvents (Request $request) {
        $data = json_decode($request[0]);
        //dd($data);
        //$event_date = Carbon::create(substr($data->date,0,4),substr($data->date,5,2),substr($data->date,-1,2));
        
        $new_event = new Event();
        $new_event->date = $data->date;
        $new_event->title = $data->title;
        
        $new_event->save();
        return response()->json(["done"=>"true"]);
    }
    public function destroy ($data) {

       $event = Event::where('date', $data)->firstOrFail();
        $event->delete();
    
        return response()->json(['message' => 'Event has been deleted']);

    }
}
