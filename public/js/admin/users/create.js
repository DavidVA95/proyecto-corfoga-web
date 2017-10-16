$(document).ready(function(){
    idInputDefaultMask();
    $('#phoneNumber').mask("9999-9999");

    $('#rol').on('change', function() {
        if(this.value == 'p') {
            $('#idType').removeClass('hidden');
        } else {
            $('#idType').addClass('hidden');
        }
    });

    $('input[type=radio][name=type]').change(function() {
        if(this.value == 'f'){
            idInputDefaultMask();
        } else {
            $('#id').mask("3-999-999999");
        }
    });
});

function idInputDefaultMask() {
    $.mask.definitions['#']='[1-7]';
    $('#id').mask("#-9999-9999");
}
