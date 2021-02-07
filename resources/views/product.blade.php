@extends('layouts.product')
@section('content')

    <div class="modal">
        <div class="title">КОПИРОВАТЬ ССЫЛКУ</div>
        <div class="inputs">
            <input type="text" id="copyTarget" value="{{ url('product',$product->id)  }}">
            <button class="copy" id="copyButton"><img src="{{  asset('frontend/img/icons/copy.svg')}}" alt=""></button>
        </div>
        <div class="title">ПОДЕЛИТСЯ</div>
        <ul class="socials">
            @if(!empty($contact->telegram))
                <li>
                    <a href="{{ $contact->telegram  }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="27" height="27" viewBox="0 0 27 27" fill="none">
                            <path d="M6.49663 15.3846L9.85474 23.7793L14.2265 19.4075L21.7222 25.3652L27 1.63477L0 12.8812L6.49663 15.3846ZM19.2847 8.44327L11.0205 15.9812L9.9911 19.8607L8.08958 15.1059L19.2847 8.44327Z" fill="#2F2F2F"/>
                        </svg>
                    </a>
                </li>
            @endif

            @if(!empty($contact->facebook))
                <li>
                    <a href="{{ $contact->facebook  }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="27" viewBox="0 0 28 27" fill="none">
                            <path d="M24.5 0H3.5C1.56975 0 0 1.51369 0 3.375V23.625C0 25.4863 1.56975 27 3.5 27H14V17.7188H10.5V13.5H14V10.125C14 7.32881 16.3503 5.0625 19.25 5.0625H22.75V9.28125H21C20.034 9.28125 19.25 9.1935 19.25 10.125V13.5H23.625L21.875 17.7188H19.25V27H24.5C26.4303 27 28 25.4863 28 23.625V3.375C28 1.51369 26.4303 0 24.5 0Z" fill="#2F2F2F"/>
                        </svg>
                    </a>
                </li>
            @endif

            @if(!empty($contact->instagram))
                <lo>
                    <a href="{{ $contact->instagram  }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
                            <path d="M20.625 0H9.375C4.19813 0 0 4.19813 0 9.375V20.625C0 25.8019 4.19813 30 9.375 30H20.625C25.8019 30 30 25.8019 30 20.625V9.375C30 4.19813 25.8019 0 20.625 0ZM27.1875 20.625C27.1875 24.2437 24.2437 27.1875 20.625 27.1875H9.375C5.75625 27.1875 2.8125 24.2437 2.8125 20.625V9.375C2.8125 5.75625 5.75625 2.8125 9.375 2.8125H20.625C24.2437 2.8125 27.1875 5.75625 27.1875 9.375V20.625Z" fill="#2F2F2F"/>
                            <path d="M15 7.5C10.8581 7.5 7.5 10.8581 7.5 15C7.5 19.1419 10.8581 22.5 15 22.5C19.1419 22.5 22.5 19.1419 22.5 15C22.5 10.8581 19.1419 7.5 15 7.5ZM15 19.6875C12.4162 19.6875 10.3125 17.5837 10.3125 15C10.3125 12.4144 12.4162 10.3125 15 10.3125C17.5837 10.3125 19.6875 12.4144 19.6875 15C19.6875 17.5837 17.5837 19.6875 15 19.6875Z" fill="#2F2F2F"/>
                            <path d="M23.0626 7.93722C23.6145 7.93722 24.062 7.48979 24.062 6.93785C24.062 6.38591 23.6145 5.93848 23.0626 5.93848C22.5107 5.93848 22.0632 6.38591 22.0632 6.93785C22.0632 7.48979 22.5107 7.93722 23.0626 7.93722Z" fill="#2F2F2F"/>
                        </svg>
                    </a>
                </lo>
            @endif
        </ul>
        <div class="exit">
            <span></span>
            <span></span>
        </div>
    </div>

    <div class="product">
        <a href="{{ url()->previous() }}" class="back">
            <img src="{{ asset('frontend/img/back-arrow.png')}}" alt="">
        </a>

        <div class="container">
            <div class="left">
                <div class="swiper-container product-slider">
                    <div class="swiper-wrapper">
                        @if(!empty($product->image))
                        <div class="swiper-slide">
                            <div class="image" data-scale="1.6">
                                <img src="{{ asset('uploads')}}/{{ $product->image  }}" alt="">
                            </div>
                        </div>
                        @endif

                        @if(!empty($product->image1))
                        <div class="swiper-slide">
                            <div class="image" data-scale="1.6">
                                <img src="{{ asset('uploads')}}/{{ $product->image1  }}" alt="">
                            </div>
                        </div>
                        @endif

                        @if(!empty($product->image2))
                        <div class="swiper-slide">
                            <div class="image" data-scale="1.6">
                                <img src="{{ asset('uploads')}}/{{ $product->image2  }}" alt="">
                            </div>
                        </div>
                        @endif

                        @if(!empty($product->image3))
                        <div class="swiper-slide">
                            <div class="image" data-scale="1.6">
                                <img src="{{ asset('uploads')}}/{{ $product->image3 }}" alt="">
                            </div>
                        </div>
                        @endif

                        @if(!empty($product->image4))
                            <div class="swiper-slide">
                                <div class="image" data-scale="1.6">
                                    <img src="{{ asset('uploads')}}/{{ $product->image4 }}" alt="">
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="swiper-container product-small-slider">
                    <div class="swiper-wrapper">
                        @if(!empty($product->image))
                        <div class="swiper-slide">
                            <div class="image">
                                <img src="{{ asset('uploads')}}/{{ $product->image  }}" alt="">
                            </div>
                        </div>
                        @endif

                        @if(!empty($product->image1))
                        <div class="swiper-slide">
                            <div class="image">
                                <img src="{{ asset('uploads')}}/{{ $product->image1 }}" alt="">
                            </div>
                        </div>
                        @endif

                        @if(!empty($product->image2))
                        <div class="swiper-slide">
                            <div class="image">
                                <img src="{{ asset('uploads')}}/{{ $product->image2  }}" alt="">
                            </div>
                        </div>
                        @endif

                        @if(!empty($product->image3))
                        <div class="swiper-slide">
                            <div class="image">
                                <img src="{{ asset('uploads')}}/{{ $product->image3  }}" alt="">
                            </div>
                        </div>
                        @endif

                        @if(!empty($product->image4))
                            <div class="swiper-slide">
                                <div class="image">
                                    <img src="{{ asset('uploads')}}/{{ $product->image4  }}" alt="">
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="right">
                <div class="top">
                    <div class="num">№ {{ $product->code  }}</div>
                    <div class="stock">
                        @if($product->status)
                            В наличии
                            <svg width="19" height="19" viewBox="0 0 19 19" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M17.4711 2.25269L6.03442 13.6894L1.52888 9.18385L0 10.7127L6.03442 16.7471L19 3.78156L17.4711 2.25269Z" fill="#7ED196"/>
                            </svg>
                        @endif
                    </div>
                </div>
                <div class="title">
                    {{ $product->name  }}
                </div>
                <form action="{{ url('buy')  }}" method="GET">
                    <div class="size-color">
                        @if(!empty($size))
                            <div class="item sizes">
                                <div class="text">Размер:</div>
                                <div class="labels">
                                    @foreach($size as $value)
                                        <label class="label">
                                            <input name="sizes[]" type="checkbox" value="{{ $value->id  }}" class="checkbox">
                                            <span class="fake">{{ $value->name  }}</span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        @if(!empty($color))
                            <div class="item colors">
                                <div class="text">цвет:</div>
                                <div class="labels">
                                    @foreach($color as $value)
                                        <label class="label">
                                            <input type="radio" name="color" value="{{ $value->id  }}" class="checkbox">
                                            <span class="fake color-1" style="background-color: {{ $value->code  }}"></span>
                                        </label>
                                    @endforeach
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="price">
                        @if(!empty($product->price_discount))
                            {{ number_format($product->price_discount,0,' ',' ')  }}
                        @else
                            {{ number_format($product->price,0,' ',' ')  }}
                        @endif
                         RUB
                    </div>
                    <input type="hidden" name="product_id" value="{{ $id  }}">
                    <div class="buttons">
                        <div class="quantity">
                            <div class="pro-qty">
                                <input type="text" name="product_count" value="1">
                            </div>
                        </div>
                        <button type="submit" class="link">купить</button>
                        <a style="cursor: pointer" id="{{ $product->id  }}" class="basket link">В корзину</a>


                        <p class="heart @if(!empty($favorite)) @if(in_array($product->id,$favorite)) add @endif @endif" id="{{ $product->id  }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="26.705" height="23.98" viewBox="0 0 26.705 23.98"><defs><style>.a{fill:none;stroke:#9D9D9D;stroke-width:2px;}</style></defs><path class="a" d="M22.746,2.151A6.643,6.643,0,0,0,17.8,0a6.215,6.215,0,0,0-3.882,1.34,7.942,7.942,0,0,0-1.569,1.639,7.938,7.938,0,0,0-1.57-1.639A6.214,6.214,0,0,0,6.9,0,6.644,6.644,0,0,0,1.96,2.151,7.722,7.722,0,0,0,0,7.425a9.2,9.2,0,0,0,2.45,6.019A52.251,52.251,0,0,0,8.585,19.2c.85.724,1.813,1.545,2.814,2.42a1.45,1.45,0,0,0,1.91,0c1-.875,1.964-1.7,2.814-2.421a52.222,52.222,0,0,0,6.133-5.757,9.2,9.2,0,0,0,2.45-6.019,7.722,7.722,0,0,0-1.96-5.274Zm0,0" transform="translate(1 1)"></path></svg>
                        </p>

                        <p class="share" style="cursor:pointer">
                            <img src="{{ asset('frontend/img/icons/share.svg')}}" alt="">
                        </p>
                    </div>
                </form>

                <div class="specifications">
                    <div class="top-tabs">
                        <div class="tab active">Описание</div>
                        <div class="tab">Детали доставки</div>
                        <div class="tab">Характеристика</div>
                    </div>
                    <div class="tabs-content">
                        <div class="content active">
                            {!! $product->description  !!}
                        </div>
                        <div class="content">
                            {!! $product->delivery  !!}
                        </div>
                        <div class="content">
                            {!! $product->character  !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById("copyButton").addEventListener("click", function() {
            copyToClipboard(document.getElementById("copyTarget"));
        });
        function copyToClipboard(elem) {
            var targetId = "_hiddenCopyText_";
            var isInput = elem.tagName === "INPUT" || elem.tagName === "TEXTAREA";
            var origSelectionStart, origSelectionEnd;
            if (isInput) {
                // can just use the original source element for the selection and copy
                target = elem;
                origSelectionStart = elem.selectionStart;
                origSelectionEnd = elem.selectionEnd;
            } else {
                // must use a temporary form element for the selection and copy
                target = document.getElementById(targetId);
                if (!target) {
                    var target = document.createElement("textarea");
                    target.style.position = "absolute";
                    target.style.left = "-9999px";
                    target.style.top = "0";
                    target.id = targetId;
                    document.body.appendChild(target);
                }
                target.textContent = elem.textContent;
            }
            // select the content
            var currentFocus = document.activeElement;
            target.focus();
            target.setSelectionRange(0, target.value.length);

            // copy the selection
            var succeed;
            try {
                succeed = document.execCommand("copy");
            } catch(e) {
                succeed = false;
            }
            // restore original focus
            if (currentFocus && typeof currentFocus.focus === "function") {
                currentFocus.focus();
            }

            if (isInput) {
                // restore prior selection
                elem.setSelectionRange(origSelectionStart, origSelectionEnd);
            } else {
                // clear temporary content
                target.textContent = "";
            }
            return succeed;
        }
    </script
@endsection
