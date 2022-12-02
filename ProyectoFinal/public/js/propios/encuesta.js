$(document).ready(function() {
    $('input[type="radio"]').click(function() {
      if ($(this).attr('id') == 'otros') {
        $('#txtotros').show();
      } else {
        $('#txtotros').hide();
      }
      
    });

    $('input[type="checkbox"]').click(function() {
      if ($(this).attr('id') == 'otrose') {
        $('#txtotrose').show();
      }
      else if($(this).attr('id') == 'otrose' && $(this).attr('name')=='cb-entrega'){
        $('#txtotrose').show();
      } 
      else {
        $('#txtotrose').hide();
      }
      
    });

    $('input[type="checkbox"]').click(function() {
      if ($(this).attr('id') == 'otrosa') {
        $('#txtotrosa').show();
      }
      else if($(this).attr('id') == 'otrosa' && $(this).attr('name')=='cb-actividades'){
        $('#txtotrosa').show();
      } 
      else {
        $('#txtotrosa').hide();
      }
      
    });

    $('input[type="checkbox"]').click(function() {
      if ($(this).attr('id') == 'otrosb') {
        $('#txtotrosb').show();
      }
      else if($(this).attr('id') == 'otrosb' && $(this).attr('name')=='cb-actividadesextra'){
        $('#txtotrosb').show();
      } 
      else {
        $('#txtotrosb').hide();
      }
      
    });

    $('input[type="checkbox"]').click(function() {
      if ($(this).attr('id') == 'otrosc') {
        $('#txtotrosc').show();
      }
      else if($(this).attr('id') == 'otrosc' && $(this).attr('name')=='cb-actividadesef'){
        $('#txtotrosc').show();
      } 
      else {
        $('#txtotrosc').hide();
      }
      
    });

  });