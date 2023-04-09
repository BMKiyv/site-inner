@extends('layouts.main')
@section('title',$doc->title)
@section('content')
<section>
    <div class="container">
<div class="flex docs">
    <div class="docs__img"><img src="{{$doc->image}}" alt=""></div>
    <div class="docs__files">
        <h3>{{$doc->title}}</h3>
        @foreach($files as $item)
        <div class="docs__files-container">
            <img src="{{$doc->icon}}" class="docs__files-icon"/><span class="docs__files-name">{{$item}}</span>
            <a href="{{route('documents.download',['folder'=>$doc->title, 'name'=> $item])}}" class="docs__files-download">Завантажити</a>
        </div> 
        @endforeach
    </div>
</div>
<div class="flex docs__links">
    @foreach($docs as $item)
    <a href="/documents/{{$item->title}}" class="docs__links-item">{{$item->title}}</a>
    @endforeach
</div>
    </div>
</section>
@endsection