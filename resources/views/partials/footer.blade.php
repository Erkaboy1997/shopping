<footer class="wow animate__fadeInUp" data-wow-duration="1500ms">
    <div class="container-fluid">
        <div class="item">
            <div class="title">МЕНю</div>
            <ul>
                <li><a href="{{ url('/')  }}">Главная</a></li>
                <li><a href="{{ url('/about')  }}">О нас</a></li>
                <li><a href="{{ url('/news') }}">Новости</a></li>
                <li><a href="{{ url('/contact')  }}">Контакты</a></li>
            </ul>
        </div>
        <div class="item">
            <div class="title">Каталог</div>
            <ul>
                @include('partials.category')
            </ul>
        </div>
        <div class="item">
            <div class="title">Контакты</div>
            <ul>
                @php
                    $contact = \Illuminate\Support\Facades\DB::table('contacts')->orderByDesc('id')->first();
                @endphp
                @if(!empty($contact))
                    <li><a href="mailto:{{ $contact->email  }}" class="email">{{ $contact->email  }}</a></li>
                    <li>
                        <a href="tel:{{ $contact->phone_first  }}" class="number">
                            {{ substr($contact->phone_first,0,2) }} {{ substr($contact->phone_first,2,3) }} {{ substr($contact->phone_first,5,3)  }}-{{ substr($contact->phone_first,8,2)  }}-{{ substr($contact->phone_first,10,2)  }}
                        </a>
                    </li>
                    <li>
                        <a href="tel:{{ $contact->phone_second }}" class="number">
                            {{ substr($contact->phone_second,0,2) }} {{ substr($contact->phone_second,2,3) }} {{ substr($contact->phone_second,5,3)  }}-{{ substr($contact->phone_second,8,2)  }}-{{ substr($contact->phone_second,10,2)  }}
                        </a>
                    </li>
                @endif
            </ul>
        </div>
        <div class="item">
            <div class="title">подпишитесь на нашу рассылку</div>
            <form action="">
                <input type="email" placeholder="Эл. почта">
                <button type="submit">оставить</button>
            </form>
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
        </div>
    </div>
    <div class="bottom">
        <div class="copyright">© 2020 XOTextile. Все права защищены </div>
        <div class="method">
            <img src="{{ asset('frontend/img/icons/visa.svg')}}" alt="">
            <img src="{{ asset('frontend/img/icons/sberbank.svg')}}" alt="">
            <div class="score">
                <div>ИНН 9723089575</div>
                <div>КПП 772301001</div>
            </div>
        </div>
        <a href="http://vendy.agency/" class="by">
            <span>Created by</span>
            <img src="{{ asset('frontend/img/logo-vendy.svg')}}" alt="">
        </a>
    </div>
</footer>
