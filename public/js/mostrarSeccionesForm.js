jQuery(document).ready(function(){
	jQuery("#siguiente").click(function(){
		jQuery("#content-form-i").addClass('animated bounceOutLeft');

		if(jQuery("#content-form-ii").hasClass('animated') && jQuery("#content-form-ii").hasClass('bounceOutLeft')){
			jQuery("#content-form-ii").removeClass('animated');
			jQuery("#content-form-ii").removeClass('bounceOutLeft');
		}

		setTimeout(function() {
			if(! jQuery("#content-form-i").hasClass('d-none')){
				jQuery("#content-form-i").removeClass('d-block').addClass('d-none');
				jQuery("#content-form-ii").removeClass('d-none').addClass('d-block');
			}
		}, 1000)	

	})
	jQuery("#anterior").click(function(){
		jQuery("#content-form-ii").addClass('animated bounceOutLeft');

		if(jQuery("#content-form-i").hasClass('animated') && jQuery("#content-form-i").hasClass('bounceOutLeft')){
			jQuery("#content-form-i").removeClass('animated');
			jQuery("#content-form-i").removeClass('bounceOutLeft');
		}

		setTimeout(function() {
			if (! jQuery("#content-form-ii").hasClass('d-none')){
				jQuery("#content-form-i").removeClass('d-none').addClass('d-block');
				jQuery("#content-form-ii").removeClass('d-block').addClass('d-none');
			}
		}, 1000)
	})
})