jQuery(document).ready(function ($) {
    $(window).load(function () {
        //$(".se-pre-con").fadeOut("slow");
        var section = document.querySelectorAll(".tab-content");
        var sections = {};
        var i = 0;
        Array.prototype.forEach.call(section, function (e) {
            //console.log(e);
            sections[e.id] = e.offsetTop - 120;
        });
//        console.log(sections);
        window.onscroll = function () {
            var scrollPosition = document.documentElement.scrollTop || document.body.scrollTop;
            //console.log(scrollPosition);
            for (i in sections) {
                if (sections[i] <= scrollPosition) {
                    //console.log('Passed: ', i);
                    $('#'+ i + '-link').siblings().removeClass('active');
                    $('#'+ i + '-link').addClass('active');
                }
            }
        };        
        
        
    });
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.main-header').addClass('tiny');
            $('.scrollup').fadeIn();
        } else {
            $('.main-header').removeClass('tiny');
            $('.scrollup').fadeOut();
        }
    });
    $('.scrollup').click(function () {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });
    $(".mos-menu-list li:has('ul')").prepend("<span class='down-arrow'></span>");
    $('body').on('click', '.down-arrow', function () {
        //console.log($(window).width());
        $(this).parent().toggleClass('open-below');
        $(this).siblings("ul").slideToggle();
        //$(".down-arrow").click(function () {
//        if ($(window).width() < 1183) {
//        }
    });
    $(".megamenu > .sub-menu > li").wrapInner('<div class="mega-menu-unit"></div>');
    new WOW().init();
    $('.slick-slider').slick();
    //Fancybox
    //    Fancybox.bind(".slick-active .slick-fancybox", {
    //        Thumbs: {
    //            autoStart: true,
    //        },
    //    });
    
//    Fancybox.bind('[data-fancybox="dialog"]', {
    Fancybox.bind('.block-fancybox-advanced, .slick-active .slider-fancybox-advanced', {
        groupAttr: false,
    });

    Fancybox.bind(".block-fancybox, .slick-active .slider-fancybox", {
        animated: false,
        showClass: false,
        hideClass: false,

        click: false,

        dragToClose: true,

        closeButton: "top",

        Thumbs: false,
        Toolbar: false,

        Carousel: {
            Dots: true,
            Navigation: false,
        },

        Image: {
            zoom: false,
            fit: "contain-w",
        },
    });


    $(".tab-navigation a").click(function (e) {
        e.preventDefault();
//        console.log($(this).attr('href'));
        $(".tab-navigation a.active").removeClass("active");
        $(this).addClass("active");
        
        document.querySelector($(this).attr('href')).scrollIntoView();
        
//        const y = document.querySelector($(this).attr('href')).getBoundingClientRect().top + window.scrollY + 50;
//        window.scroll({
//            top: y,
//            behavior: 'smooth'
//        });
    });
    $('.tab-content-list .tab-content .block-title').click(function () {       
        $(this).next().toggleClass('active');
    });

});
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
    'use strict';
    window.addEventListener('load', function () {
        var forms = document.getElementsByClassName('needs-validation');
        var validation = Array.prototype.filter.call(forms, function (form) {
            form.addEventListener('submit', function (event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });
    }, false);
})();
