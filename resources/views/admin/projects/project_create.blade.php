@extends('admin.index')
@section('content')

<h3>Створити новий проект:</h3>
<form action="{{route('projects.store')}}" method="post">
    @csrf
    @method('POST')
    <div class="row mb-3">
        <label for="project-title" class="form-label">{{ __("Назва проекту") }}</label>
        <div class="col-md-6">
            @error('project-title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    <input type="text" name="project-title" class="form-control long  @error('project-title') is-invalid @enderror" value="">
        </div>
        <div class="row mb-3">
            <label for="project-aim" class="form-label">{{ __("Ціль проекту") }}</label>
            <div class="col-md-6">
                @error('project-aim')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
    <textarea name="project-aim" id="" class="admin-project-textarea" rows="10"></textarea>
    </div>
    <div class="row mb-3">
        <label for="project-mission" class="form-label">{{ __("Міссія проекту") }}</label>
        <div class="col-md-6">
            @error('project-mission')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    <textarea name="project-mission" id="" class="admin-project-textarea" rows="10"></textarea>
        </div>
    <input type="submit" class="admin-project-submit" value="Створити">
</form>
@endsection