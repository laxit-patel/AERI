console.log("custom aeri.js initiated");

//logic for custom ajax select menu for inward test
$("#inward_test_datalist").on('select', function () {
    var val = this.value;
    
    if($('#inward_test option').filter(function(){
        return this.value.toUpperCase() === val.toUpperCase();        
    }).length) {
        //sending ajax request to retrieve related materials

        $.ajax({
            type:'GET',
            url:'/getMaterials/'+val,
            alert(url);
            data:'_token = <?php echo csrf_token() ?>',
            success:function(data) {
               $("#msg").html(data.msg);
            }
         });

        alert(this.value);
    }
});