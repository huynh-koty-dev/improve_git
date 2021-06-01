@extends('master')
@section('content')
    <form action="{{ route('todos.store') }}" class="custom-form" method="POST">
        @csrf
        @method('POST')
        <h1  style="text-align: center">{{ __('trans.add_new') }}</h1>
        <div class="form-group">
            <label for="title">{{ __('trans.title') }}</label>
            <input type="text" class="form-control" name="title" value="{{ old('title') }}" id="title" 
                placeholder="{{ __('trans.title') }}">
            @error('title')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <input type="hidden" class="form-control" name="status" placeholder="{{ __('trans.status') }}" value="status_unfinished">
            <label for="content">{{ __('trans.content') }}</label>
            <textarea class="form-control" name="content" id="content" cols="30" rows="5">{{ __('trans.content') }}</textarea>
        </div>
        @error('content')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
            @enderror
        <button type="submit" class="btn btn-primary">{{ __('trans.add_btn') }}</button>
    </form>
@endsection
