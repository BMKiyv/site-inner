@extends('layouts.main')
@section('title',$user->name)
@section('content')
<section>
    <div class="container">
        <div class="flex staff">
            <h3 class="staff-title">{{$user->name}}</h3>
        </div>
        <div class="flex staff-content">
                <div class="staff-card">
                    <div class="staff-person flex">
                        <div class="staff-photo">
                            <img src="" alt="">
                        </div>
                        <p class="staff-name">{{$user->name}}</p>
                    </div>
                    <p class="staff-name">{{$user->position}}</p>
                    <p>Контакти</p>
                    <div class="staff-contacts flex">
                        <div class="staff-image">
                            <img src="/images/icons/card-phone.svg" alt="phone">
                        </div>
                        <p class="staff-link">{{$user->phone}}</p>
                    </div>
                    <div class="staff-contacts flex">
                        <div class="staff-image">
                            <img src="/images/icons/card-mail.svg" alt="email">
                        </div>
                        <p class="staff-link">{{$user->email}}</p>
                    </div>
                </div>
        </div>
    </div>
</section>
@endsection