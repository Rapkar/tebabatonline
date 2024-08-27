import $ from 'jquery';
import Sortable from 'sortablejs/modular/sortable.complete.esm.js';
import TomSelect from "tom-select";
import "tom-select/dist/css/tom-select.css";
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