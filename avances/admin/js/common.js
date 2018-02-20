//Date picker español
$.datepicker.regional['es'] = {
     closeText: 'Cerrar',
     prevText: '<Ant',
     nextText: 'Sig>',
     currentText: 'Hoy',
     monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
     monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
     dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
     dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
     dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
     weekHeader: 'Sm',
     dateFormat: 'dd/mm/yy',
     firstDay: 1,
     isRTL: false,
     showMonthAfterYear: false,
     yearSuffix: ''
};
$.datepicker.setDefaults($.datepicker.regional['es']);
$(function() {
    $( ".datepicker" ).datepicker({
      showOn: "both",
      buttonImage: "../img/calendar.png",
      buttonImageOnly: true,
      buttonText: "Fecha"
    });
});
$(document).ready(function(){
  $("#mobilephone").keydown(function(event){
    if((event.key >=0 && event.key <= 9 && event.target.value.length <= 8) || event.keyCode == 8 || event.keyCode == 46){
      return;
    }else{
      event.preventDefault();
    }
  });
  $("#mobilephone").keyup(function(event){
    if(event.target.value.length == 4 && event.keyCode != 8 && event.keyCode != 46){
      $('#mobilephone').val(event.target.value + '-');
    }
  });
  $("#localphone").keydown(function(event){
    if((event.key >=0 && event.key <= 9 && event.target.value.length <= 7) || event.keyCode == 8 || event.keyCode == 46){
      return;
    }else{
      event.preventDefault();
    }
  });
  $("#localphone").keyup(function(event){
    if(event.target.value.length == 3 && event.keyCode != 8 && event.keyCode != 46){
      $('#localphone').val(event.target.value + '-');
    }
  });
});
