var swiper = new Swiper(".home-slider", {
  effect: "coverflow",
  grabCursor: true,
  centeredSlides: true,
  slidesPerView: "auto",
  coverflowEffect: {
    rotate: 0,
    stretch: 0,
    depth: 100,
    modifier: 2,
    slideShadows: true,
  },
  loop: true,
  autoplay: {
    delay: 1000,
    disableOnInteraction: false,
  },
});

// var swiper = new Swiper(".review-slider", {
//   effect: "coverflow",
//   grabCursor: true,
//   centeredSlides: true,
//   slidesPerView: "auto",
//   coverflowEffect: {
//     rotate: 0,
//     stretch: 0,
//     depth: 100,
//     modifier: 2,
//     slideShadows: true,
//   },
//   loop: true,
//   autoplay: {
//     delay: 1000,
//     disableOnInteraction: false,
//   },
// });

var swiper = new Swiper(".review-slider", {
  slidesPerView: 5,
  spaceBetween: 30,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  loop: true,
  autoplay: {
    delay: 1000,
    disableOnInteraction: false,
  },
});
