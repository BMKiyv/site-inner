@extends('admin.index')
@section('content')
<div class="container">
    @foreach($news as $item)
    <img src="{{$item->image}}" alt="">
    <div>{{$item->description}}</div>
    @endforeach
</div>
@endsection