$(function(){
    var atual_fs, next_fs, prev_fs;

    //Avançar telas e barra de progresso
    $('.next').click(function(){
        atual_fs = $(this).parent().parent().parent();
        next_fs = $(this).parent().parent().parent().next();

        $('#progress li').eq($('fieldset').index(next_fs)).addClass('ativo');
        atual_fs.hide();
        next_fs.show();
    });

    //Retroceder telas e barra de progresso
    $('.prev').click(function(){
        atual_fs = $(this).parent().parent().parent();
        prev_fs = $(this).parent().parent().parent().prev();

        $('#progress li').eq($('fieldset').index(atual_fs)).removeClass('ativo');
        atual_fs.hide();
        prev_fs.show();
    });

    //Previnir envio de formulario
    $('.botao').click(function(){
        return false;
    });

    //Enviar dados da primeira tela para a ultima
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

    //Enviar dados da segunda tela para a terceira
    $('#segundoBotao').on('click', function(){
        //Pega o conteúdo da primeira tabela
        var perguntas = $('#tabela').html();

        //Insere o conteúdo na segunda tabela
        $('#tabela2').html(perguntas);

        //Remove o botão de deletar da segunda tabela
        $('#tabela2 .delete_button').hide();

        //Remove o conteúdo da primeira tabela para evitar conflito no envio do form
        $('#tabela').html('');
    });

    //Enviar dados da terceira tela para a segunda
    $('#anterior3').on('click', function(){
         //Pega o conteúdo da segunda tabela
         var perguntas = $('#tabela2').html();

        //Insere o conteúdo na primeira tabela
        $('#tabela').html(perguntas);

         //Mostra o botão de deletar
         $('#tabela .delete_button').show();

         //Remove o conteúdo da segunda tabela para evitar conflito no envio do form
         $('#tabela2').html('');
    }); 

    //Adicionar itens ao checklist
    $(document).on('click', '#adicionar', function () {
        var el = $('#pergunta');
        var value = el.val();

        if (value) {
           $('#tabela').append('<tr><td style="word-wrap:break-word;"><input type="hidden" name="questions[]" value="' + value + '">' + value + '<button class="btn btn-danger delete_button" type="button"style="float:right; data-question="' + value + '">Apagar</button> </td></tr>');
           $('#pergunta').val("");
        }
    });

    //Remover item da tabela
    $('#tabela').on('click', '.delete_button', function(e){
        $(this).closest('tr').remove();
    });

});