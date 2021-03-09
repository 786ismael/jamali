$(document).ready(function(){
    console.log("Product Create js")
    //================Image  Show Code 1==========
    function readURL1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#show-image-1').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#upload-photo-1").change(function(){
        readURL1(this);
    });

    $(".decimal-number").keydown(function (event) {
        if (event.shiftKey == true) {
            event.preventDefault();
        }

        if ((event.keyCode >= 48 && event.keyCode <= 57) || (event.keyCode >= 96 && event.keyCode <= 105) || event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 37 || event.keyCode == 39 || event.keyCode == 46 || event.keyCode == 190) {

        } else {
            event.preventDefault();
        }

        if($(this).val().indexOf('.') !== -1 && event.keyCode == 190)
            event.preventDefault();
    });
    //================Category Base Data Show and hide============
    category_name=$(".category-name").val();
    if(category_name=='2'){
        $('.hide-data').hide();
    }else{
        $('.hide-data').show();
    }
    
    $(".category-name").on('change', function () {
        category_name=this.value;
        if(category_name=='2'){
            $('.hide-data').hide();
        }else{
            $('.hide-data').show();
        }
    }); 

    $(".discount,.price").on('keyup',function (e) {
         e.preventDefault();
        var price = $('.price').val();
        var discount = $('.discount').val();
        //var discount = $(this).val();
        console.log('discount'+discount);
        if(price==''){
            alert("please enter price")
            return false;
        }
        if(discount==''){
            $(".actual-price").val(price);
        }else{
            
            if(discount>=30){
                $(".actual-price").val(price);
                alert("Maximum 30")

                return false;
            }else{
                price=parseInt(price);
                discount=parseInt(discount);
                var discount_price =price*discount;
                actual_price=price-discount_price/100;
                $(".actual-price").val(actual_price);
            }
            
        }
       
    });
})

