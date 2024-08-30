import $ from 'jquery';
import Sortable from 'sortablejs/modular/sortable.complete.esm.js';
import TomSelect from "tom-select";
import "tom-select/dist/css/tom-select.css";
import Dropzone from 'dropzone';
// Import TinyMCE initialization
import 'tinymce/tinymce';
import 'tinymce/skins/ui/oxide/skin';
import 'tinymce/skins/content/default/content.css';
import 'tinymce/skins/content/default/content';
import 'tinymce/icons/default/icons';
import 'tinymce/themes/silver/theme';
import 'tinymce/models/dom/model';
import 'tinymce/plugins/image';
import 'tinymce/plugins/link';
import 'tinymce/plugins/lists';
import 'tinymce/plugins/media';
import 'tinymce/plugins/quickbars';
import 'tinymce/plugins/autoresize';
import 'tinymce/plugins/table';
import 'tinymce/plugins/codesample';
import 'tinymce/plugins/preview';
import 'tinymce/plugins/emoticons';
import 'tinymce/plugins/directionality';
import 'tinymce/plugins/emoticons/js/emojiimages';



$("#access").on("change",function(){
    $.ajax({
      type: 'post',
      url: '/adminpanel/getusersbyrole/',
      data: { 
        'role': $(this).val(),
        '_token': $('input[name="_token"]').val()
       },
      success: function(data) {
        $("tbody").empty();
        $("tbody").html(data);
      }
  });
  });
  const mainContainer = document.getElementById('catlist');


if (mainContainer) {
  const sortableElements = mainContainer.querySelectorAll('.sortable');
Array.prototype.forEach.call(sortableElements, (element) => {
  Sortable.create(element, {
    group: 'nested',
    animation: 150,
    delay: 0,
    handle: '.sortable',
    nested: true, // enable nested sorting
    filter: '.ignore-elements',
    preventOnFilter: true,
    dragClass: 'sortable-drag',
  });
});
}
if (mainContainer ) {
mainContainer.querySelectorAll('.sortable').forEach((element) => {
  Sortable.create(element, {
    group: 'nested',
  animation: 150,
  delay: 0,
  handle: '.subcategory',
  nested: true, // enable nested sorting
  filter: '.ignore-elements',
  preventOnFilter: true,
  dragClass: 'sortable-drag',
  });
});
}


// document.addEventListener("DOMContentLoaded", function(event) {
// new TomSelect("#status",{
// 	maxItems: 3
// });

// });
// new TomSelect("#",{
// 	allowEmptyOption: true,
// 	create: true
// });
new TomSelect("#category",{
	maxItems: 3
});
new TomSelect("#status",{
	create: true,
	sortField: {
		field: "text",
		direction: "asc"
	}
});

const myDropzoneElement = document.getElementById('postimg');
if (myDropzoneElement) {
  const dropzone = new Dropzone('div#postimg', {
    url: '/adminpanel/upload/',
    maxFiles: 1,
    acceptedFiles: '.jpg, .jpeg, .png, .webp',
    addRemoveLinks: true,
    clickable: true,
    autoProcessQueue: true,
    dictDefaultMessage: "تصویر مورد نظر را آپلود کنید",
    headers: {
      'X-CSRF-Token':  $('input[name="_token"]').val() // Function to retrieve CSRF token
    },
    init: function () {
      this.on("sending", function (file, xhr, formData) {

      });
      this.on("success", function (file, responseText) {
        
      });
      this.on("addedfile", function (file) {
       
      });

    }
  });
}




// // Initialize TinyMCE

window.addEventListener('DOMContentLoaded', () => {
  tinymce.init({
    selector: '#postcontent',
    plugins: [
      'link', 'autoresize', 'codesample', 'lists', 'media', 'directionality', 'table', 'image', 'quickbars', 'preview', 'emoticons'
    ],

    toolbar: [
      "undo redo | styles | fontsize | forecolor hilitecolor | bold italic underline strikethrough | align | directionality",
      "link image bullist numlist | emoticons | preview"
    ],
    
    automatic_uploads: true,
    images_upload_url: '/adminpanel/upload/', // Adjust this URL as needed
    file_picker_types: 'image',
    image_title: true,
    visualblocks_default_state: true,

  file_picker_callback: function (callback, value, meta) {
   // Create an input element to allow file selection
   var input = document.createElement('input');
   input.setAttribute('type', 'file');
   input.setAttribute('accept', 'image/*');

   // Trigger the file selection dialog
   input.onchange = function () {
     var file = this.files[0];
     if (file) {
       var formData = new FormData();
       formData.append('image', file); // Append the selected file
       formData.append('_token',$('input[name="_token"]').val()); // Append CSRF token

       // Perform the AJAX request to upload the image
       fetch('/adminpanel/upload/', {
         method: 'POST',
         body: formData,
       })
       .then(response => response.json())
       .then(data => {
         if (data.success) {
           // Use the URL returned from the server
           callback(data.location, { title: file.name });
         } else {
           console.error('Upload failed:', data.message);
         }
       })
       .catch(error => {
         console.error('Error uploading image:', error);
       });
     }
   };

   input.click(); // Open the file picker dialog
 },
 images_upload_handler: function (blobInfo, success, failure) {
  var xhr, formData;
  xhr = new XMLHttpRequest();
  xhr.withCredentials = false;
  xhr.open('POST', '/adminpanel/upload/');
  var token = $('input[name="_token"]').val();
  xhr.setRequestHeader("X-CSRF-Token", token);
  xhr.onload = function() {
      var json;
      if (xhr.status != 200) {
          failure('HTTP Error: ' + xhr.status);
          return;
      }
      json = JSON.parse(xhr.responseText);

      if (!json || typeof json.location != 'string') {
          failure('Invalid JSON: ' + xhr.responseText);
          return;
      }
      success(json.location);
  };
  formData = new FormData();
  formData.append('file', blobInfo.blob(), blobInfo.filename());
  xhr.send(formData);
}

  });
});
