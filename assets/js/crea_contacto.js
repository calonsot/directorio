/**
 * Script para la vista directorio/create
 */
  
$(document).ready(
		function() {
			
			
			function valida() 
			{
				alert(1);
			}
			
			function reseteaDomicilio () 
			{
				$('#codigo_postal, #ciudad, #ciudad_id, #municipio, #municipio_lista, #asentamiento, #asentamiento_lista, #tipo_asentamiento_id').val('').empty();
				$('#estado').val('').removeAttr('checked').removeAttr('selected');
				$('#ciudad_id').append("<option value=''>---Selecciona una ciudad---</option>").attr("disabled","disabled");
				$('#municipio_lista').append("<option value=''>---Selecciona una municipio---</option>").attr("disabled","disabled");
				$('#asentamiento_lista').append("<option value=''>---Selecciona una colonia---</option>").attr("disabled","disabled");
				$('#tipo_asentamiento_id').append("<option value=''>---Selecciona un tipo de colonia---</option>").attr("disabled","disabled");
				$('#con_ciudad, #sin_ciudad, #con_municipio, #sin_municipio, #con_asentamiento, #sin_asentamiento').slideUp();
			}
			//-----------------------PARTE DE LAS CAJAS-------------------------//

			/**
			 * Pone los datos para poner la institucion
			 
			$('#Directorio_es_institucion').click(function() {

				var isChecked = $('#Directorio_es_institucion').attr(
				'checked') ? true : false;
				
				$('#datos_institucion').slideToggle();
				$('#datos_persona').slideToggle();

				if (isChecked) {
					$('#nombre, #apellido')
					.val('').removeAttr('checked').removeAttr('selected');
					$('#datos_persona').slideUp();
					$('#datos_institucion').slideDown();
					
				} else {
					$('#institucion')
					.val('').removeAttr('checked').removeAttr('selected');
					$('#datos_institucion').slideUp();
					$('#datos_personas').slideDown();
				}
			});*/

			/**
			 * Pone los datos para poner la institucion
			 */
			$('#Directorio_es_institucion').click(function() {

				var isChecked = $('#Directorio_es_institucion').attr(
				'checked') ? true : false;
				
				//$('#datos_institucion').slideToggle();
				//$('#datos_persona').slideToggle();

				if (isChecked) {
					//$('#nombre, #apellido')
					//.val('').removeAttr('checked').removeAttr('selected');
					$('#datos_nombre, #datos_apellido').slideUp();
					$('#datos_institucion').slideDown();
					
				} else {
					//$('#institucion')
					//.val('').removeAttr('checked').removeAttr('selected');
					$('#datos_institucion').slideUp();
					$('#datos_nombre, #datos_apellido').slideDown();
				}
			});
			
			
			/**
			 * Pone los datos para poner si es internacional
			 */
			$('#Directorio_es_internacional').click(
					function() {

						var isChecked = $('#Directorio_es_internacional').attr(
						'checked') ? true : false;
						
						if (isChecked) {
							reseteaDomicilio();
							$('#datos_nacional').slideUp();
							$('#datos_internacional').slideDown();
							
						} else {
							$('#pais_id').val('').removeAttr('checked').removeAttr('selected');
							$('#datos_internacional').slideUp();
							$('#datos_nacional').slideDown();
						}

			});
			
			
			/**
			 * Pone el enlace de la caja domicilio y si no esta seleccionado lo
			 * quita
			 */
			$('#caja_domicilio').click(
					function() {

						var isChecked = $('#caja_domicilio').attr(
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
			
			
			//-----------------------ENLACES DEL DOMICILIO-------------------------//
			
			
			/**
			 * Pone los datos para anotar la ciudad_id
			 */
			$('#con_ciudad').click(
					function() {

						$('#ciudad_id').val('').removeAttr('checked').removeAttr('selected');
						$('#datos_ciudad').slideDown();
						$('.datos_ciudad_id').slideUp();
						$(this).slideUp();
						$('#sin_ciudad').slideDown();
					});
			
			/**
			 * Pone los datos para anotar la ciudad
			 */
			$('#sin_ciudad').click(
					function() {

						$('#ciudad').val('');
						$('#datos_ciudad').slideUp();
						$('.datos_ciudad_id').slideDown();
						$(this).slideUp();
						$('#con_ciudad').slideDown();
					});
			
			
			/**
			 * Pone los datos para anotar el municipio
			 */
			$('#con_municipio').click(
					function() {

						$('#municipio_lista, #asentamiento_lista, #asentamiento, #tipo_asentamiento_id').val('').removeAttr('checked').removeAttr('selected');
						$('#datos_municipio').slideDown();
						$('#datos_municipio_lista').slideUp();
						$(this).slideUp();
						$('#sin_municipio').slideDown();
						
						//parte que despliega tambien el asentamiento
						$('#asentamiento_lista, #tipo_asentamiento_id').val('').removeAttr('checked').removeAttr('selected').attr("disabled","disabled");
						$('#tipo_asentamiento_id').attr("disabled","disabled");
						$('#datos_asentamiento').slideDown();
						$('#datos_asentamiento_lista').slideUp();
						$('#sin_asentamiento, #con_asentamiento').slideUp();
					});
			
			/**
			 * Pone los datos para anotar el municipio de lista
			 */
			$('#sin_municipio').click(
					function() {

						$('#municipio').val('');
						$('#datos_municipio').slideUp();
						$('#datos_municipio_lista').slideDown();
						$(this).slideUp();
						$('#con_municipio').slideDown();
						
						//parte que quita el asentamiento
						$('#asentamiento_lista, #tipo_asentamiento_id').val('').removeAttr('checked').removeAttr('selected').attr("disabled","disabled");
						$('#asentamiento').val('');
						$('#datos_asentamiento').slideUp();
						$('#datos_asentamiento_lista').slideDown();
						$('#sin_asentamiento, #con_asentamiento').slideUp();
					});
			
			/**
			 * Pone los datos para anotar el asentamiento
			 */
			$('#con_asentamiento').click(
					function() {

						$('#asentamiento_lista, #tipo_asentamiento_id').val('').removeAttr('checked').removeAttr('selected');
						$('#tipo_asentamiento_id').attr("disabled","disabled");
						$('#datos_asentamiento').slideDown();
						$('#datos_asentamiento_lista').slideUp();
						$(this).slideUp();
						$('#sin_asentamiento').slideDown();
					});
			
			/**
			 * Pone los datos para anotar el asentamiento_lista
			 */
			$('#sin_asentamiento').click(
					function() {

						$('#tipo_asentamiento_id').val('').removeAttr('checked').removeAttr('selected').attr("disabled","disabled");
						$('#asentamiento').val('');
						$('#datos_asentamiento').slideUp();
						$('#datos_asentamiento_lista').slideDown();
						$(this).slideUp();
						$('#con_asentamiento').slideDown();
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
			
			
			//-----------------------PARTE DE LA VALIDACION DE EMAILS UNICOS-------------------------//
			
			/**
			 * Pone el mensaje de correo repetido
			 */
			$('#Directorio_correo').focusout(function() {
				
				correo=$(this).val();
				
				$.post("/directorio/index.php/directorio/validacorreos", { 'correo': correo }, function(data){
					
					if (data!='0') {
						$('#datos_correo_repetido').slideDown();
						$('#enlace_correo_repetido').attr('href','/directorio/index.php/directorio/'+data);
					
					} else {
						$('#datos_correo_repetido').slideUp();
					}
				
						
			    });
			});
			
			
			
			/**
			 * Pone el mensaje de correo_alternativo repetido
			 */
			$('#Directorio_correo_alternativo').focusout(function() {
				
				correo_alternativo=$(this).val();
				
				$.post("/directorio/index.php/directorio/validacorreos", { 'correo_alternativo': correo_alternativo }, function(data){
					
					if (data!='0') {
						//alert(data);
						$('#datos_correo_alternativo_repetido').slideDown();
						$('#enlace_correo_alternativo_repetido').attr('href','/directorio/index.php/directorio/'+data);
					
					} else {
						alert('['+data+']');
						$('#datos_correo_alternativo_repetido').slideUp();
					}
				
						
			    });
			});
			
			
			//-----------------------PARTE DE AJAX-------------------------//	

			/**
			 * Habilita el atributo asentamiento
			 */
			$('#municipio_lista').bind("change", function() {
				
				$('#tipo_asentamiento_id').empty().append("<option value=''>---Selecciona el tipo de colonia---</option>").attr("disabled","disabled");
				$('#asentamiento_lista').removeAttr("disabled");
				municipio_lista = $(this).val();
		
				$.post("/directorio/index.php/directorio/dameasentamientos", { 'municipio_lista': municipio_lista }, function(data){
					
					tags=data.split('-|-');
					$('#asentamiento_lista').empty().append(tags[0]);
					$('#municipio').val(tags[1]);
			    });	
				
			    $.post("/directorio/index.php/directorio/dameciudad", { 'municipio': municipio_lista }, function(data){
		
			    	if (data != '0') 
			    	{
				        $('#ciudad_id option[value="' + data + '"]').attr("selected", "selected");
			    	
			    	} else {
			    		$('#ciudad_id').empty().append("<option value=''>---No se encuentra en ciudad---</option>").attr("disabled","disabled");
			    		$('#con_ciudad').slideUp();
			    	}
			    	
			    	$('#con_asentamiento').slideDown();
			      
			    });	
			});
			
			
			
			/**
			 * Pone las ciudades cuando cambia estado
			 */
			$("#estado").bind("change", function() {
			    
				$('#ciudad_id').removeAttr("disabled");
				$('#municipio_lista').removeAttr("disabled");
				$('#asentamiento_lista').empty().append("<option value=''>---Selecciona una colonia---</option>").attr("disabled","disabled");
				$('#tipo_asentamiento_id').empty().append("<option value=''>---Selecciona el tipo de colonia---</option>").attr("disabled","disabled");
				estado = $(this).val();
			    
				$.post("/directorio/index.php/directorio/dameciudades", { 'estado': estado }, function(data){
			        $('#ciudad_id').empty().append(data);
			        $('#con_ciudad').slideDown();
			        $('#con_municipio').slideDown();
			    });		
			});
			
			
			
			/**
			 * Pone el tipo de asentamiento cuando cambia el asentamiento
			 */
			$("#asentamiento_lista").bind("change", function() {
				
				$('#tipo_asentamiento_id').removeAttr("disabled");
				asentamiento_lista = $(this).val();
				
			    $.post("/directorio/index.php/directorio/dametipoasentamientos", { 'asentamiento_lista': asentamiento_lista }, function(data){
			    	
			    	datos = data.split("-|-");
			    	$('#tipo_asentamiento_id').empty().append(datos[0]);
			    	$('#cp').val(datos[1]);
			    	$('#asentamiento').val(datos[2]);
			    	$('#codigo_postal').val(datos[3]);
			    });	
			});
			
			
			
			/**
			 * Pone el tipo de asentamiento cuando se escribe un asentamiento
			 */
		    $('#asentamiento').focusin(function() {                          
		    	
		    	asentamiento = $(this).val().trim();
		    	
		    	if (asentamiento != '') {
		    	    $('#tipo_asentamiento_id').removeAttr("disabled");
		    	    
		    	} else {
		    		$('#tipo_asentamiento_id').val('').removeAttr('checked').removeAttr('selected').attr("disabled","disabled");
		    	} 
		    	
		        }).focusout(function() {                                   
		    	
		        	asentamiento = $(this).val().trim();
			    	
			    	if (asentamiento != '') {
			    		$('#tipo_asentamiento_id').removeAttr("disabled");
			    		
			    	} else {
			    		$('#tipo_asentamiento_id').val('').removeAttr('checked').removeAttr('selected').attr("disabled","disabled");
			    	}
		    	
		        }).keyup(function() {
		    	
		        	asentamiento = $(this).val().trim();
			    	
			    	if (asentamiento != '') {
			    		$('#tipo_asentamiento_id').removeAttr("disabled");
			    		
			    		$.post("/directorio/index.php/directorio/dametipoasentamientos", { 'asentamiento_lista': 'simple' }, function(data){
					        $('#tipo_asentamiento_id').empty().append(data);
					    });
			    	
			    	} else {
			    		$('#tipo_asentamiento_id').val('').removeAttr('checked').removeAttr('selected').attr("disabled","disabled");
			    	}
		    	
		        });
			
	
			
			/**
			 * Pone los asentamientos de acuerdo al codigo postal
			 */
			$('#cp').keyup(function() { 
			
				cp = $('#cp').val();
				
				if (cp.length == 5) {
					
			    $.post("/directorio/index.php/directorio/dameubicacion", { 'cp': cp }, function(datos){
	
				if (datos != '0') 
				{
					tags = datos.split("-|-");
					$('#ciudad_id').empty().append("<option value=''>---No esta en una ciudad---</option>").attr("disabled","disabled");
					$('#tipo_asentamiento_id').empty().append("<option value=''>---Selecciona el tipo de colonia---</option>").attr("disabled","disabled");
					
					$('#municipio_lista, #asentamiento_lista').removeAttr("disabled");
	    			$('#sin_cp, #con_ciudad, #sin_ciudad, #con_municipio, #sin_municipio, #con_asentamiento, #sin_asentamiento').slideUp();
	    			
	    			$('#ciudad, #municipio, #asentamiento').val('');
	    			$('#datos_ciudad, #datos_municipio, #datos_asentamiento').slideUp();
	    			$('.datos_ciudad_id, #datos_municipio_lista, #datos_asentamiento_lista').slideDown();

					$('#estado option[value="' + tags[0] + '"]').attr("selected", "selected");

					//para poner el municipio en la lista y como valor
					tag_municipio=tags[1].split("#-#");
					$('#municipio_lista').empty().append(tag_municipio[0]);
					$('#municipio').val(tag_municipio[1]);
						
					if (tags[4] != '0') 
		    		{
		    			tag_ciudad=tags[4].split("#-#");
		    			$('#ciudad_id').empty().append(tag_ciudad[0]).removeAttr("disabled");
		    			$('#ciudad').val(tag_ciudad[1]);
		    		}
						
					if (tags[6] == '1') 
		    		{
						tag_asentamiento=tags[2].split("#-#");
						$('#asentamiento_lista').empty().append(tag_asentamiento[0]);
						$('#asentamiento').val(tag_asentamiento[1]);
						$('#tipo_asentamiento_id').empty().append(tags[3]).removeAttr("disabled");
						$('#codigo_postal').val(tags[5]);
								    					    					    			
		    		} else {
		    			$('#asentamiento_lista').empty().append(tags[2]);
		    		} 
			
				} else 
		    	{
		    		$('#sin_cp').slideDown();
		    		reseteaDomicilio();
		    	}
				
			    });
			    
				} else {
					reseteaDomicilio();
				}
			});
			
	
		});