@extends('layouts.main')
@section('title','Пошук')
@section('content')
    @foreach($users as $item)
    <a href="{{asset('/users').'/'.$item->name}}"><div>{{$item->name}}</div></a>
    @endforeach
    @foreach($departments as $item)
    <a href="{{asset('/departments').'/'.$item->name}}"><div>{{$item->name}}</div></a>
    @endforeach
@endsection