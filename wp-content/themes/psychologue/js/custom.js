$(document).ready(function () {
    $('.top-slider').owlCarousel({
        items: 1,
        dots: false,
        nav: true,
        navText: ['<span></span>', '<span></span>']
    });
    $('.tax-slider').owlCarousel({
        items: 1,
        dots: false,
        nav: true,
        navText: ['<span></span>', '<span></span>']
    });

    $('.form *[type="submit"]').attr('disabled', 'disabled');
    $('.form .form-bottomed label *[type="checkbox"]')
        .on('change', function () {
            if ($(this).is(':checked')) {
                $(this).parents('.form-bottomed').find('*[type="submit"]').attr('disabled', 'disabled');
            } else {
                $(this).parents('.form-bottomed').find('*[type="submit"]').removeAttr('disabled');
            }
        });

    $('.services-page .services-list .item').outerHeight($('.services-page .services-list .item').outerWidth());
    $(window)
        .on('resize', function () {
            $('.services-page .services-list .item').outerHeight($('.services-page .services-list .item').outerWidth());
        });


    $('a[href="#callback"]').fancybox({
        keyboard: false,
        toolbar: false,
        smallBtn: true,
        touch: false
    });
    $('a[href="#single"]').fancybox({
        keyboard: false,
        toolbar: false,
        smallBtn: true,
        touch: false
    });

    $("#menu").mmenu({
        "extensions": [
            "pagedim-black"
        ],
        "iconPanels": true,
        navbar: {
            title: "Меню"
        }
    });

    $(function () {
        $(window).scroll(function () {
            if ($(this).scrollTop() != 0) {
                $('#toTop').fadeIn();
            } else {
                $('#toTop').fadeOut();
            }
        });
        $('#toTop').click(function () {
            $('body,html').animate({ scrollTop: 0 }, 800);
        });
    });
});