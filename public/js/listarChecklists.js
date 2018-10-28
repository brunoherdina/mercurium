$(function(){

    //Exibir informações no modal
	$('.show_button').on('click', function(){
		var version, type, questions = new Array();

        version = $(this).parent().parent().find('.versaoT').html();
		type = $(this).parent().parent().find('.categoriaT').html();
		questions = $(this).parent().parent().find('.perguntas').val();

		$('#version').html(version);
		$('#type').html(type);
		for( i=0; i<questions.length; i++){
		$('#tableQuestions').append(questions[i]);
		}
    });

    //Deletar checklist
    $('.delete_button').on('click', function (event) {
        var button = $(this);
		var form = button.closest('form');
		
		swal({
		  title: 'Atenção',
		  text: "Você está prestes à excluir este checklist, deseja continuar?",
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Sim',
		  cancelButtonText: 'Não'
		}).then((result) => {
		  if (result.value) {
			form[0].submit();
		  }
        })	;	
    });
});