 $(function() {

	$('.js-select2-list')
		.change(
			function(){
				
				var selectedOption = $('option:selected', this).val();
				
				if (selectedOption == 'json') {
					$('.js-select2-json').addClass('is-visible');					
				}
				else {
					$('.js-select2-json').removeClass('is-visible');
				}
				
			}
		)

});