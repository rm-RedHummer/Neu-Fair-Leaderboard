$(document).ready(function(){



  $(".save-btn").click(function(){
    var first = $("#first-select").children("option:selected").data('id');
    var second = $("#second-select").children("option:selected").data('id');
    var third = $("#third-select").children("option:selected").data('id');
    var event_id = $("#event-select").children("option:selected").data('id');

    var participants = new Array();
    $("input:checkbox[name=participant-checkbox]:checked").each(function() {
       participants.push($(this).data('id'));
    });


    for(outer = 0; outer<3; outer++){
      for(ctr = 0; ctr < participants.length; ctr++){
        if(participants[ctr] == first || participants[ctr] == second || participants[ctr] == third){
          participants.splice(ctr,1);
        }
      }
    }


    console.log(participants);

    $.ajax({
      type : "POST",
      url : base_url + "index.php/home/add-event-place",
      dataType: "json",
      data : {first:first,second:second,third:third,event_id:event_id,participants:participants},
      success: function(data){

        if(data.result == true) {
          console.log("Success");
          $('#success-alert').addClass('show');
          document.location.reload();
        }

      },
      error: function(err,op,th){
        console.log(th);
      }
    }); //end of ajax request

  });
});
