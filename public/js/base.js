$(document).ready(function() {
    $('.navbar .navbar-brand').hover(function() {
        $(this).css('color', '#D4D4D4');
    }, function() {
        $(this).css('color', '#FAFAFA');
    });

    $('a').hover(function() {
        $(this).parent().addClass('active');
    }, function() {
        var parent = $(this).parent();
        if(parent.attr('id') != 'home') {
            parent.removeClass('active');
        }
    });
});
