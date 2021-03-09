$(document).ready(function(){
	//================Image  Show Code==========1
	function readURL1(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#profile-img-tag').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#upload-photo").change(function(){
    	readURL1(this);
	});

	function printErrorMsg(status,msg) {
	    if(status=='error_multiple'){
	        $(".print-error-msg").find("ul").html('');
	        $(".print-error-msg").css('display','block');
	        $.each( msg, function( key, value ) {
	            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
	        });
	    }else if(status=='error'){
	        $(".print-error-msg").find("ul").html('');
	        $(".print-error-msg").css('display','block');
	        $(".print-error-msg").find("ul").append('<li>'+msg+'</li>');
	    }else{
	         $(".print-error-msg").find("ul").html('');
	        $(".print-error-msg").css('display','none');
	        $(".print-success-msg").find("ul").html('');
	        $(".print-success-msg").css('display','block');
	        $(".print-success-msg").find("ul").append('<li>'+msg+'</li>');
	        
	    }
	}

	$('#upload-photo').on('change', function(e) {
		e.preventDefault();
		data = new FormData();
		data.append('file', $('#upload-photo')[0].files[0]);
		console.log(data);

		$.ajax({
			"headers":{
				'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
			},
			type:'POST',
			url:base_url+'/',
			data:{
				data:data
			},
			success:function(data){
				console.log(data);
				location.reload()
			},
			error: function (textStatus, errorThrown) {
				console.log(textStatus);
			}
		});
	});
});



	
