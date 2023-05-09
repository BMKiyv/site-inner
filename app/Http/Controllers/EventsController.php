<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Event;
use Illuminate\Support\Facades\DB;

class EventsController extends Controller
{
    public function getEvents (Request $request) {
        $event = Event::doesntHave('users')->get();
        return (string) $event;
    }

    public function getEventsWithId ($id){
        $user = $id;
        $relations = User::find($user);
       $events = $relations->events()->get();
        return (string) $events;
    }

    public function postEvents (Request $request) {
        $data = json_decode($request[0]);       
        $new_event = new Event();
        $new_event->date = $data->date;
        $new_event->title = $data->title;        
        $new_event->save();
        return response()->json(["done"=>"true"]);
    }

    public function postEventsWithId (Request $request) {
        $data = json_decode($request[0]);
       // dd($data,$request);
        if($data === null){
            $validated = $request->validate([
                'task-title' => 'required',
                'task-date' => 'required',
            ]);
            $taskTitle = $validated['task-title'];
            $taskDate = $validated['task-date'];
            $add_user = $request->get("task-additional-user");
            $events = Event::where('title', 'test')
            ->whereHas('users', function ($query) {
                $query->where('user_id', auth()->id());
            })
            ->get();
           // dd($request,count($events));
            $new_event = count($events)==0?  new Event(): $events[0];
            $new_event->date = $taskDate;
            $new_event->title = $taskTitle;         
            $new_event->save();
            if($add_user){
                $added_user = User::where('name',$add_user)->get()[0];
                $added_user->events()->attach($new_event->id);
            }
            return back();
        }
        else{
            $new_event = new Event();
            $new_event->date = $data->date;
            $new_event->title = $data->title;
            $user = User::find($data->user);
            $new_event->save();
            $user->events()->attach($new_event->id);
            // $add_user = $request->get("task-additional-user");
            // if($add_user){
            //     $added_user = User::where('name',$add_user)->get('id')[0]->id;
            //     $added_user->events()->attach($new_event->id);
            // }
            return response()->json(["done"=>"true"]);
        }
    }

    public function destroy ($data) {

       $event = Event::where('date', $data)->firstOrFail();
        $event->delete();
    
        return response()->json(['message' => 'Event has been deleted']);

    }

    public function destroyWithId ($user,$date) {
        $user_getting = User::where('id',$user)->get();
        $event = $user_getting[0]->events()->orderBy('user_id')->where('date',$date)->get();
        if ($event[0]) {
            $event_user =  DB::table('event_user')->where('event_id',$event[0]->id)->first();
            if ($event_user) {
                DB::table('event_user')->where('id', $event_user->id)->delete();
                $event[0]->delete();
            }
        }
    }
}
