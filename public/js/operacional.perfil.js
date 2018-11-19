$(function(){

    $('#icon3').addClass('active');
    $('#icon1').removeClass('active');
    $('#icon2').removeClass('active');
    $('#icon4').removeClass('active');


    $('#enviar').on('click', function(){
        var senha1 = $('#senha1').val();
        var senha2 = $('#senha2').val();

        if(senha1 == senha2)
        {
            $(this).closest('form').submit();
        }else{
            alert("As senhas digitadas não são iguais!");           
        }
    });
});
