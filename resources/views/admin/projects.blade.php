@extends('admin.index')
@section('content')
<div class="container">
    @foreach($projects as $item)
    <div>
        <div>{{$item->title}}</div>
        <div>{{$item->mission}}</div>
        <div>{{$item->aim}}</div>
    </div>
    @endforeach
</div>
@endsection