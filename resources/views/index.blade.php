@extends('layouts.main')
@section('content')
    @if(!empty($product_banner))
        <div class="banner">
            <div class="left">
                <div class="block"></div>
                <div class="swiper-container small-slider">
                    <div class="swiper-wrapper">
                        @foreach($product_banner as $value)
                        <div class="swiper-slide">
                            <img src="{{ asset('uploads')}}/{{ $value->image_left }}" alt="">
                            <div class="front">
                                <?php
                                    if(!empty($value->product_id)){
                                        $product = \Illuminate\Support\Facades\DB::table('product')->where('id',$value->product_id)->first();
                                ?>

                                <div class="name">
                                    {{ $product->name  }}
                                    <button class="heart @if(!empty($favorite)) @if(in_array($value->id,$favorite)) add @endif @endif" id="{{ $value->id  }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="26.705" height="23.98" viewBox="0 0 26.705 23.98"><defs><style>.a{fill:none;stroke:#9D9D9D;stroke-width:2px;}</style></defs><path class="a" d="M22.746,2.151A6.643,6.643,0,0,0,17.8,0a6.215,6.215,0,0,0-3.882,1.34,7.942,7.942,0,0,0-1.569,1.639,7.938,7.938,0,0,0-1.57-1.639A6.214,6.214,0,0,0,6.9,0,6.644,6.644,0,0,0,1.96,2.151,7.722,7.722,0,0,0,0,7.425a9.2,9.2,0,0,0,2.45,6.019A52.251,52.251,0,0,0,8.585,19.2c.85.724,1.813,1.545,2.814,2.42a1.45,1.45,0,0,0,1.91,0c1-.875,1.964-1.7,2.814-2.421a52.222,52.222,0,0,0,6.133-5.757,9.2,9.2,0,0,0,2.45-6.019,7.722,7.722,0,0,0-1.96-5.274Zm0,0" transform="translate(1 1)"></path></svg>
                                    </button>
                                </div>
                                <div class="price">
                                    <?php if(!empty($product->price_discount)){ ?>
                                        {{ number_format($product->price_discount,0,' ',' ')  }} RUB
                                    <?php }else{ ?>
                                        {{ number_format($product->price,0,' ',' ')  }} RUB
                                    <?php } ?>
                                </div>
                                <?php } ?>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="swiper-pagination"></div>
                </div>
            </div>
            <div class="swiper-container banner-slider">
                <div class="swiper-wrapper">
                    @foreach($product_banner as $value)
                    <div class="swiper-slide">
                        <div class="inner">
                            <div class="image">
                                <img src="{{ asset('uploads')}}/{{ $value->image_right  }}" alt="">
                                <?php
                                if(!empty($value->product2_id)){
                                    $product = \Illuminate\Support\Facades\DB::table('product')->where('id',$value->product2_id)->first();
                                ?>
                                    <div class="bottom">
                                        <div class="name">{{ $product->name  }}</div>
                                        <div class="price"><span>от</span>
                                            <?php if(!empty($product->price_discount)){ ?>
                                                {{ number_format($product->price_discount,0,' ',' ')  }} RUB
                                            <?php }else{ ?>
                                                {{ number_format($product->price,0,' ',' ')  }} RUB
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="count">
                                        <span class="current zero">1</span>
                                        <div class="line"></div>
                                        <p>Новинки!</p>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="center">
                                <div class="title">
                                    <div>
                                        {!! $value->title !!}
                                    </div>
                                </div>
                                <a style="cursor: pointer" id="{{ $value->id  }}" class="basket">в корзину</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="swiper-button-next"><img src="{{ asset('frontend/img/arrow-right.png')}}" alt=""></div>
            <div class="swiper-button-prev"><img src="{{ asset('frontend/img/arrow-left.png')}}" alt=""></div>
        </div>
    @endif

    @if(!empty($new_product))
    <div class="cards">
        <div class="section-title wow animate__fadeInDown" data-wow-duration="1500ms">НОВИНКИ</div>
        <div class="container">
            <div class="row" id="show-more-product-result">
                @foreach($new_product as $value)
                <div class="col-lg-3 col-md-4 col-10 card wow animate__fadeInUp" data-wow-duration="1500ms">
                    <a href="{{ url('product',$value->id)  }}" class="image">
                        <img src="{{ asset('uploads') }}/{{ $value->image  }}" alt="">
                    </a>
                    <div class="name">{{ $value->name }}</div>
                    <div class="pr-h">
                        <div class="price"><div>
                                @if($value->price_discount)
                                    {{ number_format($value->price_discount,0,' ',' ')  }}
                                @else
                                    {{ number_format($value->price,0,' ',' ')  }}
                                @endif
                                RUB</div></div>
                        <button class="heart @if(!empty($favorite)) @if(in_array($value->id,$favorite)) add @endif @endif" id="{{ $value->id  }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="26.705" height="23.98" viewBox="0 0 26.705 23.98"><defs><style>.a{fill:none;stroke:#9D9D9D;stroke-width:2px;}</style></defs><path class="a" d="M22.746,2.151A6.643,6.643,0,0,0,17.8,0a6.215,6.215,0,0,0-3.882,1.34,7.942,7.942,0,0,0-1.569,1.639,7.938,7.938,0,0,0-1.57-1.639A6.214,6.214,0,0,0,6.9,0,6.644,6.644,0,0,0,1.96,2.151,7.722,7.722,0,0,0,0,7.425a9.2,9.2,0,0,0,2.45,6.019A52.251,52.251,0,0,0,8.585,19.2c.85.724,1.813,1.545,2.814,2.42a1.45,1.45,0,0,0,1.91,0c1-.875,1.964-1.7,2.814-2.421a52.222,52.222,0,0,0,6.133-5.757,9.2,9.2,0,0,0,2.45-6.019,7.722,7.722,0,0,0-1.96-5.274Zm0,0" transform="translate(1 1)"></path></svg>
                        </button>
                    </div>
                    <a style="cursor: pointer" id="{{ $value->id  }}" class="basket">В КОРЗИНУ</a>
                </div>
                @endforeach

            </div>
            <div class="show-more" id="show-more-product" value="0">
                показать Еще
            </div>
        </div>
    </div>
    @endif

    @if(!empty($catalog))
    <div class="catalogs">
        <div class="section-title wow animate__fadeInDown" data-wow-duration="1500ms">Каталог</div>
        <div class="container">
            @foreach($catalog as $value)
            <div class="catalog wow animate__fadeInUp" data-wow-duration="1500ms">
                <img src="{{ asset('uploads')}}/{{ $value->image  }}" alt="">
                <a href="{{ $value->button  }}" class="title">{{ $value->name  }}</a>
            </div>
            @endforeach
        </div>
    </div>
    @endif

    <div class="favorites">
        <div class="section-title wow animate__fadeInDown" data-wow-duration="1500ms">избранные продукты</div>
        <p class="sub-title wow animate__fadeInUp" data-wow-duration="1500ms">Выберите категорию с помощью специальных переключателей или перейдите в раздел товаров</p>
        <div class="items tab-items">
            <div class="item tab-item active wow animate__lightSpeedInLeft" data-wow-duration="1500ms" data-tab="0">
                ПОПУЛЯРНые
            </div>
            <div class="item tab-item wow animate__lightSpeedInLeft" data-wow-duration="1500ms" data-tab="1">
                РЕкомендованные
            </div>
            <div class="item tab-item wow animate__lightSpeedInLeft" data-wow-duration="1500ms" data-tab="2">
                СО СКИДКОЙ
            </div>
            <div class="item tab-item wow animate__lightSpeedInLeft" data-wow-duration="1500ms">
                все
            </div>
        </div>
        <div class="tabs">
            @if(!empty($popular))
            <div class="tab" style="display: block">
                <div class="container">
                    <div class="row" id="result-popular">
                        @foreach($popular as $value)
                            <div class="col-lg-3 col-md-4 col-10 card wow animate__zoomIn" data-wow-duration="1500ms">
                                <a href="{{ url('product',$value->id)  }}" class="image">
                                    <img src="{{ asset('uploads')}}/{{ $value->image  }}" alt="">
                                </a>
                                <div class="name">{{ $value->name  }}</div>
                                <div class="pr-h">
                                    <div class="price">
                                        <div>
                                            @if(!empty($value->price_discount))
                                                {{ number_format($value->price_discount,0,' ',' ')  }}
                                            @else
                                                {{ number_format($value->price,0,' ',' ')  }}
                                            @endif
                                             RUB
                                        </div>
                                    </div>
                                    <button class="heart @if(!empty($favorite)) @if(in_array($value->id,$favorite)) add @endif @endif" id="{{ $value->id }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="26.705" height="23.98" viewBox="0 0 26.705 23.98"><defs><style>.a{fill:none;stroke:#9D9D9D;stroke-width:2px;}</style></defs><path class="a" d="M22.746,2.151A6.643,6.643,0,0,0,17.8,0a6.215,6.215,0,0,0-3.882,1.34,7.942,7.942,0,0,0-1.569,1.639,7.938,7.938,0,0,0-1.57-1.639A6.214,6.214,0,0,0,6.9,0,6.644,6.644,0,0,0,1.96,2.151,7.722,7.722,0,0,0,0,7.425a9.2,9.2,0,0,0,2.45,6.019A52.251,52.251,0,0,0,8.585,19.2c.85.724,1.813,1.545,2.814,2.42a1.45,1.45,0,0,0,1.91,0c1-.875,1.964-1.7,2.814-2.421a52.222,52.222,0,0,0,6.133-5.757,9.2,9.2,0,0,0,2.45-6.019,7.722,7.722,0,0,0-1.96-5.274Zm0,0" transform="translate(1 1)"></path></svg>
                                    </button>
                                </div>
                                <a style="cursor: pointer" id="{{ $value->id  }}" class="basket">В КОРЗИНУ</a>
                            </div>
                        @endforeach
                    </div>
                    <div class="show-more" id="popular" value="0">
                        показать Еще
                    </div>
                </div>
            </div>
            @endif

            @if(!empty($recomend))
            <div class="tab">
                <div class="container">
                    <div class="row" id="result-recomend">
                        @foreach($recomend as $value)
                            <div class="col-lg-3 col-md-4 col-10 card wow animate__zoomIn" data-wow-duration="1500ms">
                                <a href="{{ url('product',$value->id) }}" class="image">
                                    <img src="{{ asset('uploads')}}/{{ $value->image  }}" alt="">
                                </a>
                                <div class="name">{{ $value->name  }}</div>
                                <div class="pr-h">
                                    <div class="price">
                                        <div>
                                            @if(!empty($value->price_discount))
                                                {{ number_format($value->price_discount,0,' ',' ')  }}
                                            @else
                                                {{ number_format($value->price,0,' ',' ')  }}
                                            @endif
                                            RUB
                                        </div>
                                    </div>
                                    <button class="heart @if(!empty($favorite)) @if(in_array($value->id,$favorite)) add @endif @endif" id="{{ $value->id }}">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="26.705" height="23.98" viewBox="0 0 26.705 23.98"><defs><style>.a{fill:none;stroke:#9D9D9D;stroke-width:2px;}</style></defs><path class="a" d="M22.746,2.151A6.643,6.643,0,0,0,17.8,0a6.215,6.215,0,0,0-3.882,1.34,7.942,7.942,0,0,0-1.569,1.639,7.938,7.938,0,0,0-1.57-1.639A6.214,6.214,0,0,0,6.9,0,6.644,6.644,0,0,0,1.96,2.151,7.722,7.722,0,0,0,0,7.425a9.2,9.2,0,0,0,2.45,6.019A52.251,52.251,0,0,0,8.585,19.2c.85.724,1.813,1.545,2.814,2.42a1.45,1.45,0,0,0,1.91,0c1-.875,1.964-1.7,2.814-2.421a52.222,52.222,0,0,0,6.133-5.757,9.2,9.2,0,0,0,2.45-6.019,7.722,7.722,0,0,0-1.96-5.274Zm0,0" transform="translate(1 1)"></path></svg>
                                    </button>
                                </div>
                                <a style="cursor: pointer" id="{{ $value->id  }}" class="basket">В КОРЗИНУ</a>
                            </div>
                        @endforeach
                    </div>
                    <div class="show-more" id="recomend" value="0">
                        показать Еще
                    </div>
                </div>
            </div>
            @endif

            @if(!empty($discount))
            <div class="tab">
                <div class="container">
                    <div class="row" id="result-discount">
                        @foreach($discount as $value)
                        <div class="col-lg-3 col-md-4 col-10 card wow animate__zoomIn" data-wow-duration="1500ms">
                            <a href="{{ url('product',$value->id)  }}" class="image">
                                <img src="{{ asset('uploads')}}/{{ $value->image  }}" alt="">
                            </a>
                            <div class="name">{{ $value->name  }}</div>
                            <div class="pr-h">
                                <div class="price">
                                    <div class="sale">{{ number_format($value->price,0,' ',' ')  }} RUB</div>
                                    <div class="new-price">{{ number_format($value->price_discount,0,' ',' ')  }} RUB</div>
                                </div>
                                <button class="heart @if(!empty($favorite)) @if(in_array($value->id,$favorite)) add @endif @endif" id="{{ $value->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="26.705" height="23.98" viewBox="0 0 26.705 23.98"><defs><style>.a{fill:none;stroke:#9D9D9D;stroke-width:2px;}</style></defs><path class="a" d="M22.746,2.151A6.643,6.643,0,0,0,17.8,0a6.215,6.215,0,0,0-3.882,1.34,7.942,7.942,0,0,0-1.569,1.639,7.938,7.938,0,0,0-1.57-1.639A6.214,6.214,0,0,0,6.9,0,6.644,6.644,0,0,0,1.96,2.151,7.722,7.722,0,0,0,0,7.425a9.2,9.2,0,0,0,2.45,6.019A52.251,52.251,0,0,0,8.585,19.2c.85.724,1.813,1.545,2.814,2.42a1.45,1.45,0,0,0,1.91,0c1-.875,1.964-1.7,2.814-2.421a52.222,52.222,0,0,0,6.133-5.757,9.2,9.2,0,0,0,2.45-6.019,7.722,7.722,0,0,0-1.96-5.274Zm0,0" transform="translate(1 1)"></path></svg>
                                </button>
                            </div>
                            <a style="cursor: pointer" id="{{ $value->id  }}" class="basket">В КОРЗИНУ</a>
                            <div class="percent">
                                {{ substr(($value->price_discount/$value->price)*100 - 100,0,3) }}
                                %
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="show-more" id="discount" value="0">
                        показать Еще
                    </div>
                </div>
            </div>
            @endif

            @if(!empty($all))
            <div class="tab">
                <div class="container">
                    <div class="row" id="result-all">
                        @foreach($all as $value)
                            <div class="col-lg-3 col-md-4 col-10 card wow animate__zoomIn" data-wow-duration="1500ms">
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
                    </div>
                    <div class="show-more" id="all" value="0">
                        показать Еще
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>

    @if(!empty($discount_product))
    <div class="sales">
        <div class="section-title wow animate__fadeInDown" data-wow-duration="1500ms">СКИДКИ ДНЯ</div>
        <div class="container">
            <div class="swiper-container card-slider wow animate__fadeInUp" data-wow-duration="1500ms">
                <div class="swiper-wrapper">
                    @foreach($discount_product as $value)
                    <div class="swiper-slide">
                        <div class="card">
                            <a href="{{ url('product',$value->id)  }}" class="image">
                                <img src="{{ asset('uploads')}}/{{ $value->image  }}" alt="">
                            </a>
                            <div class="name">{{ $value->name  }}</div>
                            <div class="pr-h">
                                <div class="price">
                                    <div class="sale">{{ number_format($value->price,0,' ',' ')  }} RUB</div>
                                    <div class="new-price">{{ number_format($value->price_discount,0,' ',' ')  }} RUB</div>
                                </div>
                                <button class="heart @if(!empty($favorite)) @if(in_array($value->id,$favorite)) add @endif @endif" id="{{ $value->id }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="26.705" height="23.98" viewBox="0 0 26.705 23.98">
                                        <defs><style>.a{fill:none;stroke:#9D9D9D;stroke-width:2px;}</style></defs>
                                        <path class="a" d="M22.746,2.151A6.643,6.643,0,0,0,17.8,0a6.215,6.215,0,0,0-3.882,1.34,7.942,7.942,0,0,0-1.569,1.639,7.938,7.938,0,0,0-1.57-1.639A6.214,6.214,0,0,0,6.9,0,6.644,6.644,0,0,0,1.96,2.151,7.722,7.722,0,0,0,0,7.425a9.2,9.2,0,0,0,2.45,6.019A52.251,52.251,0,0,0,8.585,19.2c.85.724,1.813,1.545,2.814,2.42a1.45,1.45,0,0,0,1.91,0c1-.875,1.964-1.7,2.814-2.421a52.222,52.222,0,0,0,6.133-5.757,9.2,9.2,0,0,0,2.45-6.019,7.722,7.722,0,0,0-1.96-5.274Zm0,0" transform="translate(1 1)"></path>
                                    </svg>
                                </button>
                            </div>
                            <a style="cursor: pointer" id="{{ $value->id  }}" class="basket">В КОРЗИНУ</a>
                            <div class="percent">
                                {{ substr(($value->price_discount/$value->price)*100 - 100,0,3) }}
                                %
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
    </div>
    @endif

    @if(!empty($soon))
    <div class="soon">
        <div class="section-title wow animate__fadeInDown" data-wow-duration="1500ms">#УЖЕСКОРО</div>
        <div class="container">
            @foreach($soon as $value)
                <a href="{{ $value->button  }}" class="item wow animate__zoomIn" data-wow-duration="1500ms">
                    <img src="{{ asset('uploads')}}/{{ $value->image  }}" alt="">
                    <span>Скоро</span>
                </a>
            @endforeach
        </div>
    </div>
    @endif

    @if(!empty($discount_left))
    <div class="sales-item">
        <div class="container">
            <div class="left">
                <div class="title wow animate__fadeInLeft" data-wow-duration="1500ms">{{ $discount_left->title  }}</div>
                <p class="wow animate__fadeInUp" data-wow-duration="1500ms">
                    {{ $discount_left->description  }}
                </p>
                <div class="image wow animate__fadeInLeft" data-wow-duration="1500ms">
                    <img src="{{ asset('uploads')}}/{{ $discount_left->image  }}" alt="">
                    <div class="top">{{ $discount_left->name  }}</div>
                    <div class="sub-title">
                        {{ $discount_left->info  }}
                    </div>
                    <div class="term">
                        {{ $discount_left->lifetime  }}
                    </div>
                    <a href="{{ $discount_left->button  }}">ПОСМОТРЕТЬ</a>
                </div>
            </div>

            @if(!empty($discount_right))
            <div class="right">
                <div class="image wow animate__fadeInRight" data-wow-duration="1500ms">
                    <img src="{{ asset('frontend/img/products/sale-product.png')}}" alt="">
                    <div class="top">
                        {{ $discount_right->name  }}
                        <div class="term">
                            {{ $discount_right->lifetime  }}
                        </div>
                    </div>
                    <div class="sub-title">{{  $discount_right->info }}</div>
                    <a href="{{ $discount_right->button  }}">ПОСМОТРЕТЬ</a>
                </div>
            </div>
            @endif
        </div>
    </div>
    @endif


    @if(!empty($news))
    <div class="news">
        <div class="container">
            <div class="top">
                <div class="title wow animate__fadeInLeft" data-wow-duration="1500ms">НОВОСТИ</div>
            </div>
            @foreach($news as $value)
                <a href="{{ url('post',$value->id)  }}" class="new wow animate__fadeInUp" data-wow-duration="1500ms">
                    <div class="title">
                        {{ $value->name  }}
                    </div>
                    <div class="bottom">
                        <div class="date">{{ substr($value->day,0,10)  }}</div>
                        <div class="source"><span>Источник:</span>{{ $value->source  }}</div>
                    </div>
                </a>
            @endforeach
        </div>
        <a href="{{ url('/news')  }}" class="show-more text-center">
            перейти ко всем новостям
        </a>
    </div>
    @endif

    @if(!empty($advantagetext))
    <div class="advantages">
        <div class="section-title wow animate__fadeInDown" data-wow-duration="1500ms">{{ $advantagetext->title  }}</div>
        <p class="sub-title wow animate__fadeInUp" data-wow-duration="1500ms">{{ $advantagetext -> description  }}</p>
        @endif
        @if(!empty($advantages))
        <div class="items">
            @foreach($advantages as $value)
            <div class="item">
                <img src="{{ asset('uploads')}}/{{ $value->image  }}" alt="{{ $value->alt  }}" class="wow animate__zoomIn" data-wow-duration="1500ms">
                <div class="title wow animate__fadeInUp" data-wow-duration="1500ms">
                    {{ $value->title  }}
                </div>
                <p class="wow animate__fadeInUp" data-wow-duration="1500ms">
                    {!! $value -> description  !!}
                </p>
            </div>
            @endforeach
        </div>
    </div>
    @endif

    @if(!empty($certificate)){
    <div class="certificates">
        <div class="section-title">СЕРТИФИКАТЫ</div>
        <div class="items">
            @foreach($certificate as $value)
                <div class="item wow animate__zoomIn" data-wow-duration="1500ms">
                    <img src="{{ asset('uploads')}}/{{ $value->image  }}" alt="">
                </div>
            @endforeach
        </div>
    </div>
    @endif
@endsection
