@extends('admin.index')
@section('content')
<h3> {{$user->name}}</h3>

<p>{{$user->name}}</p>
<p>{{$user->position}}</p>
<p>{{$user->birthday}}</p>
<p>{{$user->phone}}</p>
<p>{{$user->email}}</p>

@endsection