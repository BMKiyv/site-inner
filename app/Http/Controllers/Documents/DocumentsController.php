<?php

namespace App\Http\Controllers\Documents;
use App\Http\Controllers\Controller;
use App\Models\Document;
use Illuminate\Support\Facades\Storage;

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
}
