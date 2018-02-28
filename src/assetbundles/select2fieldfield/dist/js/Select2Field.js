/**
 * Select2 plugin for Craft CMS
 *
 * Select2Field Field JS
 *
 * @author    ByMayo
 * @copyright Copyright (c) 2018 ByMayo
 * @link      http://bymayo.co.uk
 * @package   Select2
 * @since     2.0.0Select2Select2Field
 */

 ;(function ( $, window, document, undefined ) {

    var pluginName = "Select2Select2Field",
        defaults = {
        };

    // Plugin constructor
    function Plugin( element, options ) {
        this.element = element;

        this.options = $.extend( {}, defaults, options) ;

        this._defaults = defaults;
        this._name = pluginName;

        this.init();
    }

    Plugin.prototype = {

        init: function(id) {
            var _this = this;

            $(function () {

/* -- _this.options gives us access to the $jsonVars that our FieldType passed down to us */

            });
        }
    };

    // A really lightweight plugin wrapper around the constructor,
    // preventing against multiple instantiations
    $.fn[pluginName] = function ( options ) {
        return this.each(function () {
            if (!$.data(this, "plugin_" + pluginName)) {
                $.data(this, "plugin_" + pluginName,
                new Plugin( this, options ));
            }
        });
    };

})( jQuery, window, document );
