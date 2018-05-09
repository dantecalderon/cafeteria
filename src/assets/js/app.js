import $ from 'jquery';
import whatInput from 'what-input';

window.$ = $;

import swal from 'sweetalert2'

import Foundation from 'foundation-sites';
// If you want to pick and choose which modules to include, comment out the above and uncomment
// the line below
//import './lib/foundation-explicit-pieces';




$(document).foundation();



$('#formulario')
  // field element is invalid
  .on("invalid.zf.abide", function(ev,elem) {
     swal('Error!',
     		'El formulario se envio incompleto',
     		'error');
  })
  // form validation passed, form will submit if submit event not returned false
  .on("formvalid.zf.abide", function(ev,frm) {

  	let formulario = $(this);
  	$.ajax({
  		type: formulario.attr('method'),
  		url: formulario.attr('action'),
  		data: formuario.serialize(),
  		success: function(data) {
  			var resultado = data;
  			var respuesta = JSON.parse(resultado);
  			console.log(respuesta);  			
		    swal('Reserva enviada',
		     		'Tu reservacion ha sido enviada con exito',
		     		'success');
  		}
  	});
    // ajax post form 
  })
  // to prevent form from submitting upon successful validation
  .on("submit", function(ev) {
    ev.preventDefault();
    console.log("Submit for form id "+ev.target.id+" intercepted");
  });