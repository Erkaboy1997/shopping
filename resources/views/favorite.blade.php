@extends('layouts.favorite')
@section('content')

<div class="page">
    <div class="page-links">
        <?php
            if(!empty(Auth::user())){
        ?>
        <div class="info">
            <div class="image">
                <?php $image = Auth::user()->image; ?>
                @if($image != 0)
                    <img id="edit-image" src="{{ asset('uploads/users')}}/{{ Auth::user()->image }}" alt="">
                @else
                    <img id="edit-image" src="{{ asset('frontend/img/default.svg')}}" alt="">
                @endif
                <input user_id="{{ Auth::user()->id  }}" id="file" type="file" name="file" style="display: none;" value="">
                <button class="edit" id="edit-image">
                    <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0 16.6244V21H4.3756L17.2865 8.08898L12.9109 3.71338L0 16.6244Z" fill="white"/>
                        <path d="M20.6594 3.06582L17.9348 0.341297C17.4797 -0.113766 16.7388 -0.113766 16.2837 0.341297L14.1484 2.47659L18.524 6.8522L20.6593 4.7169C21.1145 4.26184 21.1145 3.52088 20.6594 3.06582Z" fill="white"/>
                    </svg>
                </button>
            </div>
            <div class="name">
                {{ Auth::user()->name }}
            </div>
            <div class="number">
                @if(!empty(Auth::user()->phone))
                    {{ Auth::user()->phone  }}
                @else
                    {{ Auth::user()->email }}
                @endif
            </div>
        </div>
        <?php } ?>
        <ul class="links">
            <li>
                <a href="{{ url('/home')  }}">
                    <img src="{{ asset('frontend/img/icons/user.svg')}}" alt="">
                    МОЙ ПРОФИЛЬ
                </a>
            </li>
            <li>
                <a href="orders.html">
                    <img src="{{ asset('frontend/img/icons/clock.svg')}}" alt="">
                    МОИ ЗАКАЗЫ
                </a>
            </li>
            <li>
                <a href="settings.html">
                    <img src="{{ asset('frontend/img/icons/pay.svg')}}" alt="">
                    НАСТРОЙКИ ОПЛАТЫ
                </a>
            </li>
            <li>
                <a href="{{ url('/favorite')  }}" class="active">
                    <img src="{{ asset('frontend/img/icons/heart.svg')}}" alt="">
                    ИЗБРАННЫЕ ТОВАРЫ
                </a>
            </li>
            <li>
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    <img src="{{ asset('frontend/img/icons/logout.svg')}}" alt="">
                    ВЫЙТИ
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
    <div class="right">
        @if(!empty($product))
        <div class="cards">
            <div class="container">
                <div class="row">
                    @foreach($product as $value)
                    <div class="col-lg-4 col-md-4 col-12 card" id="remove_{{ $value->id }}">
                        <div id="{{ $value->id  }}" class="remove">
                            <span></span>
                            <span></span>
                        </div>
                        <a href="{{ url('product',$value->id)  }}" class="image">
                            <img src="{{ asset('uploads') }}/{{ $value->image  }}" alt="">
                        </a>
                        <div class="name">{{ $value->name  }}</div>
                        <div class="pr-h">
                            <div class="price">
                                <div>
                                    @if(!empty($value->price_discount))
                                        {{ number_format($value->price_discount,0,' ',' ')  }} RUB
                                    @else
                                        {{ number_format($value->price,0,' ',' ')  }} RUB
                                    @endif
                                </div>
                            </div>

                        </div>
                        <a style="cursor: pointer" id="{{ $value->id  }}" class="basket">В КОРЗИНУ</a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

@endsection
