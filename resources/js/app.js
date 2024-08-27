import './bootstrap';
import '../css/app.css';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap-rtl/dist/css/bootstrap-rtl.min.css';

import './adminpanel/core';
// Import TinyMCE initialization
import 'tinymce/tinymce';
import 'tinymce/skins/ui/oxide/skin';
import 'tinymce/skins/content/default/content.css';
import 'tinymce/skins/content/default/content';
import 'tinymce/icons/default/icons';
import 'tinymce/themes/silver/theme';
import 'tinymce/models/dom/model';
import "tom-select";

// Initialize TinyMCE
import Dropzone from 'dropzone';


window.addEventListener('DOMContentLoaded', () => {
  tinymce.init({
    selector: '#postcontent',

    /* TinyMCE configuration options */
    skin: true,
    content_css: true,
    a11y_advanced_options: true
  });
});

const myDropzoneElement = document.getElementById('myDropzone');
if (myDropzoneElement) {
  const dropzone = new Dropzone('div#myDropzone', {
    url: '/upload',
    maxFiles: 1,
    acceptedFiles: '.jpg, .jpeg, .png, .webp',
    addRemoveLinks: true,
    clickable: true,
    autoProcessQueue: true,
    dictDefaultMessage: "تصویر مورد نظر را آپلود کنید",

    init: function () {
      this.on("sending", function (file, xhr, formData) {
        $("#access").on("change", function () {
          $.ajax({
            type: 'post',
            url: '/adminpanel/uploadfile/',
            data: {
              'file': file,
              '_token': $('input[name="_token"]').val()
            },
            success: function (data) {
              console.log("data");
            }
          });
        });
      });
      this.on("success", function (file, responseText) {
        console.log('great success');
      });
      this.on("addedfile", function (file) {
        console.log('file added');
      });

    }
  });
}

