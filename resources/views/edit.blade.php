@extends('master')
@section('content')
    <form action="{{ route('todos.update', $todo->id) }}" class="custom-form" method="POST">
        @csrf
        @method('PUT')
        <h1 style="margin-top:100px" style="text-align: center">{{ __('trans.edit_notes') }}</h1>
        <div class="form-group">
            <label for="title">{{ __('trans.title') }}</label>
            <input type="text" class="form-control" name="title" value="{{ $todo->title }}" id="title" 
                placeholder="{{ __('trans.title') }}">
            @error('title')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="content">{{ __('trans.content') }}</label>
            <textarea class="form-control" name="content" id="content" cols="30" rows="5">{{ $todo->content }}</textarea>
        </div>
        @error('content')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
            @enderror
        <div class="form-group">
            <label for="content">{{ __('trans.status') }}</label>
            <select class="form-control" name="status" id="status">
                <option value="{{ $todo->status }}" hidden>{{ __("trans.$todo->status") }}</option>
                <option value="status_unfinished">{{ __('trans.status_unfinished') }}</option>
                <option value="status_doing">{{ __('trans.status_doing') }}</option>
                <option value="status_done">{{ __('trans.status_done') }}</option>
            </select>
            <input type="hidden" class="form-control" name="user_id">
        </div>
        <button onclick="return confirm('Are you sure about that!')" type="submit" class="btn btn-warning">{{ __('trans.edit_btn') }}</button>
    </form>
@endsection
