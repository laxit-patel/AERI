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
$('.progress-meter').text(progress_bar+'%');
$('.submit-test').prop('disabled',true);
function progress(button)
{
    var data = button.getAttribute('data-phase');
    var test_id = data.split('/')[0];
    var phase = data.split('/')[1];

    
    $.ajax({
        type:'GET',
        url:'/updateTestPhase',
        data:{
            'test_id':test_id,
            'phase':phase
        },
        success:function(data) {
            if(data == 1)
            {
                console.log('success is fired');
                $(button).empty();
                $(button).removeClass('bg-danger');
                $(button).addClass('bg-success');
                $(button).append("<i class='fas fa-check text-white'></i>");
                $(button).prop('disabled',true)
                progress_bar = progress_bar + 25;
                var width = progress_bar+"%";
                $('.progress-meter').text(width);
                $('#progress-bar').css('width',width);
                if(progress_bar == 100)
                {
                    $('.submit-test').prop('disabled',false);
                }
            }
        }
    });
  
    return false;
    
}

