jQuery(document).ready(function ($) {
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.main-header').addClass('tiny');
            $('.scrollup').fadeIn();
        } else {
            $('.main-header').removeClass('tiny');
            $('.scrollup').fadeOut();
        }
    });
    
    $('.postFilter').change(function (e) {
        console.log($(this).val());
        location.href = $(this).val();
    });
    $('.scrollup').click(function () {
        $("html, body").animate({
            scrollTop: 0
        }, 600);
        return false;
    });
    $(".mos-menu-list li:has('ul')").prepend("<span class='down-arrow'></span>");
    $('body').on('click', '.down-arrow', function () {
        $(this).parent().toggleClass('open-below');
        $(this).siblings("ul").slideToggle();
    });
    $(".megamenu > .sub-menu > li").wrapInner('<div class="mega-menu-unit"></div>');
//    new WOW().init();
//    $('.slick-slider').slick();

//    Fancybox.bind('.block-fancybox-advanced, .slick-active .slider-fancybox-advanced', {
//        groupAttr: false,
//    });
//
//    Fancybox.bind(".block-fancybox, .slick-active .slider-fancybox", {
//        animated: false,
//        showClass: false,
//        hideClass: false,
//
//        click: false,
//
//        dragToClose: true,
//
//        closeButton: "top",
//
//        Thumbs: false,
//        Toolbar: false,
//
//        Carousel: {
//            Dots: true,
//            Navigation: false,
//        },
//
//        Image: {
//            zoom: false,
//            fit: "contain-w",
//        },
//    });

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
