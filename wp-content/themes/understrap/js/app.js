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

    if ($(window).width() > 769) {
        $('.navbar .dropdown').hover(function() {
            $(this).find('.dropdown-menu').first().stop(true, true).slideDown();

        }, function() {
            $(this).find('.dropdown-menu').first().stop(true, true).slideUp();

        });

        $('.navbar .dropdown > a').click(function() {
            location.href = this.href;
        });

    }

    //Scroll to anchor
    $(document).on('click', '#menu-item-dropdown-16703 .dropdown-item', function(event) {
        event.preventDefault();

        $('html, body').animate({
            scrollTop: $($.attr(this, 'href')).offset().top - 175
        }, 500);
    });


    $(".custom-checkbox").click(function(event) {
        if (this.checked) {

            $('.custom-checkbox#' + this.id).prop("checked", true);

            var ul = document.getElementById("kurse-list");
            var li = document.createElement('li');
            var id = String(this.value)
            id = id.replace(/\//g, "-");
            li.setAttribute('id', id);
            var appendValue = document.createTextNode(this.name);
            li.appendChild(appendValue);
            ul.appendChild(li);

        } else {

            $('.custom-checkbox#' + this.id).prop("checked", false);
            id = String(this.value)
            id = id.replace(/\//g, "-");
            $('li#' + id).remove();
        }
    });

    $("a[rel^='prettyPhoto']").prettyPhoto({
        theme: 'dark_square',
        animation_speed: 'fast',
        show_title: false,
        allow_resize: true,
        horizontal_padding: 1,
        autoplay: true,
        modal: false,
        deeplinking: false,
        keyboard_shortcuts: true,
        ie6_fallback: true,
        default_width: 1140,
        default_height: 641,
    });

    $('.wpcf7-submit').on('click', function(e) {

        var satatement = '';

        document.querySelectorAll('ul#kurse-list li').forEach(function(item) {
            satatement += item.textContent.trim();
        });
        var box = $("textarea#kurs-list-id-form");
        box.val(box.val() + satatement);

    });

    $('.btn-toggle').on('click', function(e) {
        $('.custom-contact-form').toggleClass("hidden");
        if (!$('.custom-contact-form').hasClass('hidden')) {
            $('.btn-toggle').text("Schließen").addClass('close-custom-btn');
        } else {
            $('.btn-toggle').text("Anfragen").removeClass('close-custom-btn');
        }
    });

    //Mobile Scripts

    if ($(window).width() < 568.99) {
        var checkedNr = 0;
        $(".custom-checkbox").click(function(event) {
            if (this.checked) {
                checkedNr++;
            } else {
                checkedNr--;
            }

            if (checkedNr >= 1 && !isOnScreen($('.custom-contact-form'))) {
                $('.details-row.details-footer').addClass('show');
            } else {

                $('.details-row.details-footer').removeClass('show');
            }

            $(window).scroll(function() {
                if (!isOnScreen($('.custom-contact-form')) && checkedNr >= 1) {
                    $('.details-row.details-footer').addClass('show');
                } else {
                    $('.details-row.details-footer').removeClass('show');
                }
            });

            function isOnScreen(elem) {
                // if the element doesn't exist, abort
                if (elem.length == 0) {
                    return;
                }
                var $window = jQuery(window)
                var viewport_top = $window.scrollTop()
                var viewport_height = $window.height()
                var viewport_bottom = viewport_top + viewport_height
                var $elem = jQuery(elem)
                var top = $elem.offset().top
                var height = $elem.height()
                var bottom = top + height

                return (top >= viewport_top && top < viewport_bottom) ||
                    (bottom > viewport_top && bottom <= viewport_bottom) ||
                    (height > viewport_height && top <= viewport_top && bottom >= viewport_bottom)
            }

        });

        $('.footer-hook-col .btn-toggle').click(function() {
            if (($(this).hasClass('close-custom-btn'))) {
                $('html, body').animate({
                    scrollTop: $(".anfragen-form").offset().top
                }, 800);
            }
        });
    }


    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 10,
        nav: true,
        navText: ["<span class='nav-button'><i class='fa fa-angle-left'></i> </span>", "<span class='nav-button next'><i class='fa fa-angle-right'></i> </span>"],
        responsive: {
            0: {
                items: 1
            },
            600: {
                items: 3
            },
            1000: {
                items: 4
            }
        }
    })

    if (window.innerWidth > 768) {

        $('.collapse').on('shown.bs.collapse', function() {
            $(this).prev().addClass('active-acc');
        });

        $('.collapse').on('hidden.bs.collapse', function() {
            $(this).prev().removeClass('active-acc');
        });
    }

    var settings = {
        anchors: '#menu-sidebar-categories li a',
        onStart: {
            duration: 280, // ms
            render: function($container) {
                $('.posts-col').addClass('slide-out');
            }
        },
        onAfter: function($container) {
            $('.posts-col').removeClass('slide-out');
        },
    };
    $('#page').smoothState(settings);

    $('li.menu-item-has-children a').on('click', function(event){
            event.preventDefault();
            $(this).next('ul.sub-menu').toggleClass('show-item');
    });

});