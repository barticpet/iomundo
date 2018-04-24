//When document becomes ready (when pages is fully loaded in the browser)
$(document).ready
(
	$(function () {
		$('[data-toggle="tooltip"]').tooltip();
		$('a[data-toggle="tooltip"]').tooltip({
			animated: 'fade',
			placement: 'bottom',
			html: true
		});
		
		$('#add_btn').on('click', function (e) {
			ret=1;

        	email=$('#form_email');
        	if (email.val().length>0 && !validateEmail(email.val())){
            	email.addClass('field_error');
             	ret=0;
			} else email.removeClass('field_error');
			
			isadmin=$('#form_isadmin');
			if ( isadmin.prop( "checked" ) )
				$('#form-check-label').removeClass('field_error');
				else {
					ret=0;
					$('#form-check-label').addClass('field_error');
				}
			
			img=$('#form_image');
			if (checkFileType(img)){
				img.removeClass('field_error');
			} else {
				ret=0;
				img.addClass('field_error');
			}

			if (ret==1){
				var url = "model/add.php";
				var form = $("#add-form");
				var formData = new FormData(form[0]);
				// POST values in the background the the script URL
				
				$.ajax({
					type: "POST",
					url: url,
					data: formData,
					enctype: 'multipart/form-data',
					processData: false,
					contentType: false,
					async: false,
					cache: false,
					complete : function (xhr, result)
        			{
						var data =$.parseJSON (xhr.responseText);
					
						// we recieve the type of the message: success x danger and apply it to the 
						var messageAlert = 'alert-' + data.type;
						var messageText = data.message;

						// let's compose Bootstrap alert box HTML
						var alertBox = '<div class="alert ' + messageAlert + ' alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' + messageText + '</div>';
						
						// If we have messageAlert and messageText
						if (messageAlert && messageText) {
							// inject the alert to .messages div in our form
							$('#add-form').find('.messages').html(alertBox);
							// empty the form
							if(data.type == 'success')
								$('#add-form')[0].reset();
						}
					}
				});
			}
				
		})
	})
);

function checkFileType(file) {
	var extension = file.val().split('.').pop().toLowerCase();

	if($.inArray(extension, ['gif','png','jpg','jpeg','bmp']) == -1) 
	    return false;
	else return true;
};


function validateEmail(email) {
	var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	return re.test(email);
}


