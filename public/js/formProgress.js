$(function(){
    var atual_fs, next_fs, prev_fs;

    $('.next').click(function(){
        atual_fs = $(this).parent().parent().parent();
        next_fs = $(this).parent().parent().parent().next();

        $('#progress li').eq($('fieldset').index(next_fs)).addClass('ativo');
        atual_fs.hide();
        next_fs.show();
    });

    $('.prev').click(function(){
        atual_fs = $(this).parent().parent().parent();
        prev_fs = $(this).parent().parent().parent().prev();

        $('#progress li').eq($('fieldset').index(atual_fs)).removeClass('ativo');
        atual_fs.hide();
        prev_fs.show();
    });

    $('#formulario .botao').click(function(){
        return false;
    });

    $('#primeiroBotao').click(function(){
        var version = $('#version').val();
        $("#type option:selected").each(function() {
            var cat = $(this).html();
            if(cat != "Selecione..."){
                $('#catSpan').html(cat);
            }else{
                $('#catSpan').html("Nenhuma categoria selecionada!");
            }
         }); 
        $('#versaoSpan').html(version);
    });

    $('#segundoBotao').click(function(){
        var perguntas = $('#tabela').html();
        $('#tabela2').html(perguntas);
        $('#tabela2 .delete_button').hide();
    });

    $(document).on('click', '#adicionar', function () {
        var el = $('#pergunta');
        var value = el.val();

        if (value) {
           $('#tabela').append('<tr><td style="word-wrap:break-word;"><input type="hidden" name="questions[]" value="' + value + '">' + value + '<button class="btn btn-danger delete_button" type="button"style="float:right; data-question="' + value + '">Apagar</button> </td></tr>');
           $('#pergunta').val("");
        }
    });
    $('#tabela').on('click', '.delete_button', function(e){
        $(this).closest('tr').remove();
    });
});