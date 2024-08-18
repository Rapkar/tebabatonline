import $ from 'jquery';
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
  })