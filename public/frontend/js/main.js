$(function (){
    $('.burger').on('click', function () {
        $('header .links').toggleClass('active')
    });
    $('.heart').on('click', function (){
        $(this).toggleClass('add');
    });
    $('header form .btn').on('click', function (){
        $(this).parent('form').children('.search-input').addClass('active').focus()
    })
    $('.search-input').on('blur', function () {
        if($(this).val().length == 0){
            $(this).removeClass('active');
        }
        if($(this).val().length >= 1){
            $('header .btn').hide();
        }
    });

    $('.condition-btn').on('click', function (){
        $('.condition-modal').addClass('condition-show')
    })
    $('.condition-modal .exit, .condition-modal').on('click', function (){
        $('.condition-modal').removeClass('condition-show')
    })

    $('.tab-item').each(function (){
        $(this).on('click', function (){
            $('.tab-item.active').removeClass('active')
            $(this).addClass('active')
            index = $(this).index()
            $('.tab').hide()
            $('.tab').eq(index).show()
        })
    })
    $('.specifications .tab').each(function (){
        $(this).on('click', function (){
            $('.tab.active').removeClass('active')
            $(this).addClass('active')
            index = $(this).index()
            $('.specifications .tabs-content .content').removeClass('active')
            $('.specifications .tabs-content .content').eq(index).addClass('active')
        })
    })


    $('.certificates .items .item img').each(function (){
        $(this).on('click', function (){
            $(this).parent('.item').toggleClass('active')
        })
    })


    $(document).on('click', function (e){
        let img = $('.certificates img')
        if(!img.is(e.target) && img.has(e.target).length === 0){
            img.closest('.certificates .item').removeClass('active')
        }
    })

    $('.filter-btn').each(function (){
        if($(this).hasClass('open')){
            $(this).text('Закрыть фильтры').prepend('<svg width="30" height="30" viewBox="0 0 30 30" fill="#242424" xmlns="http://www.w3.org/2000/svg"><path d="M24.633 0H5.36695C2.40762 0 0 2.40762 0 5.36695V24.6331C0 27.5924 2.40762 30 5.36695 30H24.6331C27.5924 30 30 27.5924 30 24.633V5.36695C30 2.40762 27.5924 0 24.633 0ZM28.2422 24.633C28.2422 26.6231 26.6231 28.2422 24.633 28.2422H5.36695C3.37687 28.2422 1.75781 26.6231 1.75781 24.633V5.36695C1.75781 3.37687 3.37687 1.75781 5.36695 1.75781H24.6331C26.6231 1.75781 28.2422 3.37687 28.2422 5.36695V24.633Z" fill="white"/><path d="M25.3555 6.58982H11.9691C11.601 5.49676 10.5672 4.70703 9.35157 4.70703C8.13599 4.70703 7.1021 5.49676 6.73407 6.58982H4.64456C4.15917 6.58982 3.76566 6.98334 3.76566 7.46873C3.76566 7.95412 4.15917 8.34764 4.64456 8.34764H6.73413C7.10216 9.4407 8.13605 10.2304 9.35163 10.2304C10.5672 10.2304 11.6011 9.4407 11.9691 8.34764H25.3555C25.8409 8.34764 26.2344 7.95412 26.2344 7.46873C26.2344 6.98334 25.8409 6.58982 25.3555 6.58982ZM9.35157 8.47262C8.79804 8.47262 8.34769 8.02227 8.34769 7.46873C8.34769 6.9152 8.79804 6.46484 9.35157 6.46484C9.90511 6.46484 10.3555 6.9152 10.3555 7.46873C10.3555 8.02227 9.90511 8.47262 9.35157 8.47262Z" fill="white"/><path d="M25.3555 14.1212H23.2659C22.8979 13.0281 21.8639 12.2384 20.6484 12.2384C19.4329 12.2384 18.399 13.0281 18.0309 14.1212H4.64456C4.15917 14.1212 3.76566 14.5147 3.76566 15.0001C3.76566 15.4855 4.15917 15.879 4.64456 15.879H18.0309C18.399 16.9721 19.4329 17.7618 20.6484 17.7618C21.864 17.7618 22.8979 16.9721 23.2659 15.879H25.3555C25.8409 15.879 26.2344 15.4855 26.2344 15.0001C26.2344 14.5147 25.8409 14.1212 25.3555 14.1212ZM20.6484 16.004C20.0949 16.004 19.6446 15.5536 19.6446 15.0001C19.6446 14.4466 20.0949 13.9962 20.6484 13.9962C21.202 13.9962 21.6523 14.4466 21.6523 15.0001C21.6523 15.5536 21.202 16.004 20.6484 16.004Z" fill="white"/><path d="M25.3555 21.6523H15.7347C15.3667 20.5593 14.3328 19.7695 13.1172 19.7695C11.9016 19.7695 10.8677 20.5593 10.4997 21.6523H4.64456C4.15917 21.6523 3.76566 22.0458 3.76566 22.5312C3.76566 23.0166 4.15917 23.4101 4.64456 23.4101H10.4997C10.8677 24.5032 11.9016 25.2929 13.1172 25.2929C14.3328 25.2929 15.3667 24.5032 15.7347 23.4101H25.3555C25.8409 23.4101 26.2344 23.0166 26.2344 22.5312C26.2344 22.0458 25.8409 21.6523 25.3555 21.6523ZM13.1172 23.5352C12.5637 23.5352 12.1133 23.0848 12.1133 22.5313C12.1133 21.9778 12.5637 21.5274 13.1172 21.5274C13.6708 21.5274 14.1211 21.9777 14.1211 22.5312C14.1211 23.0848 13.6708 23.5352 13.1172 23.5352Z" fill="white"/></svg>')
        } else {
            $(this).text('Открыть фильтры').prepend('<svg width="30" height="30" viewBox="0 0 30 30" fill="#242424" xmlns="http://www.w3.org/2000/svg"><path d="M24.633 0H5.36695C2.40762 0 0 2.40762 0 5.36695V24.6331C0 27.5924 2.40762 30 5.36695 30H24.6331C27.5924 30 30 27.5924 30 24.633V5.36695C30 2.40762 27.5924 0 24.633 0ZM28.2422 24.633C28.2422 26.6231 26.6231 28.2422 24.633 28.2422H5.36695C3.37687 28.2422 1.75781 26.6231 1.75781 24.633V5.36695C1.75781 3.37687 3.37687 1.75781 5.36695 1.75781H24.6331C26.6231 1.75781 28.2422 3.37687 28.2422 5.36695V24.633Z" fill="white"/><path d="M25.3555 6.58982H11.9691C11.601 5.49676 10.5672 4.70703 9.35157 4.70703C8.13599 4.70703 7.1021 5.49676 6.73407 6.58982H4.64456C4.15917 6.58982 3.76566 6.98334 3.76566 7.46873C3.76566 7.95412 4.15917 8.34764 4.64456 8.34764H6.73413C7.10216 9.4407 8.13605 10.2304 9.35163 10.2304C10.5672 10.2304 11.6011 9.4407 11.9691 8.34764H25.3555C25.8409 8.34764 26.2344 7.95412 26.2344 7.46873C26.2344 6.98334 25.8409 6.58982 25.3555 6.58982ZM9.35157 8.47262C8.79804 8.47262 8.34769 8.02227 8.34769 7.46873C8.34769 6.9152 8.79804 6.46484 9.35157 6.46484C9.90511 6.46484 10.3555 6.9152 10.3555 7.46873C10.3555 8.02227 9.90511 8.47262 9.35157 8.47262Z" fill="white"/><path d="M25.3555 14.1212H23.2659C22.8979 13.0281 21.8639 12.2384 20.6484 12.2384C19.4329 12.2384 18.399 13.0281 18.0309 14.1212H4.64456C4.15917 14.1212 3.76566 14.5147 3.76566 15.0001C3.76566 15.4855 4.15917 15.879 4.64456 15.879H18.0309C18.399 16.9721 19.4329 17.7618 20.6484 17.7618C21.864 17.7618 22.8979 16.9721 23.2659 15.879H25.3555C25.8409 15.879 26.2344 15.4855 26.2344 15.0001C26.2344 14.5147 25.8409 14.1212 25.3555 14.1212ZM20.6484 16.004C20.0949 16.004 19.6446 15.5536 19.6446 15.0001C19.6446 14.4466 20.0949 13.9962 20.6484 13.9962C21.202 13.9962 21.6523 14.4466 21.6523 15.0001C21.6523 15.5536 21.202 16.004 20.6484 16.004Z" fill="white"/><path d="M25.3555 21.6523H15.7347C15.3667 20.5593 14.3328 19.7695 13.1172 19.7695C11.9016 19.7695 10.8677 20.5593 10.4997 21.6523H4.64456C4.15917 21.6523 3.76566 22.0458 3.76566 22.5312C3.76566 23.0166 4.15917 23.4101 4.64456 23.4101H10.4997C10.8677 24.5032 11.9016 25.2929 13.1172 25.2929C14.3328 25.2929 15.3667 24.5032 15.7347 23.4101H25.3555C25.8409 23.4101 26.2344 23.0166 26.2344 22.5312C26.2344 22.0458 25.8409 21.6523 25.3555 21.6523ZM13.1172 23.5352C12.5637 23.5352 12.1133 23.0848 12.1133 22.5313C12.1133 21.9778 12.5637 21.5274 13.1172 21.5274C13.6708 21.5274 14.1211 21.9777 14.1211 22.5312C14.1211 23.0848 13.6708 23.5352 13.1172 23.5352Z" fill="white"/></svg>')
        }
        $(this).on('click', function (){
            if($(this).hasClass('open')){
                $(this).text('Открыть фильтры').prepend('<svg width="30" height="30" viewBox="0 0 30 30" fill="#242424" xmlns="http://www.w3.org/2000/svg"><path d="M24.633 0H5.36695C2.40762 0 0 2.40762 0 5.36695V24.6331C0 27.5924 2.40762 30 5.36695 30H24.6331C27.5924 30 30 27.5924 30 24.633V5.36695C30 2.40762 27.5924 0 24.633 0ZM28.2422 24.633C28.2422 26.6231 26.6231 28.2422 24.633 28.2422H5.36695C3.37687 28.2422 1.75781 26.6231 1.75781 24.633V5.36695C1.75781 3.37687 3.37687 1.75781 5.36695 1.75781H24.6331C26.6231 1.75781 28.2422 3.37687 28.2422 5.36695V24.633Z" fill="white"/><path d="M25.3555 6.58982H11.9691C11.601 5.49676 10.5672 4.70703 9.35157 4.70703C8.13599 4.70703 7.1021 5.49676 6.73407 6.58982H4.64456C4.15917 6.58982 3.76566 6.98334 3.76566 7.46873C3.76566 7.95412 4.15917 8.34764 4.64456 8.34764H6.73413C7.10216 9.4407 8.13605 10.2304 9.35163 10.2304C10.5672 10.2304 11.6011 9.4407 11.9691 8.34764H25.3555C25.8409 8.34764 26.2344 7.95412 26.2344 7.46873C26.2344 6.98334 25.8409 6.58982 25.3555 6.58982ZM9.35157 8.47262C8.79804 8.47262 8.34769 8.02227 8.34769 7.46873C8.34769 6.9152 8.79804 6.46484 9.35157 6.46484C9.90511 6.46484 10.3555 6.9152 10.3555 7.46873C10.3555 8.02227 9.90511 8.47262 9.35157 8.47262Z" fill="white"/><path d="M25.3555 14.1212H23.2659C22.8979 13.0281 21.8639 12.2384 20.6484 12.2384C19.4329 12.2384 18.399 13.0281 18.0309 14.1212H4.64456C4.15917 14.1212 3.76566 14.5147 3.76566 15.0001C3.76566 15.4855 4.15917 15.879 4.64456 15.879H18.0309C18.399 16.9721 19.4329 17.7618 20.6484 17.7618C21.864 17.7618 22.8979 16.9721 23.2659 15.879H25.3555C25.8409 15.879 26.2344 15.4855 26.2344 15.0001C26.2344 14.5147 25.8409 14.1212 25.3555 14.1212ZM20.6484 16.004C20.0949 16.004 19.6446 15.5536 19.6446 15.0001C19.6446 14.4466 20.0949 13.9962 20.6484 13.9962C21.202 13.9962 21.6523 14.4466 21.6523 15.0001C21.6523 15.5536 21.202 16.004 20.6484 16.004Z" fill="white"/><path d="M25.3555 21.6523H15.7347C15.3667 20.5593 14.3328 19.7695 13.1172 19.7695C11.9016 19.7695 10.8677 20.5593 10.4997 21.6523H4.64456C4.15917 21.6523 3.76566 22.0458 3.76566 22.5312C3.76566 23.0166 4.15917 23.4101 4.64456 23.4101H10.4997C10.8677 24.5032 11.9016 25.2929 13.1172 25.2929C14.3328 25.2929 15.3667 24.5032 15.7347 23.4101H25.3555C25.8409 23.4101 26.2344 23.0166 26.2344 22.5312C26.2344 22.0458 25.8409 21.6523 25.3555 21.6523ZM13.1172 23.5352C12.5637 23.5352 12.1133 23.0848 12.1133 22.5313C12.1133 21.9778 12.5637 21.5274 13.1172 21.5274C13.6708 21.5274 14.1211 21.9777 14.1211 22.5312C14.1211 23.0848 13.6708 23.5352 13.1172 23.5352Z" fill="white"/></svg>')
            } else {
                $(this).text('Закрыть фильтры').prepend('<svg width="30" height="30" viewBox="0 0 30 30" fill="#242424" xmlns="http://www.w3.org/2000/svg"><path d="M24.633 0H5.36695C2.40762 0 0 2.40762 0 5.36695V24.6331C0 27.5924 2.40762 30 5.36695 30H24.6331C27.5924 30 30 27.5924 30 24.633V5.36695C30 2.40762 27.5924 0 24.633 0ZM28.2422 24.633C28.2422 26.6231 26.6231 28.2422 24.633 28.2422H5.36695C3.37687 28.2422 1.75781 26.6231 1.75781 24.633V5.36695C1.75781 3.37687 3.37687 1.75781 5.36695 1.75781H24.6331C26.6231 1.75781 28.2422 3.37687 28.2422 5.36695V24.633Z" fill="white"/><path d="M25.3555 6.58982H11.9691C11.601 5.49676 10.5672 4.70703 9.35157 4.70703C8.13599 4.70703 7.1021 5.49676 6.73407 6.58982H4.64456C4.15917 6.58982 3.76566 6.98334 3.76566 7.46873C3.76566 7.95412 4.15917 8.34764 4.64456 8.34764H6.73413C7.10216 9.4407 8.13605 10.2304 9.35163 10.2304C10.5672 10.2304 11.6011 9.4407 11.9691 8.34764H25.3555C25.8409 8.34764 26.2344 7.95412 26.2344 7.46873C26.2344 6.98334 25.8409 6.58982 25.3555 6.58982ZM9.35157 8.47262C8.79804 8.47262 8.34769 8.02227 8.34769 7.46873C8.34769 6.9152 8.79804 6.46484 9.35157 6.46484C9.90511 6.46484 10.3555 6.9152 10.3555 7.46873C10.3555 8.02227 9.90511 8.47262 9.35157 8.47262Z" fill="white"/><path d="M25.3555 14.1212H23.2659C22.8979 13.0281 21.8639 12.2384 20.6484 12.2384C19.4329 12.2384 18.399 13.0281 18.0309 14.1212H4.64456C4.15917 14.1212 3.76566 14.5147 3.76566 15.0001C3.76566 15.4855 4.15917 15.879 4.64456 15.879H18.0309C18.399 16.9721 19.4329 17.7618 20.6484 17.7618C21.864 17.7618 22.8979 16.9721 23.2659 15.879H25.3555C25.8409 15.879 26.2344 15.4855 26.2344 15.0001C26.2344 14.5147 25.8409 14.1212 25.3555 14.1212ZM20.6484 16.004C20.0949 16.004 19.6446 15.5536 19.6446 15.0001C19.6446 14.4466 20.0949 13.9962 20.6484 13.9962C21.202 13.9962 21.6523 14.4466 21.6523 15.0001C21.6523 15.5536 21.202 16.004 20.6484 16.004Z" fill="white"/><path d="M25.3555 21.6523H15.7347C15.3667 20.5593 14.3328 19.7695 13.1172 19.7695C11.9016 19.7695 10.8677 20.5593 10.4997 21.6523H4.64456C4.15917 21.6523 3.76566 22.0458 3.76566 22.5312C3.76566 23.0166 4.15917 23.4101 4.64456 23.4101H10.4997C10.8677 24.5032 11.9016 25.2929 13.1172 25.2929C14.3328 25.2929 15.3667 24.5032 15.7347 23.4101H25.3555C25.8409 23.4101 26.2344 23.0166 26.2344 22.5312C26.2344 22.0458 25.8409 21.6523 25.3555 21.6523ZM13.1172 23.5352C12.5637 23.5352 12.1133 23.0848 12.1133 22.5313C12.1133 21.9778 12.5637 21.5274 13.1172 21.5274C13.6708 21.5274 14.1211 21.9777 14.1211 22.5312C14.1211 23.0848 13.6708 23.5352 13.1172 23.5352Z" fill="white"/></svg>')
            }
            $(this).toggleClass('open')
            $('.filter .item').toggleClass('show')
            setTimeout(function (){
                $('.filter .item').toggleClass('animate-y')
            }, 500)
        })
    })

    let cardSlider = new Swiper('.card-slider', {
        slidesPerView: 4,
        spaceBetween: 30,
        speed: 700,
        loop: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            '1700': {
                slidesPerView: 5,
            },
            '992': {
                slidesPerView: 4,
            },
            '768': {
                slidesPerView: 3,
            },
            '575': {
                slidesPerView: 1.2,
            },
            '320': {
                slidesPerView: 1.2,
            }
        }
    });

    let productSmallSlider = new Swiper('.product-small-slider', {
        spaceBetween: 10,
        slidesPerView: 3,
        loopedSlides: 4, //looped slides should be the same
        watchSlidesVisibility: true,
        watchSlidesProgress: true,
        speed: 700,
        loop: true,
    })

    let productSlider = new Swiper('.product-slider', {
        slidesPerView: 1,
        speed: 700,
        loop: true,
        thumbs: {
            swiper: productSmallSlider
        }
    });

    $('.product-page .share').on('click', function (){
        $('.modal').addClass('modal-show')
    })
    $('.modal .exit').on('click', function (){
        $('.modal').removeClass('modal-show')
    })


    if ($(window).width() > 992) {
        $(".product-slider .image")
            .on("mouseover", function () {
                $(this)
                    .children("img")
                    .css({ transform: "scale(" + $(this).attr("data-scale") + ")" });
            })
            .on("mouseout", function () {
                $(this).children("img").css({ transform: "scale(1)" });
            })
            .on("mousemove", function (a) {
                $(this)
                    .children("img")
                    .css({ "transform-origin": ((a.pageX - $(this).offset().left) / $(this).width()) * 100 + "% " + ((a.pageY - $(this).offset().top) / $(this).height()) * 100 + "%" });
            });
        let lastScrollTop = 0, delta = 5;
        $(window).scroll(function(event){
            let st = $(this).scrollTop();

            if(Math.abs(lastScrollTop - st) <= delta)
                return;
            if (st > lastScrollTop){
                $("header").addClass('nav-up');
            } else {
                $("header").removeClass('nav-up');
            }
            lastScrollTop = st;

        });
    }
    if($(window).width() <= 992){
        $('.burger').on('click', function (){
            $('header .links').slideToggle('slow')
        })
        $('header .links .link').on('click', function (){
            $(this).children('.inner').slideToggle('slow');
        })
        $('.filter .categories .category').each(function (){
            $(this).on('click', function (){
                $(this).toggleClass('minus')
                $(this).siblings('ul').slideToggle('slow')
            })
        })
    }


    var proQty = $('.pro-qty');
    proQty.append('<span class="inc qtybtn"><img src="http://127.0.0.1:8000/frontend/img/icons/dec.svg" alt=""></span>');
    proQty.append('<span class="dec qtybtn"><img src="http://127.0.0.1:8000/frontend/img/icons/dec.svg" alt=""></span>');
    proQty.on('click', '.qtybtn', function () {
        var $button = $(this);
        var oldValue = $button.parent().find('input').val();
        if ($button.hasClass('inc')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            // Don't allow decrementing below zero
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        $button.parent().find('input').val(newVal);
    });

    $('.order-form .next').on('click', function (){
        $('.order-form .content-card').removeClass('content-card-active');
        $('.order-form .content-deliver').addClass('content-deliver-active');
        $('.order-form .num:first-child').removeClass('active');
        $('.order-form .num:last-child').addClass('active');
    })
    $('.order-form .prev').on('click', function (){
        $('.order-form .content-card').addClass('content-card-active');
        $('.order-form .content-deliver').removeClass('content-deliver-active');
        $('.order-form .num:last-child').removeClass('active');
        $('.order-form .num:first-child').addClass('active');
    })

    $('.order-btn').on('click', function (){
        $('.order-form').css('right', '0');
        $('.basket-page .cards').addClass('slide-left');
    })
    $('.order-form .exit').on('click', function (){
        $('.order-form').css('right', '-110%');
        $('.basket-page .cards').removeClass('slide-left');
    })

    $('.basket-page .cards .remove').on('click', function (){
        $(this).parent('.b-card').remove()
    })

    $('header .links .link').hover(function (){
        $(this).parent('li').toggleClass('hoverr');
    })

    $('.forms .button').on('click', function (){
        $(this).parent('.inputs').find('input').focus();
    })

    $('.eyes').on('click', function (){
        let eyesImg = $(this).children('img');
        let imgSrc = eyesImg.attr('src');
        if (imgSrc === 'img/icons/eye.svg'){
            eyesImg.attr({'src' : 'img/icons/private.svg'})
        } else{
            eyesImg.attr({'src' : 'img/icons/eye.svg'})
        }
        let input = $(this).siblings('input')
        if (input.attr("type") === "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    })
    $('.about-page .play').on('click', function (){
        $('.video').addClass('show')
    })
    $('.video .exit').on('click', function (){
        $('.video').removeClass('show')
    })
})

TweenMax.from(".burger span", 2, {
    scale: 0,
    ease: Expo.easeInOut
})
TweenMax.from("header ul li", 1.5, {
    delay: 0.5,
    opacity: 0,
    y: 20,
    ease: Expo.easeInOut
})
TweenMax.from("header .logo", 1.5, {
    delay: 1.5,
    scale: 0,
    ease: Expo.easeInOut
});
TweenMax.from("header .numbers", 1.5, {
    delay: 2,
    opacity: 0,
    y: 20,
    ease: Expo.easeInOut
})
TweenMax.from("header .right a, header .right form", 1.5, {
    delay: 1.5,
    scale: 0,
    ease: Expo.easeInOut
});
TweenMax.from(".status-page .title", 1.5, {
    delay: 3,
    opacity: 0,
    y: "100%",
    ease: "power4.out"
})
TweenMax.from("" +
    ".status-page p span, " +
    ".about-page .banner .title span", 1.5, {
    delay: 3.5,
    y: 200,
    ease: "power4.out",
    skewY: 10,
    stagger:{
        amount: 0.4,
    }
})
TweenMax.from(".status-page .back", 1.5, {
    delay: 4,
    opacity: 0,
    y: 30,
    ease: Expo.easeInOut
})
TweenMax.from(".socials a svg", 1.5, {
    delay: 4.5,
    scale: 0,
    ease: Expo.easeInOut
});
TweenMax.from(".about-page .banner img", 1.5, {
    delay: 3,
    scale: .8,
    opacity: 0,
    ease: Expo.easeInOut
});
TweenMax.from(".catalog-page .section-title span", 1.5, {
    delay: 1,
    y: 200,
    ease: "power4.out",
    skewY: 10,
    stagger:{
        amount: 0.4,
    }
})
TweenMax.from("" +
    ".catalog-page .catalog-tabs .tab, " +
    ".catalog-page .container .catalog", 1.5, {
    delay: 1.5,
    scale: 0,
    ease: Expo.easeInOut
});
TweenMax.from(".auth-page .content .left", 1.5, {
    delay: 1,
    width: "0",
    ease: Expo.easeInOut
})
TweenMax.from("" +
    ".auth-page .content .right, " +
    ".contacts-page .content .left img, " +
    ".contacts-page .content .right .image img", 2, {
    width: "0",
    delay: 2,
    ease: Expo.easeInOut
})
TweenMax.from(".auth-page .content .left form", 1.5, {
    height: "0",
    delay: 1.5,
    opacity: 0,
    ease: Expo.easeInOut
})
TweenMax.from(".contacts-page .box .title span", 1.5, {
    delay: 2,
    y: 200,
    ease: "power4.out",
    skewY: 10,
    stagger:{
        amount: 0.4,
    }
})
TweenMax.from(".contacts-page .box .item", 1.5, {
    delay: 1.5,
    opacity: 0,
    x: -50,
    ease: Expo.easeInOut
});
TweenMax.from(".user-page .page-links", 1.5, {
    delay: 1.5,
    opacity: 0,
    x: -50,
    ease: Expo.easeInOut
});
TweenMax.from(".user-page .right", 1.5, {
    delay: 1.8,
    opacity: 0,
    y: 100,
    ease: Expo.easeInOut
});
TweenMax.from(".post-page .article .left img", 1.5, {
    width: "0",
    delay: 1,
    ease: Expo.easeInOut
})
TweenMax.from(".product-page .product .container .left", 1.5, {
    delay: 1.5,
    scale: .5,
    opacity: 0,
    ease: Expo.easeInOut
});
TweenMax.from(".product-page .product .container .right", 1.5, {
    delay: 2,
    x: 500,
    opacity: 0,
    ease: Expo.easeInOut
});
TweenMax.from(".product-page .product .back", 1.5, {
    delay: 2,
    x: 50,
    opacity: 0,
    ease: Expo.easeInOut
});
TweenMax.from(".result-page .content .top form", 1.5, {
    width: "0",
    ease: Expo.easeInOut
})
TweenMax.from(".result-page .content .top .result div", 1.5, {
    delay: 0.5,
    y: 200,
    ease: "power4.out",
    skewY: 10,
    stagger:{
        amount: 0.4,
    }
})
TweenMax.from(".result-page .filter", 1.5, {
    delay: 1,
    x: -100,
    opacity: 0,
    ease: Expo.easeInOut
});
TweenMax.from(".result-page .card", 1.5, {
    delay: 1.5,
    width: "0",
    x: -100,
    opacity: 0,
    ease: Expo.easeInOut
});
TweenMax.from(".main .banner .left img", 1.5, {
    delay: 1,
    width: "0",
    opacity: 0,
    ease: Expo.easeInOut
});
TweenMax.from(".main .banner .banner-slider img", 1.5, {
    delay: 2.5,
    width: "0",
    opacity: 0,
    ease: Expo.easeInOut
});
TweenMax.from(".main .banner .banner-slider .inner .bottom div", 1.5, {
    delay: 3,
    y: 50,
    opacity: 0,
    ease: Expo.easeInOut
});
TweenMax.from(".main .banner .banner-slider .inner .center .title div", 1, {
    delay: 3,
    y: 250,
    ease: "power4.out",
    skewY: 20,
    stagger:{
        amount: 0.4,
    }
});
TweenMax.from(".main .banner .banner-slider .inner .center a", 1.5, {
    delay: 3.5,
    y: 20,
    opacity: 0,
    ease: Expo.easeInOut
});
TweenMax.from("" +
    ".main .banner .left .swiper-slide .front, " +
    ".main .banner .banner-slider .inner .count", 2, {
    delay: 4,
    x: -100,
    opacity: 0,
    ease: Expo.easeInOut
});
TweenMax.from("" +
    ".main .banner .left .swiper-pagination-bullets," +
    ".main .banner .swiper-button-next, .main .banner .swiper-button-prev", 1.5, {
    delay: 4.5,
    opacity: 0,
    ease: Expo.easeInOut
});

wow = new WOW(
    {
        offset: 100,
    }
);
wow.init();

