$(window).scroll(function() {
    console.log('we made it');
    var theta = $(window).scrollTop() / 10 % Math.PI;
    $('#tire').css({ transform: 'rotate(' + theta + 'rad)' });
});