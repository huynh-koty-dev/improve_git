@extends('master')
@section('content')
    <form action="{{ route('register') }}" class="custom-form" method="POST">
        @csrf
        <div class="form-group">
            <br><br>
            <h1 style="text-align: center">{{ __('trans.Register') }}</h1>
        </div>
        @if (Session::get('success'))
            <div class="alert alert-danger" role="alert">{{ Session::get('success') }}</div>
        @endif
            @if (Session::get('fail'))
        <div class="alert alert-danger" role="alert">{{ Session::get('fail') }}</div>
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
            <label for="name">{{ __('trans.userName') }}</label>
            <input type="text" class="form-control" name="name" value="{{ old('name') }}" id="name" 
                placeholder="{{ __('trans.userName') }}">
            @error('name')
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
        <div class="form-group">
            <label for="repassword">{{ __('trans.pass_confirm') }}</label>
            <input type="password" class="form-control" name="repassword" id="repassword" placeholder="{{ __('trans.pass_confirm') }}">
            @error('repassword')
                <div class="alert alert-danger" role="alert">{{ $message }}</div>
            @enderror
        </div>
        @if ($error ?? null)
            <div class="alert alert-danger" role="alert">
                {{ $error }}
            </div>
        @endif
        <button type="submit" class="btn btn-primary">{{ __('trans.Register') }}</button>
    </form>
@endsection
