@extends('layouts.main')
@section('title','Новини/оголошення')
@section('content')
<section>
    <div class="container">
            <h3 class="staff-title">Новини / оголошення</h3>

        <div class="flex staff-content">
            @foreach($articles as $item)
            <div class="article">
                <div class="article-date">{{$item->date}}</div>
                <img src="{{$item->image}}" alt="">
                <p>{{$item->description}}</p>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection