@extends('admin.index')
@section('content')
    <div class="container">
        @foreach($docs as $item)
        <img src="{{$item->icon}}" alt="">
        <div>{{$item->title}}</div>
        @endforeach
    </div>
@endsection