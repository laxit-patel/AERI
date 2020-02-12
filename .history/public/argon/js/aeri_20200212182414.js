console.log("custom aeri.js initiated");

//logic for custom ajax select menu for inward test
$("#inward_test_datalist").on('change', function () {
    var val = this.value;
    
    var url = '/getTest/'+val;
    
    if($('#inward_test_datalist option').filter(function(){
        return this.value.toUpperCase() === val.toUpperCase();        
    }).length) {
        //sending ajax request to retrieve related materials
        $.ajax({
            type:'GET',
            url:'/getTest/'+val,
            data:val,
            success:function(data) {
                
               $("#inward_material_dropdown").html("<option value='"+ data.material_id+"'>"+ data.material_name +"</option>");
            }
         });
    }
});




//login for test prgress phases
$('.progress-btn').append("<i class='fas fa-exclamation-circle text-white'></i>");

var progress_bar = 0;
$('.progress-meter').text(progress_bar + '%');
$('.submit-test').addClass('disabled');

if(typeof document.getElementById("phase_one") !== 'undefined' && document.getElementById("phase_one") !== null) {
    var phase_one = document.getElementById("phase_one").getAttribute('data-status');
  }
  if(typeof document.getElementById("phase_two") !== 'undefined' && document.getElementById("phase_two") !== null) {
    var phase_two = document.getElementById("phase_two").getAttribute('data-status');
  }
  if(typeof document.getElementById("phase_three") !== 'undefined' && document.getElementById("phase_three") !== null) {
    var phase_three = document.getElementById("phase_three").getAttribute('data-status');
  }
  if(typeof document.getElementById("phase_four") !== 'undefined' && document.getElementById("phase_four") !== null) {
    var phase_four = document.getElementById("phase_four").getAttribute('data-status');
  }





if(phase_one == 0 && phase_two == 0 && phase_three == 0 && phase_four == 0)
{
    $('#phase_one').append("<i class='fas fa-exclamation-circle text-white'></i>");
    $('#phase_two').append("<i class='fas fa-exclamation-circle text-white'></i>");
    $('#phase_two').addClass('disabled');
    $('#phase_three').append("<i class='fas fa-exclamation-circle text-white'></i>");
    $('#phase_three').addClass('disabled');
    $('#phase_four').append("<i class='fas fa-exclamation-circle text-white'></i>");
    $('#phase_four').addClass('disabled');
    $('.progress-meter').text('0%');
    $('#progress-bar').css('width','0%');
}
else if(phase_one == 1 && phase_two == 0 && phase_three == 0 && phase_four == 0)
{
    $('#phase_one').append("<i class='fas fa-check text-white'></i>");
    $('#phase_one').removeClass('bg-danger');
    $('#phase_one').addClass('bg-success disabled');
    $('#phase_two').append("<i class='fas fa-exclamation-circle text-white'></i>");
    $('#phase_three').append("<i class='fas fa-exclamation-circle text-white'></i>");
    $('#phase_three').addClass('disabled');
    $('#phase_four').append("<i class='fas fa-exclamation-circle text-white'></i>");
    $('#phase_four').addClass('disabled');
    $('.progress-meter').text('25%');
    $('#progress-bar').css('width','25%');
}
else if(phase_one == 1 && phase_two == 1 && phase_three == 0 && phase_four == 0)
{
    $('#phase_one').append("<i class='fas fa-check text-white'></i>");
    $('#phase_one').removeClass('bg-danger');
    $('#phase_one').addClass('bg-success disabled');
    $('#phase_two').append("<i class='fas fa-check text-white'></i>");
    $('#phase_two').removeClass('bg-danger');
    $('#phase_two').addClass('bg-success disabled');
    $('#phase_three').append("<i class='fas fa-exclamation-circle text-white'></i>");
    $('#phase_three').removeClass('disabled');
    $('#phase_four').append("<i class='fas fa-exclamation-circle text-white'></i>");
    $('#phase_four').addClass('disabled');  
    $('.progress-meter').text('50%');
    $('#progress-bar').css('width','50%');
}
else if(phase_one == 1 && phase_two == 1 && phase_three == 1 && phase_four == 0)
{
    $('#phase_one').append("<i class='fas fa-check text-white'></i>");
    $('#phase_one').removeClass('bg-danger');
    $('#phase_one').addClass('bg-success disabled');
    $('#phase_two').append("<i class='fas fa-check text-white'></i>");
    $('#phase_two').removeClass('bg-danger');
    $('#phase_two').addClass('bg-success disabled');
    $('#phase_three').append("<i class='fas fa-check text-white'></i>");
    $('#phase_three').removeClass('bg-danger');
    $('#phase_three').addClass('bg-success disabled');
    $('#phase_four').append("<i class='fas fa-exclamation-circle text-white'></i>");
    $('#phase_four').removeClass('disabled'); 
    $('.progress-meter').text('75%');
    $('#progress-bar').css('width','75%');
}
else if(phase_one == 1 && phase_two == 1 && phase_three == 1 && phase_four == 1)
{
    $('#phase_one').append("<i class='fas fa-check text-white'></i>");
    $('#phase_one').removeClass('bg-danger');
    $('#phase_one').addClass('bg-success disabled');
    $('#phase_two').append("<i class='fas fa-check text-white'></i>");
    $('#phase_two').removeClass('bg-danger');
    $('#phase_two').addClass('bg-success disabled');
    $('#phase_three').append("<i class='fas fa-check text-white'></i>");
    $('#phase_three').removeClass('bg-danger');
    $('#phase_three').addClass('bg-success disabled');
    $('#phase_four').append("<i class='fas fa-check text-white'></i>");
    $('#phase_four').removeClass('bg-danger');
    $('#phase_four').addClass('bg-success disabled'); 
    $('.progress-meter').text('100%');
    $('#progress-bar').css('width','100%');
    $('.submit-test').removeClass('disabled');
}

function progress(button)
{
    
    var inward_id = document.getElementById('inward_id').value
    var phase = button.getAttribute('data-phase');
    var status = button.getAttribute('data-status');
    $.ajax({
        type:'GET',
        url:'/updateInwardPhase',
        data:{
            'inward_id':inward_id,
            'phase':phase,
            'status':status
        },
        success:function(data) {
            alert('fired');
            if(data == 1)
            {
                location.reload();
            }
        }
    });
}

//logic to load test details in table  on addinwardtest

$('#select_inward_filltable').on('change', function () {
    var inward = this.value;
    $.ajax({
        type:'GET',
        url:'/getTestForInward/',
        data:inward,
        success:function(data) {

            console.log(data[0].inward_id);
    

        }
     });
});
