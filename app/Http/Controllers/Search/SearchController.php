<?php

namespace App\Http\Controllers\Search;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Department;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('main-search');
       // dd($query,$request);
        $users = User::search($query)->get();
        $departments = Department::search($query)->get();

        // Return the search results to the view
        return view('search.index', compact('users','departments'));
    }
}
