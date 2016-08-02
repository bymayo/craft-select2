/**
 * Select2 plugin for Craft CMS
 *
 * Select2FieldType JS
 *
 * @author    Jason Mayo
 * @copyright Copyright (c) 2016 Jason Mayo
 * @link      bymayo.co.uk
 * @package   Select2
 * @since     1.0.0
 */
 
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