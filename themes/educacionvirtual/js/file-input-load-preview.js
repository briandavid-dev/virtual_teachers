
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $("#preview_"+input.id).attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

jQuery(document).ready(function(){
	
	jQuery('input[type=file]').bootstrapFileInput();
	
	jQuery("input[type=file]").change(function(){
	    readURL(this);
	    jQuery("#preview_"+this.id).attr("class","show");
	});

})