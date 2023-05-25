@extends('admin.index')
@section('content')

<h3>Створити новий проект:</h3>
<form action="{{route('projects.store')}}" method="post">
    @csrf
    @method('POST')
    <input type="text" name="project-title" placeholder="Назва проекту">
    <textarea name="project-aim" id="" cols="30" rows="10" placeholder="Ціль проекту"></textarea>
    <textarea name="project-mission" id="" cols="30" rows="10" placeholder="Місія проекту"></textarea>
    <input type="submit" value="Створити">
</form>
@endsection