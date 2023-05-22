<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Document;

class AdminDocumentsController extends Controller
{
    public function index () {
        $docs = Document::all();
        return view('admin.documents',['docs'=>$docs]);
    }
    public function show () {
        
    }
}