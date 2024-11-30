import '../bootstrap';
import '../../css/app.css';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap-rtl/dist/css/bootstrap-rtl.min.css';
import 'bootstrap/dist/css/bootstrap-utilities.css';
import 'bootstrap/dist/css/bootstrap-utilities.rtl.css';
import $ from 'jquery';
import * as bootstrap from 'bootstrap';
import Sortable from 'sortablejs/modular/sortable.complete.esm.js';
import TomSelect from "tom-select";
import "tom-select/dist/css/tom-select.css";
import Dropzone from 'dropzone';
// Import TinyMCE initialization
import 'tinymce/tinymce';

import 'tinymce/skins/content/default/content';
import 'tinymce/icons/default/icons';
import 'tinymce/skins/ui/oxide/skin';
// import 'tinymce/skins/ui/oxide';
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
 
document.addEventListener('DOMContentLoaded', function() {
  var myModal = document.getElementById('exampleModal');
  var modal = new bootstrap.Modal(myModal, {
    keyboard: false
  });
});

$("#access").on("change", function () {
  $.ajax({
    type: 'post',
    url: '/adminpanel/getusersbyrole/',
    data: {
      'role': $(this).val(),
      '_token': $('input[name="_token"]').val()
    },
    success: function (data) {
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
if (mainContainer) {
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

if (document.getElementById('category')) {
new TomSelect("#category", {
  maxItems: 3
});
}
if (document.getElementById('status')) {
new TomSelect("#status", {
  create: true,
  sortField: {
    field: "text",
    direction: "asc"
  }
});
}

const myDropzoneElement = document.getElementById('postimg');
if (myDropzoneElement) {
  const myDropzoneElements = new Dropzone('div#postimg', {
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
let images=[];
document.addEventListener('DOMContentLoaded', function() {
  const mulltiimg = document.getElementsByClassName('postimg');
  if (mulltiimg.length > 0) {
  const mulltiimgs = new Dropzone('div.postimg', {
    url: '/adminpanel/upload/',
    maxFiles: 5,
    acceptedFiles: '.jpg, .jpeg, .png, .webp',
    addRemoveLinks: true,
    clickable: true,
    autoProcessQueue: true,
    dictDefaultMessage: "تصاویر مورد نظر را آپلود کنید",
    headers: {
      'X-CSRF-Token': $('input[name="_token"]').val() // Function to retrieve CSRF token
    },
    init: function () {
      this.on("sending", function (file, xhr, formData) {

      });
      this.on("success", function (file, responseText) {
        images.push(responseText.location);
        $("#gallery").val(images)
      });
      console.log( $("#gallery").val());
      this.on("addedfile", function (file) {
     
      

      });

    }
  });
}

})
// // Initialize TinyMCE
const useDarkMode = window.matchMedia('(prefers-color-scheme: dark)').matches;
if (document.getElementById('status')) {
window.addEventListener('DOMContentLoaded', () => {
  tinymce.init({
    selector: '#postcontent',

    autosave_ask_before_unload: true,
    autosave_interval: '30s',
    autosave_prefix: '{path}{query}-{id}-',
    autosave_restore_when_empty: false,
    autosave_retention: '2m',
    skin: useDarkMode ? 'oxide-dark' : 'oxide',
    content_css: useDarkMode ? 'dark' : 'default',
    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }',
    height: 600,
    plugins: [
      'link', 'autoresize', 'codesample', 'lists', 'media', 'directionality', 'table', 'image', 'quickbars', 'preview', 'emoticons'
    ],

    toolbar: [
      "undo redo | styles | fontsize | forecolor hilitecolor | bold italic underline strikethrough | align | directionality",
      "link image bullist numlist | emoticons | preview"
    ],

    automatic_uploads: true,
    images_upload_url: '/adminpanel/upload/', // Adjust this URL as needed
     images_upload_base_path: '/storage/public/images/',
    file_picker_types: 'image',
    image_title: true,
    visualblocks_default_state: true,

    file_picker_callback: function (callback, value, meta) {
      if (meta.filetype == 'image') {
        var input = document.createElement('input');
        input.setAttribute('type', 'file');
        input.setAttribute('accept', 'image/*');
        input.onchange = function () {
          var file = this.files[0];
          var reader = new FileReader();
          reader.onload = function () {
            var id = 'blobid' + (new Date()).getTime();
            var blobCache = tinymce.activeEditor.editorUpload.blobCache;
            var base64 = reader.result.split(',')[1];
            var blobInfo = blobCache.create(id, file, base64);
            blobCache.add(blobInfo);
            console.log(file);
            callback(blobInfo.blobUri(), { title: file.name });
          };
          reader.readAsDataURL(file);
        };
        input.click();
      }},
    images_upload_handler: function (blobInfo, success, failure) {
     
      var xhr, formData;
      xhr = new XMLHttpRequest();
      xhr.withCredentials = false;
      xhr.open('POST', '/adminpanel/upload/');
      var token = $('input[name="_token"]').val();
      xhr.setRequestHeader("X-CSRF-Token", token);
      xhr.onload = function () {
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
       console.log(blobInfo)
      xhr.send(formData);
    },
    

  });
});
}
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
      console.log(xhr)
      alert('خطایی وجود دارد لطفا بعدا امتجان کنید' );
    }
  });
});