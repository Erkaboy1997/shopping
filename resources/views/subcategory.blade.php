@extends('layouts.subcategory')
@section('content')

@if(!empty($category_banner))
<div class="banner">
    <div class="title">{{ $category_banner ->name   }}</div>
    <img src="{{ asset('uploads')}}/{{ $category_banner -> image }}" alt="{{ $category_banner->alt  }}">
</div>
@endif

<div class="container">
    <form action="{{ url('subcategory',$id)  }}" method="GET">
        <div class="filter">
            <div class="item">
                <button class="filter-btn open">
                    <svg width="30" height="30" viewBox="0 0 30 30" fill="#242424" xmlns="http://www.w3.org/2000/svg">
                        <path d="M24.633 0H5.36695C2.40762 0 0 2.40762 0 5.36695V24.6331C0 27.5924 2.40762 30 5.36695 30H24.6331C27.5924 30 30 27.5924 30 24.633V5.36695C30 2.40762 27.5924 0 24.633 0ZM28.2422 24.633C28.2422 26.6231 26.6231 28.2422 24.633 28.2422H5.36695C3.37687 28.2422 1.75781 26.6231 1.75781 24.633V5.36695C1.75781 3.37687 3.37687 1.75781 5.36695 1.75781H24.6331C26.6231 1.75781 28.2422 3.37687 28.2422 5.36695V24.633Z" fill="white"/>
                        <path d="M25.3555 6.58982H11.9691C11.601 5.49676 10.5672 4.70703 9.35157 4.70703C8.13599 4.70703 7.1021 5.49676 6.73407 6.58982H4.64456C4.15917 6.58982 3.76566 6.98334 3.76566 7.46873C3.76566 7.95412 4.15917 8.34764 4.64456 8.34764H6.73413C7.10216 9.4407 8.13605 10.2304 9.35163 10.2304C10.5672 10.2304 11.6011 9.4407 11.9691 8.34764H25.3555C25.8409 8.34764 26.2344 7.95412 26.2344 7.46873C26.2344 6.98334 25.8409 6.58982 25.3555 6.58982ZM9.35157 8.47262C8.79804 8.47262 8.34769 8.02227 8.34769 7.46873C8.34769 6.9152 8.79804 6.46484 9.35157 6.46484C9.90511 6.46484 10.3555 6.9152 10.3555 7.46873C10.3555 8.02227 9.90511 8.47262 9.35157 8.47262Z" fill="white"/>
                        <path d="M25.3555 14.1212H23.2659C22.8979 13.0281 21.8639 12.2384 20.6484 12.2384C19.4329 12.2384 18.399 13.0281 18.0309 14.1212H4.64456C4.15917 14.1212 3.76566 14.5147 3.76566 15.0001C3.76566 15.4855 4.15917 15.879 4.64456 15.879H18.0309C18.399 16.9721 19.4329 17.7618 20.6484 17.7618C21.864 17.7618 22.8979 16.9721 23.2659 15.879H25.3555C25.8409 15.879 26.2344 15.4855 26.2344 15.0001C26.2344 14.5147 25.8409 14.1212 25.3555 14.1212ZM20.6484 16.004C20.0949 16.004 19.6446 15.5536 19.6446 15.0001C19.6446 14.4466 20.0949 13.9962 20.6484 13.9962C21.202 13.9962 21.6523 14.4466 21.6523 15.0001C21.6523 15.5536 21.202 16.004 20.6484 16.004Z" fill="white"/>
                        <path d="M25.3555 21.6523H15.7347C15.3667 20.5593 14.3328 19.7695 13.1172 19.7695C11.9016 19.7695 10.8677 20.5593 10.4997 21.6523H4.64456C4.15917 21.6523 3.76566 22.0458 3.76566 22.5312C3.76566 23.0166 4.15917 23.4101 4.64456 23.4101H10.4997C10.8677 24.5032 11.9016 25.2929 13.1172 25.2929C14.3328 25.2929 15.3667 24.5032 15.7347 23.4101H25.3555C25.8409 23.4101 26.2344 23.0166 26.2344 22.5312C26.2344 22.0458 25.8409 21.6523 25.3555 21.6523ZM13.1172 23.5352C12.5637 23.5352 12.1133 23.0848 12.1133 22.5313C12.1133 21.9778 12.5637 21.5274 13.1172 21.5274C13.6708 21.5274 14.1211 21.9777 14.1211 22.5312C14.1211 23.0848 13.6708 23.5352 13.1172 23.5352Z" fill="white"/>
                    </svg>
                    ОТКРЫТЬ ФИЛьТРЫ
                </button>
            </div>
            @if(!empty($color))
            <div class="item show animate-y">
                <div class="title">Цвет:</div>
                <div class="colors labels">
                    <?php
                        $colors = \Illuminate\Support\Facades\Input::has('colors') ? \Illuminate\Support\Facades\Input::get('colors') : [];
                    ?>
                    @foreach($color as $value)
                        <label class="label">
                            <input type="checkbox" value="{{ $value->id  }}" {{ in_array($value->id,$colors) ? "checked" : ""  }} name="colors[]" class="checkbox">
                            <span class="fake color-1" style="background-color: {{ $value->code  }}"></span>
                        </label>
                    @endforeach
                </div>
            </div>
            @endif

            @if(!empty($size))
            <?php
                $sizes = \Illuminate\Support\Facades\Input::has('sizes') ? \Illuminate\Support\Facades\Input::get('sizes') : [];
            ?>
            <div class="item show animate-y">
                <div class="title">РАЗМЕР:</div>
                <div class="colors labels">
                    @foreach($size as $value)
                        <label class="label">
                            <input name="sizes[]" value="{{ $value->id  }}" {{ in_array($value->id,$sizes) ? "checked" : ""  }} type="checkbox" class="checkbox">
                            <span class="fake size">{{ $value->name  }}</span>
                        </label>
                    @endforeach
                </div>
            </div>
            @endif

            <div class="item range show animate-y">
                <div class="top">
                    <div class="title">
                        Цены:
                    </div>
                    <div class="price-input">
                        <input value="@if(!empty($min_price->price)) {{ $min_price->price  }} @endif" type="text" class="minamount" disabled>
                        <span class="line"></span>
                        <input value="@if(!empty($max_price->price)) {{ $max_price->price }} @endif" type="text" class="maxamount" disabled>
                        <span>RUB</span>
                    </div>
                </div>
                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content" data-min="@if(!empty($min_price->price)) {{ $min_price->price  }} @endif" data-max="@if(!empty($max_price->price)) {{ $max_price->price  }} @endif">
                    <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" id="left"></span>
                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default" id="right"></span>
                </div>
                <button type="reset" class="reset">
                    <a href="{{ url('subcategory',$id)  }}" style="color: white">Сбросить все</a>
                </button>
                <button type="submit" class="reset">
                    Применить
                </button>
            </div>

            @if(!empty($season))
            <div class="item h-tags show animate-y">
                <?php
                    $seasons = \Illuminate\Support\Facades\Input::has('seasons') ? \Illuminate\Support\Facades\Input::get('seasons') : [];
                ?>
                @foreach($season as $value)
                <label class="h-tag">
                    <input type="checkbox" name="seasons[]" {{ in_array($value->id,$seasons) ? "checked" : ""  }} value="{{ $value->id  }}" class="checkbox">
                    <span class="fake">{{ $value->name  }}</span>
                </label>
                @endforeach
            </div>
            @endif
        </div>
    </form>
