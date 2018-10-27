$(function(){

    //Exibir informações no modal
    $('.show_button').on('click', function(){
        var version, type;
        version = $(this).parent().parent().find('.versaoT').html();
        type = $(this).parent().parent().find('.categoriaT').html();

        $('#version').html(version);
        $('#type').html(type);
    });

    //Deletar checklist
    
});