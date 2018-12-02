$(function(){
    var nivel;

    $('#nivelSelect').on('change', function(){
        nivel = $('#nivelSelect :selected').text();
        if(nivel == "Operacional")
        {
            $('#equipamentoSelect').show();
        }else{
            $('#equipamentoSelect').hide();
        }
    });
});