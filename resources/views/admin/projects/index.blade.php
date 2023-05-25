@extends('admin.index')
@section('content')
<div class="container">
    @foreach($projects as $item)
    <div>
        <h3>{{$item->title}}</h3>
        <div class="admin-project-title">Місія:</div>
        <div class="admin-project-content">{{$item->mission}}</div>
        <div class="admin-project-title">Ціль:</div>
        <div class="admin-project-content">{{$item->aim}}</div>
        <div class="admin-project-buttons">
        <a href="{{route('projects.edit',$item->id)}}" class="change-button">Редагувати</a>
        <form action="{{route('projects.destroy', $item->id)}}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="delete-button">Видалити</button>
        </form>
    </div>
    </div>
    @endforeach
    <br/>
    <hr>
    <a href="{{route('projects.create')}}" class="admin-project-newbutton">Створити новий проект</a>
</div>
@endsection