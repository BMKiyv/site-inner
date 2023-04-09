<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class EventsController extends Controller
{
    public function getEvents (Request $request) {
        $event = Event::doesntHave('users')->get();

        return (string) $event;
    }

    public function getEventsWithId (Request $request){
        $user = substr($request->getRequestUri(),11);
        $relations = User::find($user);
       $events = $relations->events()->get();
        return (string) $events;
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

    public function postEventsWithId (Request $request) {
        $data = json_decode($request[0]);

        
        $new_event = new Event();
        $new_event->date = $data->date;
        $new_event->title = $data->title;
        $user = User::find($data->user);
        $new_event->save();
        $user->events()->attach($new_event->id);
        return response()->json(["done"=>"true"]);

    }

    public function destroy ($data) {

       $event = Event::where('date', $data)->firstOrFail();
        $event->delete();
    
        return response()->json(['message' => 'Event has been deleted']);

    }

    public function destroyWithId (Request $request) {

        $string = $request->getRequestUri();
        $substring = explode('/', $string);
        dd($request,$substring[2]);
    }
}
