$(document).ajaxStart(function() { Pace.restart(); }); 
$( document ).ready( function () {
$('.select2').on('change', function() {
    $(this).valid();
});
			$( "#form" ).validate( {
				debug: true,
				ignore: 'input[type=hidden]',
				rules: {
					nacionalidad_usuario: {
						required: true
					},
					cedula_usuario: {
						required: true,
						minlength: 6,
						maxlength: 8,
						number:true,
						remote: "../ajax/ajax_usuario.php?opt=validar_cedula"
					},
					nombre_usuario: {
						required: true,
						minlength: 2,
						maxlength: 100
					},
					apellido_usuario: {
						required: true,
						minlength: 2,
						maxlength: 100
					},
					login_usuario: {
						required: true,
						minlength: 4,
						maxlength: 50,
						remote: "../ajax/ajax_usuario.php?opt=validar_login"
					},
					pass_usuario1: {
						required: true,
						minlength: 6
					},
					pass_usuario2: {
						required: true,
						minlength: 6,
						equalTo: "#pass_usuario1"
					},
					email_usuario: {
						email:true
					},
					rol_usuario: {
						required: true
					},
				},
				messages: {
					cedula_usuario: {
						required: "Ingrese la Cédula del Usuario",
						minlength: "La Cédula debe ser de al menos 6 caracteres",
						number: "Número de Cédula no valido",
						maxlength: "No debe ser mayor a 8 digitos",
						remote: "Esta Cédula ya se encuentra registrada"
					},
					nombre_usuario: {
						required: "Ingrese el Nombre del Usuario",
						minlength: "El Nombre debe ser de al menos 2 caracteres",
						maxlength: "No debe ser mayor a 100 caracteres"
					},
					apellido_usuario: {
						required: "Ingrese el Apellido del Usuario",
						minlength: "El Apellido debe ser de al menos 2 caracteres",
						maxlength: "No debe ser mayor a 100 caracteres"
					},
					login_usuario: {
						required: "Ingrese el Login del Usuario",
						minlength: "El Login debe ser de al menos 4 caracteres",
						maxlength: "No debe ser mayor a 50 caracteres",
						remote: "Este Login ya se encuentra registrado"
					},
					pass_usuario1: {
						required: "Por favor Ingrese una Contraseña",
						minlength: "La contrasela debe ser de al menos 6 caracteres"
					},
					pass_usuario2: {
						required: "Por favor Repita la Contraseña",
						minlength: "La contrasela debe ser de al menos 6 caracteres",
						equalTo: "La Contraseña no conincide"
					},
					email_usuario: {
						email: "Por favor ingrese una cuenta de correo valida"
					},
					rol_usuario: {
						required: "Seleccione el Perfil del Usuario",
					},
				},
				errorElement: "em",
				errorPlacement: function ( error, element ) {
					// Add the `help-block` class to the error element
					error.addClass( "help-block" );
					// Add `has-feedback` class to the parent div.form-group
					// in order to add icons to inputs
					element.closest( "div" ).addClass( "has-feedback" );
					if ( element.prop( "type" ) === "checkbox" ) {
						error.insertAfter( element.parent( "div" ) );
					} else if (element.hasClass('select2')) {
            			error.insertAfter(element.next('span'));
        			}else{
						error.insertAfter( element );
					}
					// Add the span element, if doesn't exists, and apply the icon classes to it.
					if ( !element.next( "span" )[ 0 ] ) {
						$( "<span class='glyphicon glyphicon-remove form-control-feedback'></span>" ).insertAfter( element );
					}
				},
				success: function ( label, element ) {
					// Add the span element, if doesn't exists, and apply the icon classes to it.
					if ( !$( element ).next( "span" )[ 0 ] ) {
						$( "<span class='glyphicon glyphicon-ok form-control-feedback'></span>" ).insertAfter( $( element ) );
					}
				},
				highlight: function ( element, errorClass, validClass ) {
					var elem = $(element);
					if (elem.hasClass('select2')) {
					$( element ).next( "span" ).addClass( "has-error" ).removeClass( "has-success" );
					$( element ).closest( "div" ).addClass( "has-error" ).removeClass( "has-success" );
					}else{
					$( element ).closest( "div" ).addClass( "has-error" ).removeClass( "has-success" );
					$( element ).next( "span" ).addClass( "glyphicon-remove" ).removeClass( "glyphicon-ok" );
					}
				},
				unhighlight: function ( element, errorClass, validClass ) {
					var elem = $(element);
					if (elem.hasClass('select2')) {
					$( element ).next( "span" ).addClass( "has-success" ).removeClass( "has-error" );
					$( element ).closest( "div" ).addClass( "has-success" ).removeClass( "has-error" );
					}else{
					$( element ).closest( "div" ).addClass( "has-success" ).removeClass( "has-error" );
					$( element ).next( "span" ).addClass( "glyphicon-ok" ).removeClass( "glyphicon-remove" );
					}
				}
			} );
		} );