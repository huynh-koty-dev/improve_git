@extends('master')
@section('content')
    <div class="form-group">
        <br><br>
        <h1 style="text-align: center">{{ __('trans.Log in') }}</h1>
    </div>
    <form action="{{ route('login') }}" class="custom-form" method="POST">
        @csrf
        @if (Session::get('success'))
            <div class="alert alert-danger" role="alert">{{ Session::get('success') }}</div>
        @endif
        <div class="form-group">
            <label for="email">{{ __('trans.Email address') }}</label>
            <input type="email" class="form-control" name="email" value="{{ old('email') }}" id="email" aria-describedby="emailHelp"
                placeholder="{{ __('trans.Email address') }}">
            @error('email')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="password">{{ __('trans.Password') }}</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="{{ __('trans.Password') }}">
            @error('password')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
            @enderror
        </div>
        @if ($error ?? null)
            <div class="alert alert-danger" role="alert">
                {{ $error }}
            </div>
        @endif
        <button type="submit" class="btn btn-primary">{{ __('trans.Log in') }}</button>
    </form>
@endsection
