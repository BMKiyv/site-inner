@extends('layouts.main')
@section('title','Cabinet')
@section('content')
<section>
    <div class="container">
        <h3>Cabinet</h3>
        <p>{{Auth::user()->name }}</p>
    </div>
</section>
@endsection