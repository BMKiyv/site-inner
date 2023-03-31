@extends('layouts.main')
@section('title','Cabinet')
@section('content')
<section>
    <div class="container">
        <h3>Cabinet</h3>
        <p>{{Auth::user()->name }}</p>
        <p>{{Auth::user()->department_id }}</p>
        <p>{{Auth::user()->birthday }}</p>
        <p>{{Auth::user()->email }}</p>
    </div>
</section>
@endsection