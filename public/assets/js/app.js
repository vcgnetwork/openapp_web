$(document).ready(function () {

    var intakeStep = Cookies.get('intakeStep');
    if (intakeStep > 0) {
        Cookies.get('intakeStep');
    } else {
        Cookies.set('intakeStep', '0', null, '/');
    }
    //console.log('inTake: ' + intakeStep);

    $(".prevBtn").click(function () {
        goToStep(-1);
    });

    $(".nextBtn").click(function () {
        goToStep(1);
    });

    function goToStep(n) {
        var n = parseInt(n);
        var intakeStep = parseInt(Cookies.get('intakeStep'));
        var step = (intakeStep + n);

        switch (true) {
            case step < 1:
                window.location = '/intake/step1';
                break;
            case step == 1:
                window.location = '/intake/step1';
                break;
            case step == 2:
                window.location = '/intake/step2';
                break;
            case step == 3:
                window.location = '/intake/step3';
                break;
            case step == 4:
                window.location = '/intake/step4';
                break;
            case step == 5:
                window.location = '/intake/step5';
                break;
            case step == 6:
                window.location = '/intake/step6';
                break;
            case step == 7:
                window.location = '/intake/step7';
                break;
            case step == 8:
                window.location = '/intake/step8';
                break;
            case step == 9:
                window.location = '/intake/step9';
                break;
            case step > 9:
                window.location = '/intake/complete';
                break;
            default:
                // null
                break;
        }
        return false;
    }

    $.ajaxSetup({headers: {'X-CSRF-Token': $('input[name="_token"]').val()}});

    // home page scroller
    $('a[href*="#"]:not([href="#"])').click(function () {
        if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top
                }, 500);
                return false;
            }
        }
    });

    // mobile menu toggle
    var $toggle = $('#nav-toggle');
    var $menu = $('#nav-menu');
    $toggle.click(function () {
        $(this).toggleClass('is-active');
        $menu.toggleClass('is-active');
    });

    // dropdown menu
    $('a.dd-toggle.system-dd').click(function () {
        $("ul.dd-container ul.dd-box.system").toggle();
    });

    $('a.dd-toggle.profile-dd').click(function () {
        $("ul.dd-container ul.dd-box.profile").toggle();
    });

    // alert windows
    $(".close-me-x").click(function (e) {
        e.preventDefault();
        $(this).parent().fadeOut(300);
    });

    // UNIVERSAL
    //$("html").not(".dd-box").click(function () {
        //console.log('clicked');
        //$("ul.dd-container ul.dd-box.system").hide();
        //$("ul.dd-container ul.dd-box.profile").hide();
    //});


    $(".dropdown-profile").on('click', function () {
        $(".dropdown-menu-profile").toggle();
    });

    $(".dropdown-system").on('click', function () {
        $(".dropdown-menu-system").toggle();
    });

    // $(document).keyup(function (e) {
    //     if (e.keyCode == 27) { // escape key maps to keycode `27`
    //         $(".adminViewOnly").toggle();
    //     }
    // });

});

