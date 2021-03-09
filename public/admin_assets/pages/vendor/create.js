$(document).ready(function(){
	//================Image  Show Code==========1
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

    //================Image  Show Code==========1
    function readURL2(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#show-image-2').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#upload-photo-2").change(function(){
        readURL2(this);
    });

    //================Image  Show Code==========1
    function readURL3(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#show-image-3').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#upload-photo-3").change(function(){
        readURL3(this);
    });
})