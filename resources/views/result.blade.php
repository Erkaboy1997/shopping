@extends('layouts.result')
@section('content')
    <div class="content">
        <div class="top">
            <form action="{{ url('result')  }}" method="GET">
                <input type="search" class="search-input" value="{{ \Illuminate\Support\Facades\Input::get('q')  }}" name="q">
                <button class="search"><img src="{{ asset('frontend/img/icons/search.svg')}}" alt=""></button>
            </form>
            <div class="result">
                <div>Найдено <span>{{ count($product)  }}</span> результатов:</div>
            </div>
        </div>
        <div class="container">
            <div class="rows">
                <div class="col-lg-3 col-md-5 col-12 left">
                    <form action="{{ url('result')  }}" method="GET">
                        <input type="hidden" class="search-input" value="{{ \Illuminate\Support\Facades\Input::get('q')  }}" name="q">
                        <div class="filter">
                            <div class="all">Все ({{ count($product)  }})</div>

                            @if(count($category)>0)
                                @foreach($category as $value)
                                    @if(count($value['subcategory'])>0)
                                        <div class="categories">
                                            <?php $c = 0; ?>
                                            @foreach($value['subcategory'] as $v)
                                                <?php $c += $v['count']; ?>
                                            @endforeach
                                            <div class="category">{{ $value['name']  }} ({{ $c  }})</div>
                                            <ul>
                                                @foreach($value['subcategory'] as $val)
                                                    <li class="sub-category">{{ $val['name']  }} ({{ $val['count']  }})</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                @endforeach
                            @endif

                            @if(count($size)>0)
                                <div class="item">
                                    <div class="title">РАЗМЕР:</div>
                                    <?php
                                    $sizes = \Illuminate\Support\Facades\Input::has('sizes') ? \Illuminate\Support\Facades\Input::get('sizes') : [];
                                    ?>
                                    <div class="colors labels">
                                        @foreach($size as $value)
                                            <label class="label">
                                                <input type="checkbox" class="checkbox" {{ in_array($value->id,$sizes) ? "checked" : ""  }} value="{{ $value->id  }}" name="sizes[]">
                                                <span class="fake size">{{ $value->name  }}</span>
                                            </label>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            <div class="item range">
                                <?php
                                    $min_price = 0;
                                    $max_price = 0;
                                    if(count($product)>0){
                                        $min_price = $product[0]['price'];
                                        foreach($product as $value){
                                            if($min_price > $value['price'])
                                                $min_price = $value['price'];
                                        }

                                        $max_price = $product[0]['price'];
                                        foreach($product as $value){
                                            if($max_price < $value['price'])
                                                $max_price = $value['price'];
                                        }
                                    }
                                ?>
                                <div class="top">
                                    <div class="title">
                                        Цены:
                                    </div>
                                    <div class="price-input">
                                        <input type="text" class="minamount" disabled>
                                        <span class="line"></span>
                                        <input type="text" class="maxamount" disabled>
                                        <span>RUB</span>
                                    </div>
                                </div>
                                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                     data-min="{{$min_price}}" data-max="{{ $max_price}}">
                                    <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                </div>
                                <button type="submit" class="reset">
                                    ПРИМЕНИТЬ
                                </button>
                            </div>

                        </div>
                    </form>
                </div>
                @if(!empty($product))
                    @foreach($product as $value)
                        <div class="col-lg-3 col-md-4 col-10 card">
                            <a href="{{ url('product',$value->id)  }}" class="image">
                                <img src="{{ asset('uploads')}}/{{ $value->image  }}" alt="">
                            </a>
                            <div class="name">{{ $value->name  }}</div>
                            <div class="pr-h">
                                <div class="price">
                                    @if(!empty($value->price_discount))
                                        <div class="sale">
                                            {{ number_format($value->price,0,' ',' ')  }} RUB
                                        </div>
                                        <div class="new-price">
                                            {{ number_format($value->price_discount,0,' ',' ') }} RUB
                                        </div>
                                    @else
                                        <div>
                                            {{ number_format($value->price,0,' ',' ')  }} RUB
                                        </div>
                                    @endif
                                </div>
                                <button class="heart @if(!empty($favorite)) @if(in_array($value->id,$favorite)) add @endif @endif" id="{{ $value->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="26.705" height="23.98" viewBox="0 0 26.705 23.98"><defs><style>.a{fill:none;stroke:#9D9D9D;stroke-width:2px;}</style></defs><path class="a" d="M22.746,2.151A6.643,6.643,0,0,0,17.8,0a6.215,6.215,0,0,0-3.882,1.34,7.942,7.942,0,0,0-1.569,1.639,7.938,7.938,0,0,0-1.57-1.639A6.214,6.214,0,0,0,6.9,0,6.644,6.644,0,0,0,1.96,2.151,7.722,7.722,0,0,0,0,7.425a9.2,9.2,0,0,0,2.45,6.019A52.251,52.251,0,0,0,8.585,19.2c.85.724,1.813,1.545,2.814,2.42a1.45,1.45,0,0,0,1.91,0c1-.875,1.964-1.7,2.814-2.421a52.222,52.222,0,0,0,6.133-5.757,9.2,9.2,0,0,0,2.45-6.019,7.722,7.722,0,0,0-1.96-5.274Zm0,0" transform="translate(1 1)"></path></svg>
                                </button>
                            </div>
                            <a style="cursor: pointer" id="{{ $value->id  }}" class="basket">В КОРЗИНУ</a>
                            @if(!empty($value->price_discount))
                                <div class="percent">
                                    {{ substr(($value->price_discount/$value->price)*100 - 100,0,3) }}
                                    %
                                </div>
                            @endif
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
