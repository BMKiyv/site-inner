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
            <h2>Подія <span class="deleteDateDay"></span> <span class="deleteDateMonth"></span></h2>
      
            <p id="eventText"></p>
      
            <button id="deleteButton">Видалити</button>
            <button id="closeButton">Закрити</button>
          </div>
      
          <div id="modalBackDrop"></div>
          <div class="content">
            <div class="birthdays">
              <img src="./images/icons/birthday.png" alt="">
              @foreach($user as $item)
              <div class="birthday">
                <div>
                  <span class="birthday-day"></span>
                  <span class="birthday-month">{{$item->birthday}}</span>
                </div>
                <div class="user">{{$item->name}}</div>
                {{-- <span>{{$item->department->name}}</span> --}}
              </div>
              @endforeach
            </div>
            <div class="events-list"></div>
          </div>
      </div>
  </section>
  <section class="flex" id="news">
    <div class="news">
      <div class="news-wrap">
        <div class="news-content">
          @foreach($news as $item)
            <div class="news-block">
              <div class="news-date">{{$item->date}}</div>
              <img src="{{$item->image}}" alt="{{$item->date}}">
              <p class="news-description">{{$item->description}}</p>
            </div>
            @endforeach
        </div>
      </div>
      <a href="/news" class="news-link"></a>
    </div>
  </section>
  <section class="next" id="departments">
    <div class="container">
      <div class="next-flex">
      @foreach($user as $item)
        @if($item->position==='голова')
        <div class="management">
          <div class="management-heading">
            Керівний склад Державного агентства розвитку туризму:
          </div>
          <div class="management-name">{{$item->name}} - <span>{{$item->position}}</span></div>
        </div>
        @endif
      @endforeach
      <div class="departments-wrap">
      @foreach($departments as $item)
      <div class="departments">
        <div class="departments-img">
          <img src="{{$item->image}}" alt="">
        </div>
        <a href="/departments/{{$item->name}}" class="departments-name">{{$item->name}}</a>
      </div>
      @endforeach
    </div>
    </div>
  </div>
  </section>
@endsection