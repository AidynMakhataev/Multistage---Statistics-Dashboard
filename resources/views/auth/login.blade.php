@extends('dashboard.master')

@section('content')
<div class="ms-auth">
    <div class="ms-auth__inner">
        <div class="ms-auth__titleWrp">
            <span class="ms-auth__title">Авторизация</span>
        </div>
        <form action="{{ route('login') }}" method="POST" class="ms-auth__form">
            {{ csrf_field() }}
            <div class="ms-auth__group">
                <label class="ms-auth__label" for="email">Email</label>
                <input type="email" id="email" name="email" class="ms-auth__input" required>

                @if ($errors->has('email'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="ms-auth__group">
                <label class="ms-auth__label" for="password">Пароль</label>
                <input type="password" id="password" name="password" class="ms-auth__input" required>

                @if ($errors->has('password'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <button class="ms-auth__button">Войти</button>
        </form>
    </div>
</div>
@endsection
