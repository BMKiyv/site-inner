@extends('layouts.main')
@section('title',$department->name)
@section('content')
<section>
    <div class="container">
        <div class="flex">
            <img src="{{$department->image}}" alt="{{$department->name}}">
            <h3>{{$department->name}}</h3>
        </div>
    </div>
</section>
@endsection