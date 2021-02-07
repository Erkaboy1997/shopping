var smallSlider = new Swiper('.small-slider', {
    slidesPerView: 1,
    speed: 1000,
    loop: true,
    pagination: {
        el: '.swiper-pagination',
        dynamicBullets: true,
        clickable: true,
    },
});

var bannerSlider = new Swiper('.banner-slider', {
    slidesPerView: 1,
    initialSlide: 0,
    speed: 1000,
    loop: true,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
    pagination: {
        el: '.current',
        type: 'fraction',
        clickable: true,
        renderFraction: function (currentClass, totalClass) {
            return '<span class="' + currentClass + '"></span>';
        }
    },
})
bannerSlider.controller.control = smallSlider;
smallSlider.controller.control = bannerSlider;

let totalSlides = bannerSlider.slides.length - 2;

bannerSlider.on('slideChange', function(instance) {

    let currentCount = (instance.activeIndex - 1) % (totalSlides) + 1;
    $('.current').each(function (){
        if(instance.activeIndex+1 >= 1 && instance.activeIndex < 10){
            $(this).addClass('zero');
        } else {
            $(this).removeClass('zero')
        }
    })
});




