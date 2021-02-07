let aboutSlider = new Swiper('.about-slider', {
    slidesPerView: 1,
    speed: 700,
    loop: true,
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
    },
});

let aboutSmallSlider = new Swiper('.about-small-slider', {
    slidesPerView: 1,
    speed: 700,
    loop: true,
})

aboutSlider.controller.control = aboutSmallSlider;
aboutSmallSlider.controller.control = aboutSlider;