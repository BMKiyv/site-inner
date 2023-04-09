@extends('layouts.main')
@section('title',Auth::user()->name)
@section('content')
<section>
    <div class="container">
        <div class="flex">
            <div>
                <div class="search">
                    <input type="search" name="main-search" id="main-search">
                    <img class="search-img" src="./images/icons/search.png" alt="search">
                </div>
                <div id="calendar-container">
                    <div id="calendar-header">
                        <button id="backButton"></button>
                        <div id="monthDisplay"></div>
                        <button id="nextButton"></button>
                    </div>      
                    <div id="calendar"></div>
                </div>
            </div>
            <div class="content">
                <div class="events-list"></div>
            </div>
        </div>
        <p>{{Auth::user()->name }}</p>
        <p id="user">{{Auth::user()->id }}</p>
        <p>{{Auth::user()->birthday }}</p>
        <p>{{Auth::user()->email }}</p>
        @if(count(Auth::user()->events)!==0)
        @foreach(Auth::user()->events as $item)
        <p>{{$item->title }}</p>
        @endforeach
        @endif
    </div>          
    <div id="newEventModal">
        <h2>Нова подія</h2>          
        <input id="eventTitleInput" placeholder="Введіть текст" />         
        <button id="saveButton">Зберегти</button>
        <button id="cancelButton">Скасувати</button>
    </div>         
    <div id="deleteEventModal">
        <h2>Подія <span class="deleteDateDay"></span> <span class="deleteDateMonth"></span></h2>          
        <p id="eventText"></p>          
        <button id="deleteButton">Видалити</button>
        <button id="closeButton">Закрити</button>
    </div>          
    <div id="modalBackDrop"></div>
</div>
</section>
@endsection