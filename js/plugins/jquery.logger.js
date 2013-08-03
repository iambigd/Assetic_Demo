(function ($) {

    $.console = function (logger) {
        if (typeof window["console"] != "undefined") {
            console.log(logger);
        }
    };

})(jQuery);