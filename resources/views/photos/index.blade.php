@extends('layouts.main')
@section('title','Фотоархів')
@section('content')
<section>
        <div class="container">
            <h3 class="project-title">Фотоархів</h3>
            <div class="photos">
                @foreach($photos as $item)
                <div class="photos-item">
                    <div class="photos-date">{{$item->date}}</div>
                    <div class="photos-image"><img src="{{$item->path}}" alt=""></div>
                    <div class="photos-title">{{$item->title}}</div>
                </div>
                @endforeach
            </div>
        </div>
</section>
@endsection