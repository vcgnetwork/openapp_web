$("document").ready(function() {

    // mobile menu toggle
    var $toggle = $('#nav-toggle');
    var $menu = $('#nav-menu');
    $toggle.click(function () {
        $(this).toggleClass('is-active');
        $menu.toggleClass('is-active');
    });

    // alert windows
    $(".delete").click(function (e) {
        e.preventDefault();
        $(this).parent().fadeOut(600);
    });

});