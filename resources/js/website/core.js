
import '../bootstrap';
import '../../css/website/core.css';
import 'font-awesome/css/font-awesome.min.css';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap-rtl/dist/css/bootstrap-rtl.min.css';
import $ from 'jquery';
import Swiper from 'swiper';
import 'swiper/swiper-bundle.css';
import { Pagination, Navigation, EffectFade } from "swiper/modules";

var headerslider = new Swiper(".headerslider", {
  slidesPerView: 1,
  spaceBetween: 20,
  modules: [  Pagination],
  loop: false,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
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
var productslider = new Swiper(".productslider", {
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





// add product to mini cart


if ($('form[name="addtocart"]').length) {
  // Attach a submit event handler to the form
  $('form[name="addtocart"]').on('submit', function(event) {
      var self=$(this);
      event.preventDefault(); // Prevent default form submission

      // Get the product ID from the hidden input
      var productId = $(this).find('input[name="product_id"]').val();

      // Optional: Do something with the product ID (like logging)
      console.log("Product ID to be added:", productId);

      // Submit the form using AJAX
      $.ajax({
          url: $(this).attr('action'), // Form action URL
          type: 'POST',
          data: {
            '_token': $('input[name="_token"]').val(), // Include CSRF token
              product_id: productId // Send product ID
          },
          success: function(response) {
            console.log(response.out );
             $('.cart-box .quanity').html(response.cart);
             $('.minicart').remove();
             $(".cart-box,.headerslider").append(response.out);
              self.addClass("added");
              // setTimeout(function(){
              //   self.find('button').html('افزودن به سبد خرید');
              //   self.removeClass("added");
              // }, 5000);
              $(self).find("button").html(" افزوده شد &#10003;")
          },
          error: function(xhr) {
              // Handle error response (e.g., show an error message)
              alert(xhr.responseJSON.error || 'An error occurred.');
          }
      });
  });
}

if ($('form.removefromcart').length) {
  // Attach a submit event handler to the form
  
  $(document).on('submit', 'form.removefromcart', function(event) {
    event.preventDefault();
      var self=$(this);
      // Get the product ID from the hidden input
      var productId = $(this).find('input[name="product_id"]').val();

      // Optional: Do something with the product ID (like logging)
      

      // Submit the form using AJAX
      $.ajax({
          url: $(this).attr('action'), // Form action URL
          type: 'POST',
          data: {
            '_token': $('input[name="_token"]').val(), // Include CSRF token
              product_id: productId // Send product ID
          },
          success: function(response) {
            console.log(response.out );
             $('.cart-box .quanity').html(response.cart);
             $('.minicart').remove();
             $(".cart-box,.headerslider").append(response.out);
              self.addClass("added");
              $(self).find("button").html(" افزوده شد &#10003;")
          },
          error: function(xhr) {
              // Handle error response (e.g., show an error message)
              alert(xhr.responseJSON.error || 'An error occurred.');
          }
      });
  });
}