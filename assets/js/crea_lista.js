/**
 * Script para la vista listas/create
 */

$(document).ready(
		function() {
			
			/**
			 * Funcion para poner las columnas
			 */
			 function displayVals() {
				 
				 multipleValues= $(this).val() || '';
				 $("#atributos").val(multipleValues.join(', '));
				 }
			 
			 $("#columnas").change(displayVals);
			 
			 
			 	/**
			 	 * Funcion para poner las columnas cuando se escoge correo
			 	 */
				$("#Listas_formatos_id").bind("change", function() {
				    
					if ($(this).val() == 3 || $(this).val() == 4) 
					{
						$('#columnas').val('').removeAttr('selected').attr("disabled","disabled");
						$('#datos_columnas').slideUp();
						$('#atributos').val('nombre, apellido, institucion, correo, correo_alternativo, correos');
						
					} else {
						$('#atributos').val('');
						$('#datos_columnas').slideDown();
						$('#columnas').removeAttr('disabled');
					}
				});
				
				
				/**
				 * Pone los datos para anotar el asentamiento_lista
				 */
				$('#boton_lista').click(
						function() {
							
							id = $(this).attr('valor');
							
						    $.post("/directorio/index.php?r=listas/imprimelista", { 'id': id });//, function(data){
						        //$('#tipo_asentamiento_id').empty().append(data);
						    //});	
							
				});
				
			
});