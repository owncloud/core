/**
 * This file is tasked with making the migration from jQuery 2.1.4 to 3.x as 
 * painless as is possible.
 */

/** 
 * Disable the use of globalEval in jQuery 2.1.4.
 * This is required for API compatibility, yet should not be available all the
 * same.
 *
 * @see https://github.com/jquery/jquery/issues/2432 for further details.
 */ 
(function ($) {
    $.fn.globalEval = function(){};
})(jQuery);

