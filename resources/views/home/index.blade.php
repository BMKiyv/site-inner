@extends('layouts.main')
@section('title', 'Головна')
@section('content')
<section>
    <div class="container flex">
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
      
            {{-- <div id="weekdays">
              <div>Понеділок</div>
              <div>Вівторок</div>
              <div>Середа</div>
              <div>Четвер</div>
              <div>П'ятниця</div>
              <div>Субота</div>
              <div>Неділя</div>
            </div> --}}
      
            <div id="calendar"></div>
          </div>
        </div>
      
          <div id="newEventModal">
            <h2>Нова подія</h2>
      
            <input id="eventTitleInput" placeholder="Введіть текст" />
      
            <button id="saveButton">Зберегти</button>
            <button id="cancelButton">Скасувати</button>
          </div>
      
          <div id="deleteEventModal">
            <h2>Подія</h2>
      
            <p id="eventText"></p>
      
            <button id="deleteButton">Видалити</button>
            <button id="closeButton">Закрити</button>
          </div>
      
          <div id="modalBackDrop"></div>
          <div class="content">
            <div class="birthdays">
              <img src="./images/icons/birthday.png" alt="">
              <div class="birthday">{{$user->birthday}}</div>
              <div class="user">{{$user->name}}</div>
            </div>
            <div class="events-list"></div>
          </div>
    </div>
  </section>
@endsection