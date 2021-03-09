$(document).ready(function(){
    $('body').on('click','.promocode-generate', function(e) {
        e.preventDefault();
        var promocode = 'uberclone'+Math.floor(Math.random() * 26) + Date.now();
        $('#promocode').val(promocode);
    })

    $('body').on('change', '#validate_days', function(){

        var selected = $(this).find('option:selected');
        var extra = selected.data('days');

        activation_date=$("#activation_date").val();
        if(activation_date){
            //console.log(activation_date);
            var date    =      new Date(activation_date);
            var newdate =   new Date(date);
            newdate.setDate(newdate.getDate() + extra);
            var dd = newdate.getDate();
            var mm = newdate.getMonth() + 1;
            var y = newdate.getFullYear();
            //var someFormattedDate = mm + '/' + dd + '/' + y;
            var someFormattedDate = y + '/' + mm + '/' + dd;
            //console.log(someFormattedDate);
            //return false;
            activation_date=$("#expire_date").val(someFormattedDate);
        }else{
            alert("please fill activation date")
        }
        
    });
})

