$(function(){
    
    $('#frota').on('change', function () {
        var valueSelect = $(this).val();
        var km = $(this).find('option[value=" '+ valueSelect +' "]').data('km');
        console.log(km);

    });

        $('#icon2').addClass('active');
        $('#icon1').removeClass('active');
        $('#icon4').removeClass('active');
        $('#icon3').removeClass('active');
    });
