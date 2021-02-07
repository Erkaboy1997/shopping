<div class="page-links">
    <div class="info">
        <div class="image">
            <img src="{{ asset('frontend/img/default.svg')}}" alt="">
            <button class="edit">
                <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M0 16.6244V21H4.3756L17.2865 8.08898L12.9109 3.71338L0 16.6244Z" fill="white"/>
                    <path d="M20.6594 3.06582L17.9348 0.341297C17.4797 -0.113766 16.7388 -0.113766 16.2837 0.341297L14.1484 2.47659L18.524 6.8522L20.6593 4.7169C21.1145 4.26184 21.1145 3.52088 20.6594 3.06582Z" fill="white"/>
                </svg>
            </button>
        </div>
        <div class="name">
            Владимир Ким
        </div>
        <div class="number">
            example@gmail.com
        </div>
    </div>
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
