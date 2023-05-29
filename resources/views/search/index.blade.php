@extends('layouts.main')
@section('title','Пошук')
@section('content')
    @foreach($users as $item)
    <div>{{$item->name}}</div>
    @endforeach
    @foreach($departments as $item)
    <div>{{$item->name}}</div>
    @endforeach
@endsection