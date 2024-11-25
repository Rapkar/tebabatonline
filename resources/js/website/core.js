import '../bootstrap';
import Echo from 'laravel-echo';
import Pusher from 'pusher-js';
import '../../css/website/core.css';
import 'font-awesome/css/font-awesome.min.css';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap-rtl/dist/css/bootstrap-rtl.min.css';
import $ from 'jquery';
import Swiper from 'swiper';
import Dropzone from 'dropzone';
import 'swiper/swiper-bundle.css';
import { Pagination, Navigation, EffectFade } from "swiper/modules";
var headersliderd = document.querySelector('.headerslider');
if (headersliderd != null && headersliderd) {
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
if (blogsliderd != null && blogsliderd) {
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
var commetsslider = document.querySelector('.commetsslider');
if (commetsslider != null && commetsslider) {
  var blogslider = new Swiper(".commetsslider", {
    slidesPerView: 3,
    spaceBetween: 20,
    modules: [Navigation],

    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    breakpoints: {
      // For small screens (e.g. mobile), show only 1 item
      0: {
        slidesPerView: 3,
      },
      // For medium screens (e.g. tablet), show 2 items
      768: {
        slidesPerView: 3,
      },
      // For large screens (e.g. desktop), show all 4 items
      1024: {
        slidesPerView: 3,
      },
    },
  });
}

var productsliders = document.querySelector('.swiper.productslider');
console.log(typeof(productsliders),productsliders);
if (productsliders != null && productsliders) {
  var productslider = new Swiper(".swiper.productslider", {
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
        console.log(response);
        $('.cart-box .quanity').html(response.cart);
        $('.minicart').remove();
        $(".cart-box,.headerslider").append(response.out);
        self.addClass("added");
        setTimeout(function(){
          self.find('button').html('افزودن به سبد خرید');
          self.removeClass("added");
        }, 5000);
        // $(self).find("button").html(" افزوده شد &#10003;")
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
  var cart_id = $(this).find('input[name="cart_id"]').val();

  // Optional: Do something with the product ID (like logging)


  // Submit the form using AJAX
  $.ajax({
    url: $(this).attr('action'), // Form action URL
    type: 'POST',
    data: {
      '_token': $('input[name="_token"]').val(), // Include CSRF token
      product_id: productId ,// Send product ID
      cart_id: productId // Send product ID
    },
    success: function (response) {
      console.log(response.out);
      $('.cart-box .quanity').html(response.cart);
      $('.minicart').remove();
      $(".cart-box,.headerslider").append(response.out);
      self.removeClass("added");
      // $(self).find("button").html(" افزوده شد &#10003;")
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
const myDropzoneElement = document.getElementById('uservisitimg');
if (myDropzoneElement) {
  const myDropzoneElements = new Dropzone('div#uservisitimg', {
    url: '/adminpanel/upload/',
    maxFiles: 1,
    acceptedFiles: '.jpg, .jpeg, .png, .webp',
    addRemoveLinks: true,
    clickable: true,
    autoProcessQueue: true,
    dictDefaultMessage: "تصویر مورد نظر را آپلود کنید",
    headers: {
      'X-CSRF-Token': $('input[name="_token"]').val() // Function to retrieve CSRF token
    },
    init: function () {
      this.on("sending", function (file, xhr, formData) {

      });
      this.on("success", function (file, responseText) {
        $("#image").val(responseText.location)
      });
      this.on("addedfile", function (file) {


      });

    }
  });
}


// Enable pusher logging - don't include this in production
// Pusher.logToConsole = true;

// var pusher = new Pusher('723614bfcaeb1ebf3619', {
//   cluster: 'ap2'
// });

// var channel = pusher.subscribe('chat');
// channel.bind('my-event', function(data) {
//   console.log(JSON.stringify(data));
// });




window.Pusher = Pusher;

// window.Echo = new Echo({
//     broadcaster: 'reverb',
//     key: import.meta.env.VITE_REVERB_APP_KEY,
//     wsHost: import.meta.env.VITE_REVERB_HOST,
//     wsPort: import.meta.env.VITE_REVERB_PORT ?? 8080,
//     wssPort: import.meta.env.VITE_REVERB_PORT ?? 443,
//     forceTLS: (import.meta.env.VITE_REVERB_SCHEME ?? 'https') === 'https',
//     enabledTransports: ['ws', 'wss'],
// });

// window.Echo = new Echo({
//   broadcaster: 'pusher',
//   key: '723614bfcaeb1ebf3619',
//   cluster: 'ap2',
//   forceTLS: true
// });
// const userId = 2;
// var channel = window.Echo.channel(`private-chat.${userId}`);
// channel.listen('.my-event', function (data) {
//   $("#messages").append(`<div>${data.message}</div>`); 

// });


// window.Echo.private(`private-chat.${userId}`)
//     .listen('MessageSent', (e) => {
//         console.log(`New message from ${e.message.sender_id}: ${e.message.text}`);
//         $("#messages").append(`<div>${e.message.text}</div>`);

//         // Update your chat UI here with the new message
//     });

Pusher.logToConsole = true;
// const userId = parseInt($('select[name="users"]').val());
const userId = document.querySelector('meta[name="user-id"]').getAttribute('content');
// var pusher = new Pusher('723614bfcaeb1ebf3619', {
//   cluster: 'ap2'
// });
var pusher = new Pusher("723614bfcaeb1ebf3619", {
  cluster: 'ap2',
  channelAuthorization: {
    endpoint: "/pusher_auth.php",
    headers: { "X-CSRF-Token": "" + $('input[name="_token"]').val() + "" },
  },
});
// Replace this with the actual user ID dynamically
var channel = pusher.subscribe('chat' + userId);
channel.bind('message.sent', function (data) {
  var classes = 'ref';
  if (data.sender_id == userId) {
    classes = 'self';
  }
  $("#messages").append(`<div class="` + classes + `">${data.text}</div>`);
});
// var channel = pusher.subscribe('channel_for_everyone');
// // var channel = pusher.subscribe('channel_for_everyone');
// channel.bind('message.sent', function (data) {
//   alert(JSON.stringify(data));
//   console.log('sss')
//   // if(userId==text.sender)
//   var classes = 'ref';
//   if (data.sender_id == userId) {
//     classes = 'self';
//   }
//   $("#messages").append(`<div class="` + classes + `">${data.text}</div>`);
// });

$('#chat-form').on('submit', function (e) {
  e.preventDefault();
  const message = $('#messageInput').val(); // Ensure this matches your input ID

  // Send AJAX POST request with CSRF token
  $.ajax({
    url: '/send-message',
    type: 'POST',
    data: {
      receiver_id: $('select[name="users"]').val(),
      message: message,
      '_token': $('input[name="_token"]').val(),// Include CSRF token
    },
    success: function (response) {
      // $("#messages").append(`<div>${response.text}</div>`);
      var classes = 'ref';
      if (response.sender_id == userId) {
        classes = 'self';
      }
      $("#messages").append(`<div class="` + classes + `">${response.text}</div>`);
      $('#messageInput').val(''); // Clear input field on success
    },
    error: function (xhr) {
      console.error('Error:', xhr.responseText); // Handle error response
    }
  });
});

$(".chat-icon").on("click", function () {
  $("#chat-form").slideDown();
})
$('.close').on("click", function () {
  $("#chat-form").slideUp();
})

$('.visitform input[type="checkbox"]').on('change', function () {

  var nothing = $(this).parent().closest('.radiobox').find('.nothing').is(':checked');
  if (this.checked && !nothing) {
    $(this).parent().closest('label').removeClass('active');
    $(this).parent().addClass('active');
  } else if (this.checked && $(this).hasClass('nothing')) {
    $(this).parent().closest('.radiobox').find('input').prop('checked', false);
    $(this).parent().closest('.radiobox').find('label').removeClass('active');
    $(this).parent().addClass('active');
    $(this).prop('checked', true);
  } else {
    $(this).parent().closest('label').removeClass('active');
    $(this).prop('checked', false);
  }
});

$('.visitform input[type="radio"]').on('change', function () {
  if (this.checked) {
    $(this).parent().closest('.radiobox').find('.radio').removeClass('active');
    $(this).parent().closest('label').addClass('active');
  } else {
    $(this).parent().closest('.radiobox').find('.radio').removeClass('active');

  }
});
$(".play-button").on("click", function (e) {
  e.preventDefault();
  let id = jQuery(this).attr("attr-c");
  let button = this;

  const audio = jQuery("audio[attr-c='" + id + "']")[0];

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
$("select[name='states']").on('change', function () {
  var state_id = $(this).val();
  $.ajax({
    url: '/getCityByState',
    type: 'POST',
    data: {
      state_id: state_id,
      '_token': $('input[name="_token"]').val(),// Include CSRF token
    },
    success: function (response) {
      var elements = '';
      response.forEach(element => {
        elements += "<option value'" + element.id + "'>" + element.name + "</option>";
      });
      $('select[name="cities"]').html(elements);
    },
    error: function (xhr) {
      alert('خطایی وجود دارد لطفا بعدا امتجان کنید');
    }
  });
});

// product qunity
// product quantity
$("input.count").on("change", function() {
  var product_id = $(this).attr('attr-id'); // Assuming you have a data attribute for product_id
  var val = $(this).val();
  console.log("ss");
  $.ajax({
      url: '/update-quantity',
      type: 'POST',
      data: {
        product_id: product_id,
        quantity: val,
          '_token': $('meta[name="csrf-token"]').attr('content'), // Include CSRF token
      },
      success: function(response) {
          if (response.success) {
              alert(response.message);
              // Update the quantity display if needed
              $(this).val(response.new_quantity);
          } else {
              alert('Error updating quantity');
          }
      },
      error: function(xhr) {
          alert('An error occurred. Please try again later.');
      }
  });
});
