/*------------------------------
 * Copyright 2014 Pixelized
 * http://www.pixelized.cz
 *
 * Freelancer theme v1.1
 ------------------------------*/


$(window).scroll(function () {
    if ($(window).scrollTop() > 600) {
        $('nav').fadeIn(100);
    } else {
        $('nav').fadeOut(100);
    }

    if ($(window).width() > 767) {
        if ($(this).scrollTop() > 600) {
            $('.scroll-up').fadeIn(100);
        } else {
            $('.scroll-up').fadeOut(100);
        }
    }
});

function applyScrollpointEffects($parent) {
    $parent.find('.scrollpoint.sp-effect1').waypoint(function () {
        $(this).toggleClass('active');
        $(this).toggleClass('animated fadeInLeft');
    }, {offset: '90%'});

    $parent.find('.scrollpoint.sp-effect2').waypoint(function () {
        $(this).toggleClass('active');
        $(this).toggleClass('animated fadeInRight');
    }, {offset: '90%'});

    $parent.find('.scrollpoint.sp-effect3').waypoint(function () {
        $(this).toggleClass('active');
        $(this).toggleClass('animated fadeInDown');
    }, {offset: '90%'});

    $parent.find('.scrollpoint.sp-effect4').waypoint(function () {
        $(this).toggleClass('active');
        $(this).toggleClass('animated fadeIn');
    }, {offset: '70%'});
}

$(document).ready(function () {

    $("a.scroll[href^='#']").on('click', function (e) {
        e.preventDefault();
        var hash = this.hash;
        $('html, body').animate({scrollTop: $(this.hash).offset().top}, 1000, function () {
            window.location.hash = hash;
        });
    });

    $('#skills-toggle').click(function () {
        $('#skills').slideToggle(500);
    });

    $('.chart').easyPieChart({
        barColor: '#2F4254',
        trackColor: '#1ABC9C',
        scaleColor: false,
        lineCap: 'butt',
        lineWidth: 12,
        size: 110,
        animate: 2000
    });

    var $carousel = $('.carousel');
    $carousel.mouseenter(function () {
        $('.carousel-control').fadeIn(300);
    });

    $carousel.mouseleave(function () {
        $('.carousel-control').fadeOut(300);
    });

    $('#skills').waypoint(function () {
        $('#separator .number').countTo();
    }, {offset: '85%'});

    if ($(window).width() > 767) {
        var $service = $('.service');
        $service.mouseenter(function (e) {
            $(this).find('img').animate({paddingBottom: "15px"}, 500);
        });

        $service.mouseleave(function (e) {
            $(this).find('img').stop().animate({paddingBottom: "0px"}, 500);
        });
    }

    if ($(window).width() > 767) {
        applyScrollpointEffects($("body"));
        $('.macbook-inner').waypoint(function () {
            $(this).toggleClass('active');
            $(this).toggleClass('black');
        }, {offset: '70%'});
    }
});



