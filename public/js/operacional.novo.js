$(function(){
    var km;
    var initial;
    var final;
    $('#frota').on('change', function () {
        km = $('#frota :selected').data('km');
        $('#initial').val(km);

    });

    $('#enviar').on('click', function(){
        initial = $('#initial').val();
        final = $('#final').val();

        if(initial > final){
        swal({
		  title: 'O valor final do horimetro/km não pode ser menor que o valor inicial!',
		  type: 'warning',
		  showCancelButton: false,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Entendi',
        })	;	
    }else{
        $(this).closest('form').submit();
    }
    });

        $('#icon2').addClass('active');
        $('#icon1').removeClass('active');
        $('#icon4').removeClass('active');
        $('#icon3').removeClass('active');
    });
