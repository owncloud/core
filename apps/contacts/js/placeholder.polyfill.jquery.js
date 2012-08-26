/**
* HTML5 placeholder polyfill
* @requires jQuery - tested with 1.6.2 but might as well work with older versions
* 
* code: https://github.com/ginader/HTML5-placeholder-polyfill
* please report issues at: https://github.com/ginader/HTML5-placeholder-polyfill/issues
*
* Copyright (c) 2012 Dirk Ginader (ginader.de)
* Dual licensed under the MIT and GPL licenses:
* http://www.opensource.org/licenses/mit-license.php
* http://www.gnu.org/licenses/gpl.html
*
* Version: 2.0.3
* 
* History:
* * 1.0 initial release
* * 1.1 added support for multiline placeholders in textareas
* * 1.2 Allow label to wrap the input element by noah https://github.com/ginader/HTML5-placeholder-polyfill/pull/1
* * 1.3 New option to read placeholder to Screenreaders. Turned on by default
* * 1.4 made placeholder more rubust to allow labels being offscreen + added minified version of the 3rd party libs
* * 1.5 emptying the native placeholder to prevent double rendering in Browsers with partial support
* * 1.6 optional reformat when a textarea is being resized - requires http://benalman.com/projects/jquery-resize-plugin/
* * 1.7 feature detection is now included in the polyfill so you can simply include it without the need for Modernizr
* * 1.8 replacing the HTML5 Boilerplate .visuallyhidden technique with one that still allows the placeholder to be rendered
* * 1.8.1 bugfix for implicit labels
* * 1.9 New option "hideOnFocus" which, if set to false will mimic the behavior of mobile safari and chrome (remove label when typed instead of onfocus)
* * 1.9.1 added reformat event on window resize
* * 1.9.2 more flexible way to "fix" labels that are hidden using clip() thanks to grahambates: https://github.com/ginader/HTML5-placeholder-polyfill/issues/12
* * 2.0 new easier configuration technique and new options forceApply and AutoInit and support for setters and getters
* * 2.0.1 changed check for empty field so a space character is no longer ignored
* * 2.0.2 allow rerun of the placeholder() to cover generated elements - existing polyfilled placeholder will be repositioned. Fixing: https://github.com/ginader/HTML5-placeholder-polyfill/issues/15
* * 2.0.3 turn debugging of for production. fix https://github.com/ginader/HTML5-placeholder-polyfill/issues/18
*/

