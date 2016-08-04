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

 ;(function ( $, window, document, undefined ) {

    var pluginName = "Select2FieldType",
        defaults = {};

    function Plugin(element, options) {
        this.element = element;
        this.options = $.extend( {}, defaults, options);
        this._defaults = defaults;
        this._name = pluginName;
        this.init();
    }

    Plugin.prototype = {

        init: function(id) {
            var _this = this;

            $(function () {

				$('#' + _this.options.namespaceId)
					.selectize(
						{
							plugins: ['remove_button', 'restore_on_backspace'],
							maxItems: _this.options.limit,
							placeholder: _this.options.placeholder
						}
					);

            });
        }
    };

    $.fn[pluginName] = function (options) {
        return this.each(function () {
            if (!$.data(this, "plugin_" + pluginName)) {
                $.data(this, "plugin_" + pluginName,
                new Plugin( this, options ));
            }
        });
    };


})(jQuery, window, document);
