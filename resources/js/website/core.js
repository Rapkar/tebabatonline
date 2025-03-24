import '../bootstrap';

// import Echo from 'laravel-echo';
// import { io } from "socket.io-client";
// import Pusher from 'pusher-js';
import '../../css/website/core.css';
import 'font-awesome/css/font-awesome.min.css';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap-rtl/dist/css/bootstrap-rtl.min.css';
import 'bootstrap/dist/css/bootstrap-utilities.css';
import 'bootstrap/dist/css/bootstrap-utilities.rtl.css';
import $ from 'jquery';
import * as bootstrap from 'bootstrap';
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
  $(document).on('submit', 'form[name="addtocart"]', function (event) {
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

        $('.cart-box .quanity').html(response.cart);
        $('.minicart').remove();
        $(".cart-box,.headerslider").append(response.out);
        self.addClass("added");
        setTimeout(function () {
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
      product_id: productId,// Send product ID
      cart_id: productId // Send product ID
    },
    success: function (response) {

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


$("#min-price").on("change", function () {
  $(".min-price").html($(this).val() + " هزار تومان");
});
$("#max-price").on("change", function () {
  $(".max-price").html($(this).val() + " هزار تومان");
});
$("form#productfilter").on("submit", function (e) {
  let minprice = $("#min-price").val();
  let maxprice = $("#max-price").val();
  let existproduct = $("#existproduct").val();
  e.preventDefault();
  $.ajax({
    url: '/getproductbyprice',
    type: 'POST',
    data: {
      existproduct: existproduct,
      minprice: minprice,
      maxprice: maxprice,
      '_token': $('meta[name="csrf-token"]').attr('content'), // Include CSRF token
    },
    success: function (response) {
      $(".productslider .row").empty();
      $(".productslider .row").html(response.data);
    },
    error: function (xhr) {
      alert('An error occurred. Please try again later.');
    }
  });
})
// product qunity
// product quantity
$("input.count").on("change", function () {
  var product_id = $(this).attr('attr-id'); // Assuming you have a data attribute for product_id
  var visit_id = $(this).attr('attr-visit'); // Assuming you have a data attribute for product_id
  var val = $(this).val();
  var cart_id = $('input[name="cart_id"]').val();
  var section = $(this).attr("attr-sec");

  $.ajax({
    url: '/update-quantity',
    type: 'POST',
    data: {
      product_id: product_id,
      visit_id: visit_id,
      section: section,
      cart_id: cart_id,
      quantity: val,
      '_token': $('meta[name="csrf-token"]').attr('content'), // Include CSRF token
    },
    success: function (response) {
      if (response.success) {
        alert(response.message);
        // Update the quantity display if needed
        $(this).val(response.new_quantity);
        console.log(response.new_quantity);
      } else {
        alert('Error updating quantity');
      }
    },
    error: function (xhr) {
      alert('An error occurred. Please try again later.');
    }
  });
});



// document.addEventListener('DOMContentLoaded', function () {
//   console.log("Attempting to listen to notifications channel...");

//   window.Echo.channel('notifications')
//       .listen('NotificationSent', (e) => {
//           console.log("Received notification:", e.message);
//           alert(e.message);
//       });
//       const userId = window.User.id;
//       window.Echo.channel('admin-stream.'+userId)
//       .listen('AdminStream', (e) => {
//           console.log("Received notification:", e.message);
//           alert(e.message);
//       });

//   console.log("Listening for notifications...");
// });

$('#chat-form').on('submit', function (e) {
  e.preventDefault();
  // const message = $('#messageInput').val(); // Ensure this matches your input ID
  const message = 'adssads'; // Ensure this matches your input ID

  // Send AJAX POST request with CSRF token
  $.ajax({
    xhrFields: {
      withCredentials: true  // Send session cookies
    },
    url: '/send-message',
    type: 'POST',
    data: {
      'receiver_id': $('select[name="users"]').val(),
      'message': message,
      '_token': $('input[name="_token"]').val(),// Include CSRF token
    },
    success: function (response) {
      // $("#messages").append(`<div>${response.text}</div>`);
      var classes = 'ref';
      if (response.sender_id == 1) {
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

document.addEventListener('DOMContentLoaded', function () {
  // console.log("Attempting to listen to channels...");

  // تنظیمات Laravel Echo
  const userId = 1; // شناسه کاربر (فرض می‌کنیم این مقدار از backend به frontend منتقل شده است)
  const otherUserId = 4; // شناسه کاربر دیگر (برای کانال private-chat)

  // // گوش دادن به کانال عمومی notifications
  // window.Echo.channel('notifications')
  //   .listen('NotificationSent', (e) => {
  //     // console.log("Received notification:", e.message);
  //     alert(`Notification: ${e.message}`);
  //   })
  //   .error((error) => {
  //     console.error("Error listening to notifications channel:", error);
  //   });

  //  console.log(`private.private-chat.${userId}.${otherUserId}`);
  const channelName = `chat.${userId}.${otherUserId}`;
  const channelName2 = `PrivateChat`;
  const channelName3 = `chat4`;

  // window.Echo.private(channelName2)
  //     .listen('PrivateChatMessage', (e) => { // Notice the dot prefix
  //         console.log("Received:", e.message);
  //         alert(`Notification: ${e.message}`);
  //     })
  //     .error((error) => {
  //         console.error("Channel error:", error);
  //     });



  // window.Echo.private('PrivateChat.' + userId)
  // .listen('PrivateChatMessage', (e) => {
  //     console.log("Received:", e.message);
  //     alert(`Notification: ${e.message}`);
  // })
  // .error((error) => {
  //     console.error("Channel error:", error);
  // });

  // window.Echo.channel('PrivateChat.' + userId)
  //   .listen('PrivateChatMessage', (e) => {
  //     // console.log("Received notification:", e.message);
  //     alert(`Notification: ${e.message}`);
  //   })
  //   .error((error) => {
  //     console.error("Error lزمistening to notifications channel:", error);
  //   });


  // window.Echo.private(`PrivateChat.${userId}`)
  //   .listen('PrivateChatMessage', (e) => {
  //     console.log(e.message);
  //     // Handle the received message
  //   });

    
  // console.log("Listening for notifications, admin messages, and private chat messages...");
});

var receiverId=1;
Echo.private(`messages.${receiverId}`)
   .listen('MessageSent', (event) => {
    alert("s");
       console.log(event.message);
   });