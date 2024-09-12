
import '../bootstrap';
import '../../css/website/core.css';
import 'font-awesome/css/font-awesome.min.css';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap-rtl/dist/css/bootstrap-rtl.min.css';

import Swiper from 'swiper';
import 'swiper/swiper-bundle.css';
import { Pagination, Navigation, EffectFade } from "swiper/modules";

var headerslider = new Swiper(".headerslider", {
  slidesPerView: 1,
  spaceBetween: 20,
  modules: [EffectFade, Navigation, Pagination],
  loop: false,
  effect: "fade",
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});
var blogslider = new Swiper(".blogslider", {
  slidesPerView: 4,
  spaceBetween: 20,
  modules: [ Navigation],

  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  breakpoints: {
    // For small screens (e.g. mobile), show only 1 item
    0: {
      slidesPerView: 4,
    },
    // For medium screens (e.g. tablet), show 2 items
    768: {
      slidesPerView: 4,
    },
    // For large screens (e.g. desktop), show all 4 items
    1024: {
      slidesPerView: 4,
    },
  },
});