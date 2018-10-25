$(function(){
    var atual_fs, next_fs, prev_fs;

    $('.next').click(function(){
        atual_fs = $(this).parent().parent().parent();
        next_fs = $(this).parent().parent().parent().next();

        $('#progress li').eq($('fieldset').index(next_fs)).addClass('ativo');
        atual_fs.hide(500);
        next_fs.show(500);
    });

    $('.prev').click(function(){
        atual_fs = $(this).parent().parent().parent();
        prev_fs = $(this).parent().parent().parent().prev();

        $('#progress li').eq($('fieldset').index(atual_fs)).removeClass('ativo');
        atual_fs.hide(500);
        prev_fs.show(500);
    });

    $('#formulario .botao').click(function(){
        return false;
    })
});