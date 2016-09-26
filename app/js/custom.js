$(document).ready(function () {
    activateInputs('.uk-form');

    $('.phone').mask('+7 (000) 000-0000');
});

function activateInputs(parentDiv) {
    var inputs = $(parentDiv).find('input');

    inputs.keyup(function (e) {
        if($(this).val().length > 0) {
            $(this).addClass('activated');
            $(this).parent().addClass('activated');
        } else {
            $(this).removeClass('activated');
            $(this).parent().removeClass('activated');
        }
    });

    inputs.each(function (e) {
        if($(this).val().length > 0) {
            $(this).addClass('activated');
            $(this).parent().addClass('activated');
        } else {
            $(this).removeClass('activated');
            $(this).parent().removeClass('activated');
        }
    });
}