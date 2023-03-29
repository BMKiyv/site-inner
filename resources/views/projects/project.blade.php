@extends('layouts.main')
@section('title',$project->title)
@section('content')
<section>
    <div class="project">
        <div class="container">
            <h3 class="project-title">"{{$project->title}}"</h3>
            <div class="project-mission">
                <h4>МІСІЯ</h4>
                <p>{{$project->mission}}</p>
            </div>
            <div class="project-mission project-aim">
                <h4>ЦІЛЬ</h4>
                <p>{{$project->aim}}</p>
            </div>
        </div>
    </div>
</section>
@endsection