jQuery(document).ready(function($) {
    //App.js Please enter JS Here
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();

        if (scroll >= 100) {
            $("#wrapper-navbar").addClass("scrolled");
        } else {
            $("#wrapper-navbar").removeClass("scrolled");
        }
    });
});