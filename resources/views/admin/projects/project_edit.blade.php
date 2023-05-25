@extends('admin.index')
@section('content')
<h2>Редагування проекту {{$project->title}}</h2>
<form action="{{route('projects.update',['project'=>$project->id])}}" method="post">
    @csrf
    @method('PUT')
    <input type="text" name="project-title" value="{{$project->title}}">
    <textarea name="project-aim" id="" cols="30" rows="10">{{$project->aim}}</textarea>
    <textarea name="project-mission" id="" cols="30" rows="10">{{$project->mission}}</textarea>
    <input type="submit" value="Редагувати">
</form>
@endsection