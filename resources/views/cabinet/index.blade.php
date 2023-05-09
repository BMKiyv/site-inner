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
            <div class="cabinet">
            <div class="flex cabinet-buttons">
                <form action="" method="post" class="cabinet-form">
                <input type="submit" class="cabinet-problem" value="Повідомити про проблему">
                </form>
                <form action="" method="post" class="cabinet-form">
                <input type="submit" class="cabinet-task" form="newTask" value="Додати задачу">
                </form>
            </div>

            <hr>
            <div class="content cabinet-content">
                <div class="cabinet-content-header">
                    <div class="cabinet-date">Строк виконання</div>
                    <div class="cabinet-event">Задачі</div>
                    <div class="cabinet-user">{{Auth::user()->name}}</div>
                </div>
                <div class="events-list cabinet-content"></div>
            </div>
        </div>
        </div>
        <p id="user">{{Auth::user()->id }}</p>
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
    <div class="cabinet-document" style="display:none"><label for="doc">+ приклад документа</label>
        <form action="{{route('documents.upload')}}" method="POST"><input hidden type="file" name="doc" id="doc"></form>
    </div>
</div>
<div class="task">
    <div class="container">
    <div class="flex task-container">
        <span class="task-header">Задача</span>
        <span class="task-header">Строки</span>
        <span class="task-header">Виконавці</span>
    </div>
    {{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif --}}
    <div>
        <form action="/postevents/{{Auth::user()->id }}" id="newTask"  class="task-inputs" method="POST">
            @csrf
            <div>
            @error('task-title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
             @enderror
            <input type="text" class="task-title" name="task-title" id="title">
        </div>
        <div>
            @error('task-date')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <input type="date" class="task-date" name="task-date" id="date">
        </div>
            <div class="task-users">
                <div class="task-name">{{Auth::user()->name}}</div>
                {{-- <label for="spec">+ додати співробітника</label>
                <input type="text" hidden name="specialist" id="spec"> --}}
                <select name="task-additional-user" id="addUser">
                    <option value="">+ додати співробітника</option>
                    @foreach($users as $item)
                    <option>{{$item}}</option>
                    @endforeach
                </select>
            </div>
            <div class="task-heading">
                <div>
                    <div>Детальний опис завдання</div>
                    <div class="task-materials">Допоміжні матеріали</div>
                </div>
                <div class="task-text">
                    <textarea name="" id="" cols="30" rows="10"></textarea>
                    <div class="task-files"></div>
                    <div class="cabinet-document"><label>+ приклад документа
                        <form action="{{route('documents.upload')}}" method="POST" id="newEventDoc"><input form="newEventDoc" id="nEventDoc" hidden type="file" name="doc"></form></label>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</div>
</section>
@endsection