@extends('admin.index')
@section('content')
<div class="container">
    @foreach($projects as $item)
    <div>
        <h4>{{$item->title}}</h4>
        <div>{{$item->mission}}</div>
        <div>{{$item->aim}}</div>
        <a href="{{route('projects.edit',$item->id)}}" class="">Редагувати</a>
        <form action="{{route('projects.destroy', $item->id)}}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="delete-button">Видалити</button>
          </form>
    </div>
    @endforeach
    <br/>
    <hr>
    <a href="{{route('projects.create')}}" class="">Створити новий проект</a>
</div>
@endsection