(function($) {
    var debug = false,
        animId;
    function showPlaceholderIfEmpty(input,options) {
        if( input.val() === '' ){
            input.data('placeholder').removeClass(options.hideClass);
        }else{
            input.data('placeholder').addClass(options.hideClass);
        }
    }
    function hidePlaceholder(input,options){
        input.data('placeholder').addClass(options.hideClass);
    }
    function positionPlaceholder(placeholder,input){
        var ta  = input.is('textarea');
        placeholder.css({
            width : input.innerWidth()-(ta ? 20 : 4),
            height : input.innerHeight()-6,
            lineHeight : input.css('line-height'),
            whiteSpace : ta ? 'normal' : 'nowrap',
            overflow : 'hidden'
        }).offset(input.offset());
    }
    function startFilledCheckChange(input,options){
        var input = input,
            val = input.val();
        (function checkloop(){
            animId = requestAnimationFrame(checkloop);
            if(input.val() != val){
                hidePlaceholder(input,options);
                stopCheckChange();
                startEmptiedCheckChange(input,options);
            }
        })();
    }
    function startEmptiedCheckChange(input,options){
        var input = input,
            val = input.val();
        (function checkloop(){
            animId = requestAnimationFrame(checkloop);
            showPlaceholderIfEmpty(input,options);
        })();
    }
    function stopCheckChange(){
        cancelAnimationFrame(animId);
    }
    function log(msg){
        if(debug && window.console && window.console.log){
            window.console.log(msg);
        }
    }

    $.fn.placeHolder = function(config) {
        log('init placeHolder');
        var o = this;
        var l = $(this).length;
        this.options = $.extend({
            className: 'placeholder', // css class that is used to style the placeholder
            visibleToScreenreaders : true, // expose the placeholder text to screenreaders or not
            visibleToScreenreadersHideClass : 'placeholder-hide-except-screenreader', // css class is used to visually hide the placeholder
            visibleToNoneHideClass : 'placeholder-hide', // css class used to hide the placeholder for all
            hideOnFocus : false, // either hide the placeholder on focus or on type
            removeLabelClass : 'visuallyhidden', // remove this class from a label (to fix hidden labels)
            hiddenOverrideClass : 'visuallyhidden-with-placeholder', // replace the label above with this class
            forceHiddenOverride : true, // allow the replace of the removeLabelClass with hiddenOverrideClass or not
            forceApply : false, // apply the polyfill even for browser with native support
            autoInit : true // init automatically or not
        }, config);
        this.options.hideClass = this.options.visibleToScreenreaders ? this.options.visibleToScreenreadersHideClass : this.options.visibleToNoneHideClass;
        return $(this).each(function(index) {
            var input = $(this),
                text = input.attr('placeholder'),
                id = input.attr('id'),
                label,placeholder,titleNeeded,polyfilled;
            label = input.closest('label');
            input.removeAttr('placeholder');
            if(!label.length && !id){
                log('the input element with the placeholder needs an id!');
                return;
            }
            label = label.length ? label : $('label[for="'+id+'"]').first();
            if(!label.length){
                log('the input element with the placeholder needs a label!');
                return;
            }
            polyfilled = $(label).find('.placeholder');
            if(polyfilled.length) {
                //log('the input element already has a polyfilled placeholder!');
                positionPlaceholder(polyfilled,input);
                return input;
            }
            
            if(label.hasClass(o.options.removeLabelClass)){
                label.removeClass(o.options.removeLabelClass)
                     .addClass(o.options.hiddenOverrideClass);
            }

            placeholder = $('<span class="'+o.options.className+'">'+text+'</span>').appendTo(label);

            titleNeeded = (placeholder.width() > input.width());
            if(titleNeeded){
                placeholder.attr('title',text);
            }
            positionPlaceholder(placeholder,input);
            input.data('placeholder',placeholder);
            placeholder.data('input',placeholder);
            placeholder.click(function(){
                $(this).data('input').focus();
            });
            input.focusin(function() {
                if(!o.options.hideOnFocus && window.requestAnimationFrame){
                    startFilledCheckChange(input,o.options);
                }else{
                    hidePlaceholder(input,o.options);
                }
            });
            input.focusout(function(){
                showPlaceholderIfEmpty($(this),o.options);
                if(!o.options.hideOnFocus && window.cancelAnimationFrame){
                    stopCheckChange();
                }
            });
            showPlaceholderIfEmpty(input,o.options);

            // reformat on window resize and optional reformat on font resize - requires: http://www.tomdeater.com/jquery/onfontresize/
            $(document).bind("fontresize resize", function(){
                positionPlaceholder(placeholder,input);
            });

            // optional reformat when a textarea is being resized - requires http://benalman.com/projects/jquery-resize-plugin/
            if($.event.special.resize){
                $("textarea").bind("resize", function(e){
                    positionPlaceholder(placeholder,input);
                });
            }else{
                // we simply disable the resizeablilty of textareas when we can't react on them resizing
                $("textarea").css('resize','none');
            }

            if(index >= l-1){
                $.attrHooks.placeholder = {
                    get: function(elem) {
                        if (elem.nodeName.toLowerCase() == 'input' || elem.nodeName.toLowerCase() == 'textarea') {
                            if( $(elem).data('placeholder') ){ 
                                // has been polyfilled
                                return $( $(elem).data('placeholder') ).text();
                            }else{
                                // native / not yet polyfilled
                                return $(elem)[0].placeholder;
                            }
                            
                        }else{
                            return undefined;
                        }
                    },
                    set: function(elem, value){
                        return $( $(elem).data('placeholder') ).text(value);
                    }
                };
            }
        });

    

    };
    $(function(){
        var config = window.placeHolderConfig || {};
        if(config.autoInit === false){
            log('placeholder:abort because autoInit is off');
            return
        }
        if('placeholder' in $('<input>')[0] && !config.forceApply){ // don't run the polyfill when the browser has native support
            log('placeholder:abort because browser has native support');
            return;
        }
        $('input[placeholder], textarea[placeholder]').placeHolder(config);
    });
})(jQuery);