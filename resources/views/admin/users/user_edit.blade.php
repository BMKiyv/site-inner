@extends('admin.index')
@section('content')
<h3>Редагування даних співробітника {{$user->name}}</h3>
<div class="card-body">
<form action="{{route('user.update',['user'=>$user->id])}}" method="post">
    @csrf
    @method('PUT')
    
    <div class="row mb-3">
        <label for="user-name" class="form-label">{{ __("Прізвище та ім'я") }}</label>
        <div class="col-md-6">
            @error('user-name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        <input type="text" id="name" placeholder="type" class="form-control @error('user-name') is-invalid @enderror" name="user-name" value="{{$user->name}}" autofocus/>
        </div>
    </div>
    <div class="row mb-3">
        <label for="user-position" class="form-label">{{ __("Напишіть посаду") }}</label>
        <div class="col-md-6">
            @error('user-position')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <input type="text" class="form-control @error('user-position') is-invalid @enderror" name="user-position" value="{{$user->position}}"/>
        </div>
    </div>
    <div class="row mb-3">
        <label for="user-birthday" class="form-label">{{ __("День народження") }}</label>
        <div class="col-md-6">
            @error('user-birthday')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <input type="date" class="form-control" name="user-birthday" value="{{$user->birthday}}"/>
        </div>
    </div>
    <div class="row mb-3">
        <label for="user-phone" class="form-label">{{ __("Телефон") }}</label>
        <div class="col-md-6">
            @error('user-phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <input type="text" class="form-control" name="user-phone" value="{{$user->phone}}"/>
        </div>
    </div>
    <div class="row mb-3">
        <label for="user-email" class="form-label">{{ __("Email") }}</label>
        <div class="col-md-6">
            @error('user-email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <input type="email" class="form-control" name="user-email" value="{{$user->email}}"/>
        </div>
    </div>
    <div class="row mb-3">
        <label for="user-department" class="form-label">{{ __("Призначити відділ") }}</label>
        <div class="col-md-6 admin-select-wrapper">
            @error('user-department')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        <select name="user-department" class="admin-select">
            <option value="null" disabled selected>Виберіть відділ</option>
            @foreach ($departments as $item)
                <option value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
        </select>
        </div>
    </div>
<input type="submit" class="admin-submit" value="Редагувати">
</form>
@endsection