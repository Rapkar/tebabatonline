import '../bootstrap';
import '../../css/website/core.css';
import 'font-awesome/css/font-awesome.min.css';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap-rtl/dist/css/bootstrap-rtl.min.css';
import $ from 'jquery';
import Swiper from 'swiper';
import 'swiper/swiper-bundle.css';
import { Pagination, Navigation, EffectFade } from "swiper/modules";
var headersliderd = document.querySelector('.headerslider');
if (headersliderd!=null && headersliderd ) {
  var headerslider = new Swiper(".headerslider", {
    slidesPerView: 1,
    spaceBetween: 20,
    modules: [Pagination],
    loop: false,
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },

  });
}
  var blogsliderd = document.querySelector('.blogslider');
  if (blogsliderd!=null && blogsliderd) { 
  var blogslider = new Swiper(".blogslider", {
    slidesPerView: 4,
    spaceBetween: 20,
    modules: [Navigation],

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
}

  var productsliders = document.querySelector('.productslider');
  if ( productsliders!=null && productsliders) { 
  var productslider = new Swiper(".productslider", {
    slidesPerView: 4,
    spaceBetween: 20,
    modules: [Navigation],

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

}



// add product to mini cart


if ($('form[name="addtocart"]').length) {
  // Attach a submit event handler to the form
  $('form[name="addtocart"]').on('submit', function (event) {
    var self = $(this);
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
      success: function (response) {
        console.log(response.out);
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
      error: function (xhr) {
        // Handle error response (e.g., show an error message)
        alert(xhr.responseJSON.error || 'An error occurred.');
      }
    });
  });
}


// Attach a submit event handler to the form

$(document).on('submit', 'form.removefromcart', function (event) {
  event.preventDefault();
  var self = $(this);
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
    success: function (response) {
      console.log(response.out);
      $('.cart-box .quanity').html(response.cart);
      $('.minicart').remove();
      $(".cart-box,.headerslider").append(response.out);
      self.addClass("added");
      $(self).find("button").html(" افزوده شد &#10003;")
    },
    error: function (xhr) {
      // Handle error response (e.g., show an error message)
      alert(xhr.responseJSON.error || 'An error occurred.');
    }
  });
});
if (document.getElementById('visitform')) {


  $(".play-button").on("click", function () {
    let id = $(this).attr("attr-c");
    let button = this;

    const audio = $("audio[attr-c='" + id + "']")[0];

    if (audio.paused) {
      audio.play();
      $(this).find("span").removeClass("play");
      $(this).find("span").addClass("pause");

      // Add an event listener for the 'ended' event
      audio.addEventListener('ended', function () {
        $(button).find("span").removeClass("pause");
        $(button).find("span").addClass("play");
      });
    } else {
      audio.pause();
      $(this).find("span").removeClass("pause");
      $(this).find("span").addClass("play");
    }
  });

  const formSteps = document.querySelectorAll('.step');

  // Store the current step in a variable
  let currentStep = 2;

  // Function to navigate to the next step
  function nextStep() {
    var phone_number = $("#phone_number").val();
    console.log(currentStep);
    if (phone_number.length > 10 && phone_number.length < 15) {

      if (event.key === 'Enter') {
        event.preventDefault();
      }
      console.log(currentStep, currentStep > 2);
      if (currentStep >= 2) {
        $('section[step="1"]').slideUp();
      }
      // Check if we've reached the last step
      if (currentStep == formSteps.length + 1) {
        $('section[step="1"]').slideUp();
        console.log('You have reached the last step!');
        return;
      }

      // Get the next step element
      const nextStepElement = formSteps[currentStep - 1];
      if (!nextStepElement) {
        console.error('Error: nextStepElement is undefined');
        return;
      }

      // Add a class to indicate that we're moving to the next step
      nextStepElement.classList.add('active');
      if (currentStep > 1) {
        const prevStepElement = formSteps[currentStep - 2];
        if (prevStepElement) {
          prevStepElement.classList.remove('active');
        }
      }

      // Update the current step number
      currentStep++;

      // Move focus to the first field in the next step
      const firstField = nextStepElement.querySelector('input, select, textarea');
      if (firstField) {
        firstField.focus();
      }

      // You can add any additional logic here, such as validating the current step before moving to the next one
    } else {
      alert("کاربر عزیز! لطفا شماره تلفن صحیحی را وارد فرمایید");
    }
  }

  function prevStep() {
    if (event.key === 'Enter') {
      event.preventDefault();
    }
    if (currentStep <= 2) {
      $("#field_21_110").slideDown();
    }
    // Check if we're not at the first step
    if (currentStep <= 1) {

      console.log('You are at the first step!');
      return;
    }

    // Decrement the current step number
    currentStep--;

    // Get the previous step element
    const prevStepElement = formSteps[currentStep - 1];
    if (!prevStepElement) {
      console.error('Error: prevStepElement is undefined');
      return;
    }

    // Remove the active class from the next step element and add it to the previous one
    prevStepElement.classList.add('active');
    if (currentStep < formSteps.length) {
      const nextStepElement = formSteps[currentStep];
      if (nextStepElement) {
        nextStepElement.classList.remove('active');
      }
    }
  }



  document.addEventListener('click', function (event) {
    if (event.target.classList.contains('next-button') && event.key != 'Enter') {
      event.preventDefault();
      // event.stopImmediatePropagation(); // <--- Add this line
      nextStep();
    } else if (event.target.classList.contains('prev-button') && event.key != 'Enter') {
      event.preventDefault();
      // event.stopImmediatePropagation(); // <--- Add this line
      prevStep();
    }
  });


}