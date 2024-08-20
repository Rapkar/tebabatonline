import '../bootstrap';
import '../../css/website/core.css';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap-rtl/dist/css/bootstrap-rtl.min.css';
import Swiper from 'swiper'; 
import 'swiper/swiper-bundle.css';
var swipser = new Swiper(".mySwiper", {
    slidesPerView: 1,
    spaceBetween: 30,
    loop: true,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });