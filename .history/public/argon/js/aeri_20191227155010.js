console.log("custom aeri.js initiated");

//logic for custom ajax select menu for inward test
$("#inward_test_datalist").on('select', function () {
    var val = this.value;
    var url = '/getMaterials/'+val;
        
    if($('#inward_test option').filter(function(){
        return this.value.toUpperCase() === val.toUpperCase();        
    }).length) {
        //sending ajax request to retrieve related materials
        
        $.ajax({
            type:'GET',
            url:'/getMaterials/'+val,
            data:val,
            success:function(data) {
                alert("<option value='"+ data.material_id+"'>"+ data.material_name +"</option>");
               $("#inward_material").html("<option value='"+ data.material_id+"'>"+ data.material_name +"</option>");
            }
         });

        
    }
});