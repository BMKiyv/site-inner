@extends('admin.index')
@section('content')
<h3>Редагування даних співробітника {{$user->name}}</h3>
<form action="{{route('user.update',['user'=>$user->id])}}" method="post">
    @csrf
    @method('PUT')
<input type="text" name="user-name" value="{{$user->name}}"/>
<input type="text" name="user-position" value="{{$user->position}}"/>
<input type="date" name="user-birthday" value="{{$user->birthday}}"/>
<input type="text" name="user-phone" value="{{$user->phone}}"/>
<input type="email" name="user-email" value="{{$user->email}}"/>
<input type="submit" value="Редагувати">
</form>
@endsection