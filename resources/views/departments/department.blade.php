@extends('layouts.main')
@section('title',$department->name)
@section('content')
<section>
    <div class="container">
        <div class="flex staff">
            <img src="{{$department->image}}" alt="{{$department->name}}">
            <h3 class="staff-title">{{$department->name}}</h3>
        </div>
        <div class="flex staff-content">
            @foreach($users as $item)
                <div class="staff-card">
                    <div class="staff-person flex">
                        <div class="staff-photo">
                            <img src="" alt="">
                        </div>
                        <p class="staff-name">{{$item->name}}</p>
                    </div>
                    <p class="staff-name">{{$item->position}}</p>
                    <p>Контакти</p>
                    <div class="staff-contacts flex">
                        <div class="staff-image">
                            <img src="/images/icons/card-phone.svg" alt="phone">
                        </div>
                        <p class="staff-link">{{$item->phone}}</p>
                    </div>
                    <div class="staff-contacts flex">
                        <div class="staff-image">
                            <img src="/images/icons/card-mail.svg" alt="email">
                        </div>
                        <p class="staff-link">{{$item->email}}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection