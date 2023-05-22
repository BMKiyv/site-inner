@extends('admin.index')
@section('content')
<div class="container">
    @foreach($photos as $item)
    <img src="{{$item->path}}" alt="">
    <div>{{$item->title}}</div>
    @endforeach
</div>
@endsection