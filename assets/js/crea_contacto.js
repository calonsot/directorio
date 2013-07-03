/**
 * Script para la vista directorio/create
 */

$(document).ready(
		function() {
					
			//-----------------------PARTE DE LAS CAJAS-------------------------//

			/**
			 * Pone los datos para poner la institucion
			 */
			$('#Directorio_es_institucion').click(function() {

				var isChecked = $(this).attr('checked') ? true : false;

				if (isChecked) {
	
					$('#datos_nombre, #datos_apellido').slideUp();
					$('#datos_institucion').slideDown();
					
				} else {
					
					$('#datos_institucion').slideUp();
					$('#datos_nombre, #datos_apellido').slideDown();
				}
			});
			
			
			/**
			 * Pone los datos para poner si es internacional
			 */
			$('#Directorio_es_internacional').click(
					function() {

						var isChecked = $(this).attr('checked') ? true : false;

						if (isChecked) {
							$('#datos_internacional, #datos_internacional_alternativo, #datos_manual, #datos_manual_alternativo').slideDown();
							
						} else {
							$('#pais_id, #pais_id_alternativo').val('').removeAttr('checked').removeAttr('selected');
							$('#datos_internacional, #datos_internacional_alternativo, #datos_manual, #datos_manual_alternativo, #datos_listas, #datos_listas_alternativas').slideUp();
						}

			});
			
			
			/**
			 * Pone el enlace de la caja domicilio y si no esta seleccionado lo
			 * quita
			 */
			$('#caja_domicilio').click(
					function() {

						var isChecked = $(this).attr(
								'checked') ? true : false;
						$('#enlace_domicilio').slideToggle();

						if (!isChecked) {
							$('#datos_domicilio').slideUp();
							$('#direccion').val('');
							reseteaDomicilio();
						}

					});

			
			/**
			 * Pone el enlace de la caja domicilio y si no esta seleccionado lo
			 * quita
			 */
			$('#caja_otro_domicilio').click(
					function() {

						var isChecked = $('#caja_otro_domicilio').attr(
								'checked') ? true : false;
						$('#enlace_otro_domicilio').slideToggle();
						
						if (!isChecked) {
							$('#datos_otro_domicilio').slideUp();
							$('#direcccion_alternativa').val('');
							reseteaDomicilioAlternativo();
						}

					});
			
			
			
			/**
			 * Pone el enlace de la caja medios si no esta seleccionado lo quita 
			 * 
			 */
			$('#caja_medios').click(
					function() {

						var isChecked = $(this).attr(
								'checked') ? true : false;
						$('#enlace_medios').slideToggle();
						
						if (!isChecked) {
							
							$('#grupo, #medio, #tipo_medio, #perfil_medio, #programa, #seccion, #suplemento, #columna').val('');
							$('#datos_medios').slideUp();
						}

					});
			
			
			
			
			/**
			 * Pone el enlace de la caja cntro documental sino esta seleccionado lo quita 
			 * 
			 */
			$('#caja_documental').click(
					function() {

						var isChecked = $(this).attr(
								'checked') ? true : false;
						$('#enlace_documental').slideToggle();
						
						if (!isChecked) {
							
							$('#grado_academico, #sigla_institucion, #sigla_dependencia, #dependencia, #subdependencia, #actividad').val('');
							$('#datos_documental').slideUp();
						}

					});
			
			
			
			
			/**
			 * Pone el enlace de la caja encargado y si no esta seleccionado lo
			 * quita
			 */
			$('#caja_asistente').click(
					function() {

						var isChecked = $('#caja_asistente').attr(
								'checked') ? true : false;
						$('#enlace_asistente').slideToggle();
						
						if (!isChecked) {
							$('#datos_asistente').slideUp();
						}

					});
			
			
			//-----------------------ENLACES DE LOS ATAJOS-------------------------//
			
			/**
			 * Liga de regreso a los datos principales
			 */
			$('#enlace_principal').click(
					function() {

						$('#datos_principal').slideDown();
						$('#datos_domicilio').slideUp();
						$('#datos_otro_domicilio').slideUp();
						$('#datos_asistente').slideUp();
						$('#datos_medios').slideUp();
						$('#datos_documental').slideUp();
					});
			
			
			/**
			 * Liga de regreso a al domicilio
			 */
			$('#enlace_domicilio').click(
					function() {

						$('#enlace_principal').slideDown();
						$('#datos_principal').slideUp();
						$('#datos_domicilio').slideDown();
						$('#datos_otro_domicilio').slideUp();
						$('#datos_asistente').slideUp();
						$('#datos_medios').slideUp();
						$('#datos_documental').slideUp();
						
						var isChecked = $('#Directorio_es_internacional').attr(
						'checked') ? true : false;
						
						if (isChecked) {
							$('#datos_internacional').slideDown();
							$('#datos_manual').slideDown();
						}
					});
			
			
			
			/**
			 * Liga de regreso a otro domicilio
			 */
			$('#enlace_otro_domicilio').click(
					function() {

						$('#enlace_principal').slideDown();
						$('#datos_principal').slideUp();
						$('#datos_domicilio').slideUp();
						$('#datos_otro_domicilio').slideDown();
						$('#datos_asistente').slideUp();
						$('#datos_medios').slideUp();
						$('#datos_documental').slideUp();
						
						var isChecked = $('#Directorio_es_internacional').attr(
						'checked') ? true : false;
						
						if (isChecked) {
							$('#datos_internacional_alternativo').slideDown();
							$('#datos_manual_alternativo').slideDown();
						}
					});
			
			
			
			/**
			 * Pone los datos de medios y las ligas para regresar
			 */
			$('#enlace_medios').click(
					function() {

						$('#enlace_principal').slideDown();
						$('#datos_principal').slideUp();
						$('#datos_domicilio').slideUp();
						$('#datos_otro_domicilio').slideUp();
						$('#datos_asistente').slideUp();
						$('#datos_medios').slideDown();
						$('#datos_documental').slideUp();
					});
			
			
			
			/**
			 * Pone los datos del centro documental y las ligas para regresar
			 */
			$('#enlace_documental').click(
					function() {

						$('#enlace_principal').slideDown();
						$('#datos_principal').slideUp();
						$('#datos_domicilio').slideUp();
						$('#datos_otro_domicilio').slideUp();
						$('#datos_asistente').slideUp();
						$('#datos_medios').slideUp();
						$('#datos_documental').slideDown();
					});
			
			
			
			
			/**
			 * Pone los datos del asistente y las ligas para regresar
			 */
			$('#enlace_asistente').click(
					function() {

						$('#enlace_principal').slideDown();
						$('#datos_principal').slideUp();
						$('#datos_domicilio').slideUp();
						$('#datos_otro_domicilio').slideUp();
						$('#datos_asistente').slideDown();
						$('#datos_medios').slideUp();
						$('#datos_documental').slideUp();
					});
			
			
			
			
			/**
			 * Pone los para el domicilio internacion (manual)
			 */
			$('#datos_manual').click(
					function() {

						$('#estado, #datos_municipio_lista, .datos_ciudad_id, #datos_asentamiento_lista').slideUp();
						$('#datos_municipio, #datos_ciudad, #datos_asentamiento').slideDown();
						$(this).slideUp();
						$('#datos_listas, #datos_estado_manual').slideDown();
						
					});
			
			
			/**
			 * Pone los para el domicilio internacional (manual)
			 */
			$('#datos_listas').click(
					function() {

						$('#estado, #datos_municipio_lista, .datos_ciudad_id, #datos_asentamiento_lista, #datos_manual').slideDown();
						$('#datos_municipio, #datos_ciudad, #datos_asentamiento').slideUp();
						$(this).slideUp();
						$('#datos_listas, #datos_estado_manual').slideUp();
						
					});
			
			
			
			/**
			 * Pone los para el domicilio alternativo internacion (manual)
			 */
			$('#datos_manual_alternativo').click(
					function() {

						$('#estado_alternativo, #datos_municipio_lista_alternativa, .datos_ciudad_id_alternativa, #datos_asentamiento_lista_alternativa').slideUp();
						$('#datos_municipio_alternativo, #datos_ciudad_alternativa, #datos_asentamiento_alternativo').slideDown();
						$(this).slideUp();
						$('#datos_listas_alternativas, #datos_estado_manual_alternativo').slideDown();
						
					});
			
			
			/**
			 * Pone los para el domicilio alternativo internacional (manual)
			 */
			$('#datos_listas_alternativas').click(
					function() {

						$('#estado_alternativo, #datos_municipio_lista_alternativa, .datos_ciudad_id_alternativa, #datos_asentamiento_lista_alternativa, #datos_manual_alternativo').slideDown();
						$('#datos_municipio_alternativo, #datos_ciudad_alternativa, #datos_asentamiento_alternativo').slideUp();
						$(this).slideUp();
						$('#datos_listas_alternativas, #datos_estado_manual_alternativo').slideUp();
						
					});
			

			//-----------------------PARTE DE LOS DATOS OPCIONALES-------------------------//
			
			/**
			 * Pone los datos para mas correos
			 */
			$('#enlace_correos').click(
					function() {

						$('#datos_correos').slideToggle();
						
					});

			
			
			/**
			 * Pone los datos para mas telefonos
			 */
			$('#enlace_telefonos').click(
					function() {

						$('#datos_telefonos').slideToggle();
						
					});
			
			
			
			
			/**
			 * Copia el estado manual en estado
			 */
			$('#estado_manual').keyup(
					function() {

						estado_manual=$(this).val();
					});
			
			
			

			/**
			 * Copia el estado alternativo manual en estado alternativo
			 */
			$('#estado_manual_alternativo').keyup(
					function() {

						estado_manual=$(this).val();
					});
			
			//-----------------------PARTE DE LA VALIDACION DE EMAILS UNICOS-------------------------//
			
			/**
			 * Pone el mensaje de correo repetido
			 */
			$('#Directorio_correo').focusout(function() {
				
				correo=$(this).val();
				if ($('#Directorio_id').length == 0) 
				{
					$.post("/directorio/index.php/directorio/validacorreos", { 'correo': correo }, function(data){
						
						if (data!='0') {
							$('#datos_correo_repetido').slideDown();
							$('#enlace_correo_repetido').attr('href','/directorio/index.php/directorio/'+data);
						
						} else {
							$('#datos_correo_repetido').slideUp();
						}
					
							
				    });
					
				} else {
								
				id=$('#Directorio_id').val();
				
				$.post("/directorio/index.php/directorio/validacorreos", { 'correo': correo, 'id': id }, function(data){
					
					if (data!='0') {
						$('#datos_correo_repetido').slideDown();
						$('#enlace_correo_repetido').attr('href','/directorio/index.php/directorio/'+data);
					
					} else {
						$('#datos_correo_repetido').slideUp();
					}
				
						
			    });
				}
			});
			
			
			
			/**
			 * Pone el mensaje de correo_alternativo repetido
			 */
			$('#Directorio_correo_alternativo').focusout(function() {
				
				correo_alternativo=$(this).val();
				if ($('#Directorio_alternativo_id').length == 0) 
				{
					$.post("/directorio/index.php/directorio/validacorreos", { 'correo_alternativo': correo_alternativo }, function(data){
						
						if (data!='0') {
							$('#datos_correo_alternativo_repetido').slideDown();
							$('#enlace_correo_alternativo_repetido').attr('href','/directorio/index.php/directorio/'+data);
						
						} else {
							$('#datos_correo_alternativo_repetido').slideUp();
						}
					});
				
				} else {
				
				id=$('#Directorio_id').val();
				
				$.post("/directorio/index.php/directorio/validacorreos", { 'correo_alternativo': correo_alternativo, 'id': id }, function(data){
					
					if (data!='0') {
						$('#datos_correo_alternativo_repetido').slideDown();
						$('#enlace_correo_alternativo_repetido').attr('href','/directorio/index.php/directorio/'+data);
					
					} else {
						$('#datos_correo_alternativo_repetido').slideUp();
					}	
			    });
				}
			});
									
			
			//-----------------------PARTE DE AJAX-------------------------//
			
			
			/**
			 * Carga los datos de domicilio cuando carga
			 */
			$(window).load(function () {
				
				cp_id = $('#codigo_postal').val();
				cp_id_alternativo = $('#codigo_postal_alternativo').val();
					
					$.post("/directorio/index.php/directorio/dameubicacioninicio", { 'cp_id': cp_id }, function(datos)
							{					
						if (datos != '0') 
						{
							tags = datos.split("-|-");
							$('#ciudad_id').empty().append("<option value=''>---No esta en una ciudad---</option>").attr("disabled","disabled");
							
							$('#municipio_lista, #asentamiento_lista').removeAttr("disabled");
			    			$('#sin_cp, #con_ciudad, #sin_ciudad, #con_municipio, #sin_municipio, #con_asentamiento, #sin_asentamiento').slideUp();
			    			
			    			$('#datos_ciudad, #datos_municipio, #datos_asentamiento').slideUp();
			    			$('.datos_ciudad_id, #datos_municipio_lista, #datos_asentamiento_lista').slideDown();

							$('#estado option[value="' + tags[0] + '"]').attr("selected", "selected");

							$('#municipio_lista').empty().append(tags[1]);
								
							if (tags[4] != '0') 
				    		{
				    			$('#ciudad_id').empty().append(tags[4]).removeAttr("disabled");
				    		}
								
								$('#asentamiento_lista').empty().append(tags[2]);
								$('#tipo_asentamiento_id').empty().append(tags[3]).removeAttr("disabled");
										    					    					    			
						} else {
							
							es_internacional=$('#Directorio_es_internacional').val();
							estado=$('#estado').val();
							municipio=$('#municipio').val();
							ciudad=$('#ciudad').val();
							asentamiento=$('#asentamiento').val();
							tipo_asentamiento=$('#tipo_asentamiento_id').val();
							id=$('#Directorio_id').val();
							
							if (municipio != '' || ciudad != '' || asentamiento != '') 
							{
								$('#datos_municipio_lista, .datos_ciudad_id, #datos_asentamiento_lista').slideUp();
								$('#datos_municipio, #datos_ciudad, #datos_asentamiento').slideDown();
								$('#sin_municipio, #sin_ciudad, #sin_asentamiento').slideDown();
							}
							
							if (tipo_asentamiento != '') 
							{
								$('#tipo_asentamiento_id').removeAttr("disabled");
							}
							
							if (id != '') 
							{
							$.post("/directorio/index.php/directorio/dameestado", { 'id': id }, function(datos)
							{					
								if (datos != '0') 
								{
									if (datos != '' && !$.isNumeric(datos)) 
									{
										$('#estado').slideUp();
										$('#estado_manual').val(datos);
										$('#datos_estado_manual').slideDown();
									}
								}
							});
							}
						}
					});
					
					
					$.post("/directorio/index.php/directorio/dameubicacioninicio", { 'cp_id': cp_id_alternativo }, function(datos)
							{					
						if (datos != '0') 
						{
							tags = datos.split("-|-");
							$('#ciudad_id_alternativa').empty().append("<option value=''>---No esta en una ciudad---</option>").attr("disabled","disabled");
							
							$('#municipio_lista_alternativa, #asentamiento_lista_alternativa').removeAttr("disabled");
			    			$('#sin_cp_alternativo, #con_ciudad_alternativa, #sin_ciudad_alternativa, #con_municipio_alternativo, #sin_municipio_alternativo, #con_asentamiento_alternativo, #sin_asentamiento_alternativo').slideUp();
			    			
			    			$('#datos_ciudad_alternativa, #datos_municipio_alternativo, #datos_asentamiento_alternativo').slideUp();
			    			$('.datos_ciudad_id_alternativa, #datos_municipio_lista_alternativa, #datos_asentamiento_lista_alternativa').slideDown();

							$('#estado_alternativo option[value="' + tags[0] + '"]').attr("selected", "selected");

							$('#municipio_lista_alternativa').empty().append(tags[1]);
								
							if (tags[4] != '0') 
				    		{
				    			$('#ciudad_id_alternativa').empty().append(tags[4]).removeAttr("disabled");
				    		}
								
								$('#asentamiento_lista_alternativa').empty().append(tags[2]);
								$('#tipo_asentamiento_id_alternativo').empty().append(tags[3]).removeAttr("disabled");
										    					    					    			
						} else {
							
							es_internacional=$('#Directorio_es_internacional').val();
							estado=$('#estado_alternativo').val();
							municipio=$('#municipio_alternativo').val();
							ciudad=$('#ciudad_alternativa').val();
							asentamiento=$('#asentamiento_alternativo').val();
							tipo_asentamiento=$('#tipo_asentamiento_id_alternativo').val();
							id=$('#Directorio_id').val();
							
							if (municipio != '' || ciudad != '' || asentamiento != '') 
							{
								$('#datos_municipio_lista_alternativa, .datos_ciudad_id_alternativa, #datos_asentamiento_lista_alternativa').slideUp();
								$('#datos_municipio_alternativo, #datos_ciudad_alternativa, #datos_asentamiento_alternativo').slideDown();
								$('#sin_municipio_alternativo, #sin_ciudad_alternativa, #sin_asentamiento_alternativo').slideDown();
							}
							
							if (tipo_asentamiento != '') 
							{
								$('#tipo_asentamiento_id_alternativo').removeAttr("disabled");
							}
							
							if (id != '') 
							{
							$.post("/directorio/index.php/directorio/dameestadoalternativo", { 'id': id }, function(datos)
							{					
								if (datos != '0') 
								{
									if (datos != '' && !$.isNumeric(datos)) 
									{
										$('#estado_alternativo').slideUp();
										$('#estado_manual_alternativo').val(datos);
										$('#datos_estado_manual_alternativo').slideDown();
									}
								}
							});
							}
						}
					});					
			});
			
	
		});