/**
 * Script para la vista directorio/create
 */

$(document).ready(
		function() {
			
			function datosListas() {
				$('#estado, #datos_municipio_lista, .datos_ciudad_id, #datos_asentamiento_lista').slideUp();
				$('#datos_municipio, #datos_ciudad, #datos_asentamiento').slideDown();
				$('#datos_manual').slideUp();
				$('#datos_listas, #estado_manual, #datos_estado_manual').slideDown();
			}
			
			function datosManual() {
				$('#estado, #datos_municipio_lista, .datos_ciudad_id, #datos_asentamiento_lista, #datos_manual').slideDown();
				$('#datos_municipio, #datos_ciudad, #datos_asentamiento').slideUp();
				$('#datos_listas').slideUp();
				$('#datos_listas, #datos_estado_manual').slideUp();
			}
			
			
			
			//-----------------------PARTE DEL BOTON DE LA FOTO-------------------------//
			
			
			/**
			 * Pone los datos para poner si es internacional
			 */
			$('#quita_foto').click(
					function() {

						$('#foto_predeterminada').slideDown();
						$('#foto_de_carga').slideUp();
						$('#foto_vacia').val('0');

			});
			
			
			//-----------------------PARTE DE LAS CAJAS-------------------------//
			
			
			/**
			 * Pone los datos para poner si es internacional
			 */
			$('#Directorio_es_internacional').click(
					function() {

						var isChecked = $(this).attr('checked') ? true : false;

						if (isChecked) {
							$('#datos_internacional, #datos_manual').slideDown();
							
						} else {
							$('#pais_id').val('').removeAttr('checked').removeAttr('selected');
							$('#datos_internacional, #datos_manual, #datos_listas').slideUp();
							$('#estado_manual').slideUp();
							$('#estado').slideDown();
						}

			});
			
			
			
			/**
			 * Pone los datos para poner si es internacional el domicilio alternativo
			 */
			$('#Directorio_es_internacional_alternativo').click(
					function() {

						var isChecked = $(this).attr('checked') ? true : false;

						if (isChecked) {
							$('#datos_internacional_alternativo, #datos_manual_alternativo').slideDown();
							
						} else {
							$('#pais_id_alternativo').val('').removeAttr('checked').removeAttr('selected');
							$('#datos_internacional_alternativo, #datos_manual_alternativo, #datos_listas_alternativas').slideUp();
							$('#estado_manual_alternativo').slideUp();
							$('#estado_alternativo').slideDown();
						}

			});
			
			
			//-----------------------ENLACES DE LOS ATAJOS-------------------------//
			
			
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
			 * Pone los para el domicilio internacion (manual)
			 */
			$('#datos_manual').click(
					function() {

						datosListas();
						
					});
			
			
			/**
			 * Pone los para el domicilio internacional (manual)
			 */
			$('#datos_listas').click(
					function() {

						datosManual();
						
					});
			
			
			
			/**
			 * Pone los para el domicilio alternativo internacion (manual)
			 */
			$('#datos_manual_alternativo').click(
					function() {

						$('#estado_alternativo, #datos_municipio_lista_alternativa, .datos_ciudad_id_alternativa, #datos_asentamiento_lista_alternativa').slideUp();
						$('#datos_municipio_alternativo, #datos_ciudad_alternativa, #datos_asentamiento_alternativo').slideDown();
						$(this).slideUp();
						$('#datos_listas_alternativas, #estado_manual_alternativo, #datos_estado_manual_alternativo').slideDown();
						
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
					$.post("/index.php/directorio/validacorreos", { 'correo': correo }, function(data){
						
						if (data!='0') {
							$('#datos_correo_repetido').slideDown();
							$('#enlace_correo_repetido').attr('href','/index.php/directorio/'+data);
						
						} else {
							$('#datos_correo_repetido').slideUp();
						}
					
							
				    });
					
				} else {
								
				id=$('#Directorio_id').val();
				
				$.post("/index.php/directorio/validacorreos", { 'correo': correo, 'id': id }, function(data){
					
					if (data!='0') {
						$('#datos_correo_repetido').slideDown();
						$('#enlace_correo_repetido').attr('href','/index.php/directorio/'+data);
					
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
					$.post("/index.php/directorio/validacorreos", { 'correo_alternativo': correo_alternativo }, function(data){
						
						if (data!='0') {
							$('#datos_correo_alternativo_repetido').slideDown();
							$('#enlace_correo_alternativo_repetido').attr('href','/index.php/directorio/'+data);
						
						} else {
							$('#datos_correo_alternativo_repetido').slideUp();
						}
					});
				
				} else {
				
				id=$('#Directorio_id').val();
				
				$.post("/index.php/directorio/validacorreos", { 'correo_alternativo': correo_alternativo, 'id': id }, function(data){
					
					if (data!='0') {
						$('#datos_correo_alternativo_repetido').slideDown();
						$('#enlace_correo_alternativo_repetido').attr('href','/index.php/directorio/'+data);
					
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
					
					$.post("/index.php/directorio/dameubicacioninicio", { 'cp_id': cp_id }, function(datos)
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
							$.post("/index.php/directorio/dameestado", { 'id': id }, function(datos)
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
					
					
					$.post("/index.php/directorio/dameubicacioninicio", { 'cp_id': cp_id_alternativo }, function(datos)
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
							$.post("/index.php/directorio/dameestadoalternativo", { 'id': id }, function(datos)
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
