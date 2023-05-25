<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Photo;

class AdminPhotosController extends Controller
{
    public function index () {
        $photos = Photo::all();
        return view('admin.photos.index',['photos'=>$photos]);
    }
    public function show () {
        
    }
}