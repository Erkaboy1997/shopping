@extends('layouts.forget')
@section('content')

    <div class="content">
        <div class="left">
            <form method="POST" action="{{ route('sendforget') }}">
                {{ csrf_field() }}
                <div class="title text-center">
                    Забыли пароль?
                    <div class="or text-center">
                        Введите адрес электронной почты, и мы вышлем <br>
                        вам ссылку для сброса пароля
                    </div>
                </div>
                <div class="inputs">
                    <span class="text">Эл. почта</span>
                    <input type="email" name="email">
                </div>
                <button type="submit" class="btn">
                    ПОДТВЕРДИТЬ
                </button>
            </form>
        </div>
        <div class="right">
            @php
                $image = \Illuminate\Support\Facades\DB::table('forget') -> orderByDesc('id') -> first();
            @endphp

            @if(!empty($image)>0)
                <img src="{{ asset('uploads')}}/{{ $image->image  }}" alt="">
            @else
                <img src="{{ asset('frontend/img/forget.png')}}" alt="">
            @endif
        </div>
    </div>
@endsection
