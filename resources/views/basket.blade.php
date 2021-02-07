@extends('layouts.basket')
@section('content')

<div class="cards wow animate__fadeInUp" data-wow-duration="1500ms">
    <a href="{{ url()->previous() }}" class="back"><img src="frontend/img/back-arrow.png" alt=""></a>
    @if(!empty($products))
        <?php $allPrice = 0 ?>
        @foreach($products as $value)
            <?php
                if(!empty($value['price_discount'])){
                    $allPrice += $value['count'] * $value['price_discount'];
                }else{
                    $allPrice += $value['count'] * $value['price'];
                }
            ?>
            <div class="b-card" id="b-card-{{ $value['id'] }}">
                <div class="item image">
                    @if(!empty($value['image']))
                        <img src="uploads/{{ $value['image']  }}" alt="">
                    @endif
                </div>
                <div class="item name">
                    @if(!empty($value['name']))
                        {{ $value['name']  }}
                        <div class="num">№ {{ $value['code']  }}</div>
                    @endif
                </div>
                <div class="item color">
                    @if($value['color'] != 0)
                        <?php $color = \Illuminate\Support\Facades\DB::table('color')->where('id',$value['color'])->first(); ?>
                        <span class="color-1" style="background-color: {{ $color->code  }}"></span>
                    @else

                    @endif
                </div>
                <div class="item count">
                    <div class="quantity">
                        <div class="pro-qty" id = "product_{{ $value['id']  }}" product_id="{{ $value['id']  }}" count="{{ $value['count']  }}">
                            <input type="text" value="{{ $value['count']  }}">
                        </div>
                    </div>
                </div>
                <div class="item price" id="price-{{ $value['id'] }}">
                    @if(!empty($value['price']))
                        @if(!empty($value['price_discount']))
                            {{ number_format($value['count'] * $value['price_discount'],0,' ',' ')  }} RUB
                        @else
                            {{ number_format($value['count'] * $value['price'],0,' ',' ')  }} RUB
                        @endif
                    @endif
                </div>
                <div class="remove remove_{{ $value['id'] }}" id="remove_basket" product_id="{{ $value['id']  }}" count="{{ $value['count'] }}">
                    <span></span>
                    <span></span>
                </div>
            </div>
        @endforeach
    @endif
    <div class="bottom">
        @if(isset($allPrice))
            <div class="all"><sapn>ВСЕГО:</sapn> {{ number_format($allPrice,0,' ',' ')  }} RUB</div>
        @else
            <div class="all"><sapn>ВСЕГО: 0</sapn></div>
        @endif
    </div>
</div>
<div class="order-btn">
    <img src="{{ asset('frontend/img/icons/list.svg')  }}" alt="">
</div>

<div class="order-form">
    <div class="numbers">
        <div class="num active">1</div>
        <div class="num">2</div>
    </div>
    <form class="wrapper">
        <div class="content content-card content-card-active">
            <div class="top">
                <div class="exit">
                    <span></span>
                    <span></span>
                </div>
                <div class="next">
                    <img src="frontend/img/white-arrow.png" alt="">
                </div>
            </div>
            <div class="title">Детали карты</div>
            <div class="form">
                <div class="labels">
                    <label class="label bank">
                        <input type="radio" name="1" class="radio">
                        <span class="fake"><img src="frontend/img/icons/sberbank.png" alt=""></span>
                    </label>
                    <label class="label">
                        <input type="radio" name="1" class="radio">
                        <span class="fake"><img src="frontend/img/icons/visa-grey.svg" alt=""></span>
                    </label>
                </div>
                <div class="inputs">
                    <span class="text">Номер карты</span>
                    <input name="cc" type="text" class="ccn" placeholder="0000 0000 0000 0000">
                </div>
                <div class="inputs">
                    <span class="text">Срок действия</span>
                    <input type="text" class="data-mask">
                </div>
                <div class="inputs">
                    <span class="text">CVC</span>
                    <input type="text" class="cvc" placeholder="123">
                </div>
                <div class="next">перейти НА следующий шаг</div>
            </div>
        </div>
        <div class="content content-deliver">
            <div class="top">
                <div class="prev">
                    <img src="frontend/img/white-arrow.png" alt="">
                </div>
                <div class="exit">
                    <span></span>
                    <span></span>
                </div>
            </div>
            <div class="title">Детали доставки</div>
            <div class="form">
                <div class="inputs">
                    <span class="text">Ф.И.О</span>
                    <input type="text">
                </div>
                <div class="inputs">
                    <span class="text">Город</span>
                    <select name="country" id="">
                        <option>Москва</option>
                        <option>Ялта</option>
                        <option>Краснодар</option>
                        <option>Новороссийск</option>
                    </select>
                </div>
                <div class="inputs">
                    <span class="text">Регион</span>
                    <input type="text">
                </div>
                <div class="inputs">
                    <span class="text">Адрес</span>
                    <input type="text">
                </div>
                <div class="labels">
                    <label class="label remember">
                        <input type="checkbox" class="checkbox">
                        <span class="fake"></span>
                        <span class="text">Запомнить форму</span>
                    </label>
                </div>
                <button type="submit" class="btn">Оплатить</button>
            </div>
        </div>
    </form>
</div>

@endsection
