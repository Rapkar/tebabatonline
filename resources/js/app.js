import './bootstrap';
import '../css/app.css';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap-rtl/dist/css/bootstrap-rtl.min.css';

// Import TinyMCE initialization
import 'tinymce/tinymce';
import 'tinymce/skins/ui/oxide/skin';
import 'tinymce/skins/content/default/content.css';
import 'tinymce/skins/content/default/content';
import 'tinymce/icons/default/icons';
import 'tinymce/themes/silver/theme';
import 'tinymce/models/dom/model';
// Initialize TinyMCE
import Dropzone from 'dropzone';
window.addEventListener('DOMContentLoaded', () => {
    tinymce.init({
        selector: '#postcontent',

        /* TinyMCE configuration options */
        skin: true,
        content_css: false
    });
});
const myDropzoneElement = document.getElementById('myDropzone');
if (myDropzoneElement) {
  const dropzone = new Dropzone('div#myDropzone', {
    url: '/upload',
    maxFiles: 1,
    acceptedFiles: '.jpg, .jpeg, .png',
    addRemoveLinks: true,
    clickable: true,
    autoProcessQueue: true,
    dictDefaultMessage: "تصویر مورد نظر را آپلود کنید"  ,
    init: function() {
        this.on("sending", function(file, xhr, formData) {
          console.log("sending file");
        });
        this.on("success", function(file, responseText) {
          console.log('great success');
        });
        this.on("addedfile", function(file){
              console.log('file added');
          });
      }
  });
}