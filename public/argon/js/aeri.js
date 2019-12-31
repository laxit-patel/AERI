console.log("custom aeri.js initiated");

//logic for custom ajax select menu for inward test
$("#inward_test_datalist").on('change', function () {
    var val = this.value;
    
    var url = '/getTest/'+val;
    
    if($('#inward_test_datalist option').filter(function(){
        return this.value.toUpperCase() === val.toUpperCase();        
    }).length) {
        //sending ajax request to retrieve related materials
        alert("fired");
        $.ajax({
            type:'GET',
            url:'/getTest/'+val,
            data:val,
            success:function(data) {
                alert(data);
               $("#inward_material_dropdown").html("<option value='"+ data.material_id+"'>"+ data.material_name +"</option>");
            }
         });

        
    }
});