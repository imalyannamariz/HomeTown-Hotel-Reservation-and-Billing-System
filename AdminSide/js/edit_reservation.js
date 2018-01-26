$(document).ready(function(){
  $('form#deletereservation').on('submit', function(e){
    e.preventDefault();
    var prompt = confirm("Are you sure?")
    if(prompt){
      $.ajax({
        type:'POST',
        url:$('form#formEditRoom').attr('aria-delete'),
        data: $(this).serialize(),
        success: function(html){
          alert('Reservation has been deleted')
          location.reload()
        }
      })
    }
  })
  $('a.edit').on('click',function(){
    var checkin = $(this).parent().closest('tr').find('#checkin').html()
    var checkout = $(this).closest('tr').find('#checkout').html()
    var reservationno = $(this).closest('tr').find('#reservation-id').html()
    var roomno = $(this).closest('tr').find('#room-number').html()
    $('input[name=checkin]').val(checkin)
    $('input[name=checkout').val(checkout)
    $('input[name=roomquantity').val(roomno)
    $('input[name=reservationno]').val(reservationno)
  })
  $('#checkInDate, #checkOutDate, #roomtype').on('change',function(){
    $.ajax({
      type:'POST',
      url:$('form#formEditRoom').attr('aria-location'),
      data:{
        checkInDate: $('#checkInDate').val(),
        checkOutDate: $('#checkOutDate').val(),
        room_id: $('option.get:selected').val(),
        reservation_id: $('input[name=reservationno]').val(),
      },
      success:function(html){
        var availablerooms = parseInt(html)
        $('#roomquantity').empty()
        for(var x = 1; x<=availablerooms; x++){
          $('#roomquantity').append(`<option value = ${x}>${x}</option>`)
        }
      },
      error:function(){
        alert('asdasd')
      }
    })
  })
  $('form#formEditRoom').on('submit', function(e){
    e.preventDefault();
    $.ajax({
      type:'POST',
      url:$('form#formEditRoom').attr('action'),
      data: $(this).serialize(),
      success: function(html){
        alert("Success")
        location.reload()
      }
    })

  })
  $("#checkInDate").datetimepicker({
    timepicker: false,
    format: "Y-m-d",
    onShow:function(ct){
      this.setOptions({
        minDate: $('#checkInDate').val()
      })
    }
  })

  $("#checkOutDate").datetimepicker({
    timepicker: false,
    format: "Y-m-d",
    onShow:function( ct ){
     this.setOptions({
      minDate:`+$('#checkInDate').val()`?$('#checkInDate').val():false
    })
   }
 })
})