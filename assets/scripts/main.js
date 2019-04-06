// import external dependencies

import "jquery"

import "slick-carousel"

// Import everything from autoload
import "./autoload/**/*"


function initSlideronMobileTabs($tab) {
    let $windowWidth = $(window).width();

    if ($windowWidth <= 992) {
        $('.hosting-alternatives__plans .hosting-tab[data-tab=' + $tab + '] .tab-content').slick({
            dots: false,
            arrow: false,
            slideToShow: 1,
            slideToScroll: 1,
            slickGoTo: 2,
        });
    } else {
        if ($('.hosting-alternatives__plans .hosting-tab[data-tab=' + $tab + '] .tab-content').hasClass('slick-slider')) {
            $('.hosting-alternatives__plans .hosting-tab[data-tab=' + $tab + '] .tab-content').slick('unslick');
        }
    }
}

function initSlideronMobile() {
    let $windowWidth = $(window).width();

    if ($windowWidth <= 992) {
        $('.mobile-slider').slick({
            dots: true,
            slideToShow: 1,
            slideToScroll: 1,
            slickGoTo: 2,
        });
    } else {
        if ($('.mobile-slider').hasClass('slick-slider')) {
            $('.mobile-slider').slick('unslick');
        }
    }
}


$(window).resize(() => {
    initSlideronMobile();
    initSlideronMobileTabs(1);
});

$(window).load(() => {
    initSlideronMobile();
    initSlideronMobileTabs(1);
});



$(document).ready(() => {

   if ($('section.form-section').length > 0) {
        $('.get-in-touch-modal').css('display', 'none');
   } else {
       $('.get-in-touch-anchor').css('display', 'none');
   }

    $(window).scroll(() => {
        if ($(window).scrollTop() > 0) {
            $('.header .header__sticky').addClass('active');
        } else {
            $('.header .header__sticky').removeClass('active');
        }
    });


    $('body').on('blur', 'input', function (e) {
        let thisVal = $(e.currentTarget).val();
        let valid = 0;

        if (thisVal !== "" && $(e.currentTarget).closest('div').hasClass('ginput_container_name')) {
            valid = 1;
        } else {
            valid = 0;
        }

        if (thisVal !== "" && $(e.currentTarget).closest('div').hasClass('ginput_container_email')) {
            if (/^([\w-.]+@([\w-]+\.)+[\w-]{2,4})?$/.test(thisVal) !== false) {
                valid = 1;
            } else {
                valid = 0;
            }
            console.log(valid);
        }

        if (thisVal !== "" && $(e.currentTarget).closest('div').hasClass('ginput_container_phone')) {
            if (/^[1-9]+$/.test(thisVal) !== false) {
                valid = 1;
            } else {
                valid = 0;
            }
        }

        if (valid === 1) {
            $(e.currentTarget).closest('div').addClass('valid');
            $(e.currentTarget).closest('div').removeClass('no-valid');
        } else {
            $(e.currentTarget).closest('div').addClass('no-valid');
            $(e.currentTarget).closest('div').removeClass('valid');
        }
        if (thisVal === '') {
            $(e.currentTarget).closest('div').removeClass('no-valid');
            $(e.currentTarget).closest('div').removeClass('valid');
        }
    });


    $('.accordion-item h5').click((e) => {
        //  $('.accordion-item').removeClass('active');
        $(e.currentTarget).closest('.accordion-item').toggleClass('active');
    });

    $('.tabs-row .hosting-tab-title').click((e) => {
        //  $('.accordion-item').removeClass('active');

        let thisTab = $(e.currentTarget).data('tab');
        $('.hosting-alternatives__plans .hosting-tab').removeClass('active-tab');
        $('.hosting-alternatives__plans .hosting-tab[data-tab=' + thisTab + ']').addClass('active-tab');

        $('.tabs-row .hosting-tab-title').removeClass('active-tab');
        $(e.currentTarget).addClass('active-tab');

        initSlideronMobileTabs(thisTab);

    });

});