</div>

<div class="cards">
    <div class="container">
        @if(!empty($product))
        <div class="row wow animate__fadeInUp" data-wow-duration="1500ms" id="result-show-category">
            @foreach($product as $value)
                <div class="col-lg-3 col-md-4 col-10 card">
                    <a href="{{ url('product',$value->id)  }}" class="image">
                        <img src="{{ asset('uploads') }}/{{ $value->image  }}" alt="">
                    </a>
                    <div class="name">{{ $value->name  }}</div>
                    <div class="pr-h">
                        <div class="price">
                            @if(!empty($value->price_discount))
                                <div class="sale">{{ number_format($value->price_discount,0,' ',' ')  }} RUB</div>
                            @endif
                            @if(!empty($value->price))
                                <div class="new-price">{{ number_format($value->price,0,' ',' ')  }} RUB</div>
                            @endif
                        </div>
                        <button class="heart @if(!empty($favorite)) @if(in_array($value->id,$favorite)) add @endif @endif" id="{{ $value->id }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="26.705" height="23.98" viewBox="0 0 26.705 23.98"><defs><style>.a{fill:none;stroke:#9D9D9D;stroke-width:2px;}</style></defs><path class="a" d="M22.746,2.151A6.643,6.643,0,0,0,17.8,0a6.215,6.215,0,0,0-3.882,1.34,7.942,7.942,0,0,0-1.569,1.639,7.938,7.938,0,0,0-1.57-1.639A6.214,6.214,0,0,0,6.9,0,6.644,6.644,0,0,0,1.96,2.151,7.722,7.722,0,0,0,0,7.425a9.2,9.2,0,0,0,2.45,6.019A52.251,52.251,0,0,0,8.585,19.2c.85.724,1.813,1.545,2.814,2.42a1.45,1.45,0,0,0,1.91,0c1-.875,1.964-1.7,2.814-2.421a52.222,52.222,0,0,0,6.133-5.757,9.2,9.2,0,0,0,2.45-6.019,7.722,7.722,0,0,0-1.96-5.274Zm0,0" transform="translate(1 1)"></path></svg>
                        </button>
                    </div>
                    <a  style="cursor: pointer" id="{{ $value->id  }}" class="basket">В КОРЗИНУ</a>
                    @if(!empty($value->price_discount))
                        <div class="percent">
                            {{ substr(($value->price_discount/$value->price)*100 - 100,0,3) }}
                            %
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
        @endif

        @if(count($product) > 0)
            <div class="show-more" category_id="{{ $id }}" id="show-category" value="0">
                показать Еще
            </div>
        @endif
    </div>
</div>

@endsection
