$(function (){
    $('#alterar').on('click', function(){
        $('#itens').hide();
        $('#telaAlterar').show();
        $('#titulo').html("Alterar senha");
    });

    $('#voltar').on('click', function(){
        $('#telaAlterar').hide();
        $('#itens').show();
        $('#titulo').html("Informações do usuário");
    });

    $('#enviar').on('click', function(){
        var s1 = $('#senha1').val();
        var s2 = $('#senha2').val();

        if(s1 == s2)
        {
            $(this).closest('form').submit();
        }else{
            alert("As senhas não são iguais!");
        }
    });
});