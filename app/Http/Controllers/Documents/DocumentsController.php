<?php

namespace App\Http\Controllers\Documents;
use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Event;
use Carbon\Carbon;
use App\Models\User;

class DocumentsController extends Controller
{
    public function show ($folder){
        $docs = Document::all();
        $doc = Document::where('title',$folder)->first();
        $files = Storage::allFiles($folder);
        for($i = 0; $i<count($files); $i++){
            $string = $files[$i];
            $parts = explode('/', $string);
            $files[$i] = $parts[1];
            }
        return view('documents.index',['doc'=> $doc,'docs'=>$docs,'files'=>$files]);
    }
    public function download ($folder,$name){
        return Storage::download($folder . '/' . $name);
    }

    public function upload (Request $request){
        $fileName = $request->file?$request->file->getClientOriginalName():'';
        $path = 'examples';
        $eventId = request('event_id');
        $userID = request('user_id');
        $event = Event::find($eventId);
        if($event == null){
            $event = new Event();
            $event->title = 'test';
            $event->date = Carbon::now();
            $event->document = $path . '/' . $fileName;
            $request->file->storeAs( $path, $fileName, 'public');
            Storage::setVisibility($fileName, 'public'); 
            $event->save();
            $new_id = Event::where('title','test')->value('id');
            $user = User::find($userID);  
            $user->events()->attach($new_id);
            return response()->json(['path' => $event->document, 'new_id'=>$new_id, 'user_id'=>$userID]);
        }
        else{
            $event->document = $path . '/' . $fileName;
            $request->file->storeAs( $path, $fileName, 'public');
            Storage::setVisibility($fileName, 'public'); 
            $event->save();
            return response()->json(['path' => $event->document, 'new_id'=>null, 'user_id'=>$userID]);
        }

    }
}
