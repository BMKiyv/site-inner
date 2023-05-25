@extends('admin.index')
@section('content')
<h3> {{$project->title}}</h3>
<div class="admin-project-title">Місія:</div>
<p class="admin-project-content">{{$project->mission}}</p>
<div class="admin-project-title">Ціль:</div>
<p class="admin-project-content">{{$project->aim}}</p>

@endsection