console.log("custom aeri.js initiated");

//logic for custom ajax select menu for inward test
$("#inward_test_datalist").on('select', function () {
    var val = this.value;
    var url = '/getMaterials/'+val;
        alert(url);
        
    if($('#inward_test option').filter(function(){
        return this.value.toUpperCase() === val.toUpperCase();        
    }).length) {
        //sending ajax request to retrieve related materials
        
       

        alert(this.value);
    }
});