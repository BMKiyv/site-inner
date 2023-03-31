<?php

namespace App\Http\Controllers\Photos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Photo;
use Carbon\Carbon;

class PhotosController extends Controller
{
    public function index () {

        $photos =  Photo::all();
        return view('photos.index',['photos'=> $photos]);
    }

}
