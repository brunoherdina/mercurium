$(function(){

    var km;
    $('#item1').on('click', function(){
        $('#fs1').show();
        $('#fs2').hide();
        $('#fs3').hide();
        $('#fs4').hide();

        $('#icon1').addClass('active');
        $('#icon2').removeClass('active');
        $('#icon3').removeClass('active');
        $('#icon4').removeClass('active');
    });

    $('#item2').on('click', function(){
        $('#fs2').show();
        $('#fs1').hide();
        $('#fs3').hide();
        $('#fs4').hide();

        $('#icon2').addClass('active');
        $('#icon1').removeClass('active');
        $('#icon3').removeClass('active');
        $('#icon4').removeClass('active');
    });

    $('#item3').on('click', function(){
        $('#fs3').show();
        $('#fs1').hide();
        $('#fs2').hide();
        $('#fs4').hide();

        $('#icon3').addClass('active');
        $('#icon1').removeClass('active');
        $('#icon2').removeClass('active');
        $('#icon4').removeClass('active');
    });

    $('#item4').on('click', function(){
        $('#fs4').show();
        $('#fs1').hide();
        $('#fs2').hide();
        $('#fs3').hide();

        $('#icon4').addClass('active');
        $('#icon1').removeClass('active');
        $('#icon2').removeClass('active');
        $('#icon3').removeClass('active');
    });

});