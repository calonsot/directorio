/**
 * Parte del domicilio
 */



$(document).ready(
		function() {
				
			function reseteaDomicilioAlternativo () 
			{
				$('#codigo_postal_alternativo, #ciudad_alternativa, #ciudad_id_alternativa, #municipio_alternativo, #municipio_lista_alternativa, #asentamiento_alternativo, #asentamiento_lista_alternativa, #tipo_asentamiento_id_alternativo').val('').empty();
				$('#estado_alternativo').val('').removeAttr('checked').removeAttr('selected');
				$('#ciudad_id_alternativa').append("<option value=''>---Selecciona una ciudad---</option>");
				$('#municipio_lista_alternativa').append("<option value=''>---Selecciona una municipio---</option>");
				$('#asentamiento_lista_alternativa').append("<option value=''>---Selecciona una colonia---</option>");
				$('#tipo_asentamiento_id_alternativo').append("<option value=''>---Selecciona un tipo de colonia---</option>");
				$('#con_ciudad_alternativa, #sin_ciudad_alternativa, #con_municipio_alternativo, #sin_municipio_alternativo, #con_asentamiento_alternativo, #sin_asentamiento_alternativo').slideUp();
			}
			//-----------------------ENLACES DEL DOMICILIO-------------------------//
			
			
			/**
			 * Pone los datos para anotar la ciudad_id
			 */
			$('#con_ciudad_alternativa').click(
					function() {

						$('#ciudad_id_alternativa').val('').removeAttr('checked').removeAttr('selected');
						$('#datos_ciudad_alternativa').slideDown();
						$('.datos_ciudad_id_alternativa').slideUp();
						$(this).slideUp();
						$('#sin_ciudad_alternativa').slideDown();
					});
			
			/**
			 * Pone los datos para anotar la ciudad
			 */
			$('#sin_ciudad_alternativa').click(
					function() {

						$('#ciudad_alternativa').val('');
						$('#datos_ciudad_alternativa').slideUp();
						$('.datos_ciudad_id_alternativa').slideDown();
						$(this).slideUp();
						$('#con_ciudad_alternativa').slideDown();
					});
			
			
			/**
			 * Pone los datos para anotar el municipio
			 */
			$('#con_municipio_alternativo').click(
					function() {

						$('#municipio_lista_alternativa, #asentamiento_lista_alternativa, #asentamiento_alternativo, #tipo_asentamiento_id_alternativo').val('').removeAttr('checked').removeAttr('selected');
						$('#datos_municipio_alternativo').slideDown();
						$('#datos_municipio_lista_alternativa').slideUp();
						$(this).slideUp();
						$('#sin_municipio_alternativo').slideDown();
						
						//parte que despliega tambien el asentamiento
						$('#asentamiento_lista_alternativa, #tipo_asentamiento_id_alternativo').val('').removeAttr('checked').removeAttr('selected').attr("disabled","disabled");
						$('#tipo_asentamiento_id_alternativo').attr("disabled","disabled");
						$('#datos_asentamiento_alternativo').slideDown();
						$('#datos_asentamiento_lista_alternativa').slideUp();
						$('#sin_asentamiento_alternativo, #con_asentamiento_alternativo').slideUp();
					});
			
			/**
			 * Pone los datos para anotar el municipio de lista
			 */
			$('#sin_municipio_alternativo').click(
					function() {

						$('#municipio_alternativo').val('');
						$('#datos_municipio_alternativo').slideUp();
						$('#datos_municipio_lista_alternativa').slideDown();
						$(this).slideUp();
						$('#con_municipio_alternativo').slideDown();
						
						//parte que quita el asentamiento
						$('#asentamiento_lista_alternativa, #tipo_asentamiento_id_alternativo').val('').removeAttr('checked').removeAttr('selected').attr("disabled","disabled");
						$('#asentamiento_alternativo').val('');
						$('#datos_asentamiento_alternativo').slideUp();
						$('#datos_asentamiento_lista_alternativa').slideDown();
						$('#sin_asentamiento_alternativo, #con_asentamiento_alternativo').slideUp();
					});
			
			/**
			 * Pone los datos para anotar el asentamiento
			 */
			$('#con_asentamiento_alternativo').click(
					function() {

						$('#asentamiento_lista_alternativa, #tipo_asentamiento_id_alternativo').val('').removeAttr('checked').removeAttr('selected');
						$('#tipo_asentamiento_id_alternativo').attr("disabled","disabled");
						$('#datos_asentamiento_alternativo').slideDown();
						$('#datos_asentamiento_lista_alternativa').slideUp();
						$(this).slideUp();
						$('#sin_asentamiento_alternativo').slideDown();
					});
			
			/**
			 * Pone los datos para anotar el asentamiento_lista
			 */
			$('#sin_asentamiento_alternativo').click(
					function() {

						$('#tipo_asentamiento_id_alternativo').val('').removeAttr('checked').removeAttr('selected').attr("disabled","disabled");
						$('#asentamiento_alternativo').val('');
						$('#datos_asentamiento_alternativo').slideUp();
						$('#datos_asentamiento_lista_alternativa').slideDown();
						$(this).slideUp();
						$('#con_asentamiento_alternativo').slideDown();
					});
			
	

			//-----------------------PARTE DE RESETEAR EL CODIGO POSTAL ID-------------------------//
			
			$('#estado_alternativo, #municipio_lista_alternativa, ciudad_id_alternativa, asentamiento_lista_alternativa, tipo_asentamiento_id_alternativo').bind("change", function() {
				$('#codigo_postal_alternativo').val('');
				
			});
			
			$('#estado_manual_alternativo, ciudad_alternativa, municipio_alternativo, asentamiento_alternativo').keyup(function(){
				$('#codigo_postal_alternativo').val('');
				
			});
			
			
			
			//-----------------------PARTE DE AJAX-------------------------//	

			/**
			 * Habilita el atributo asentamiento
			 */
			$('#municipio_lista_alternativa').bind("change", function() {
				
				$('#tipo_asentamiento_id_alternativo').empty().append("<option value=''>---Selecciona el tipo de colonia---</option>").attr("disabled","disabled");
				$('#asentamiento_lista_alternativa').removeAttr("disabled");
				municipio_lista = $(this).val();
		
				$.post("/index.php/directorio/dameasentamientos", { 'municipio_lista': municipio_lista }, function(data){
					
					tags=data.split('-|-');
					$('#asentamiento_lista_alternativa').empty().append(tags[0]);
					$('#municipio_alternativo').val(tags[1]);
			    });	
				
			    $.post("/index.php/directorio/dameciudad", { 'municipio': municipio_lista }, function(data){
		
			    	if (data != '0') 
			    	{
			    		tags=data.split('-|-');
				        $('#ciudad_id_alternativa').empty().append(tags[0]).removeAttr("disabled");
				        $('#ciudad_alternativa').val(tags[1]);
				        $('#con_ciudad_alternativa').slideUp();
			    	
			    	} else {
			    		$('#ciudad_id_alternativa').empty().append("<option value=''>---No se encuentra en ciudad---</option>").attr("disabled","disabled");
			    		$('#ciudad_alternativa').val('');
			    		$('#con_ciudad_alternativa').slideUp();
			    	}
			    	
			    	$('#con_asentamiento_alternativo').slideDown();
			      
			    });	
			});
			
			
			
			/**
			 * Pone las ciudad cuando cambia ciudad_id
			 */
			$("#ciudad_id_alternativa").bind("change", function() {
			    
				ciudad_val=$(this).val();
				ciudad=$('#ciudad_id_alternativa option[value="' + ciudad_val + '"]').text();
				$('#ciudad_alternativa').val(ciudad);
			});
			
			
			
			/**
			 * Pone las ciudades cuando cambia estado
			 */
			$("#estado_alternativo").bind("change", function() {
			    
				$('#ciudad_id_alternativa').removeAttr("disabled");
				$('#municipio_lista_alternativa').removeAttr("disabled");
				$('#asentamiento_lista_alternativa').empty().append("<option value=''>---Selecciona una colonia---</option>").attr("disabled","disabled");
				$('#tipo_asentamiento_id_alternativo').empty().append("<option value=''>---Selecciona el tipo de colonia---</option>");
				$('#codigo_postal_alternativo, #municipio_alternativo, #asentamiento_alternativo, #ciudad_alternativa, #estado_manual_alternativo').val('');
				
				estado = $(this).val();
			    
				$.post("/index.php/directorio/damemunicipios", { 'estado': estado }, function(data){
			        $('#municipio_lista_alternativa').empty().append(data);
			    });
				
				$.post("/index.php/directorio/dameciudades", { 'estado': estado }, function(data){
			        $('#ciudad_id_alternativa').empty().append(data);
			        $('#con_ciudad_alternativa').slideDown();
			        $('#con_municipio_alternativo').slideDown();
			    });		
			});
			
			
			
			/**
			 * Pone el tipo de asentamiento cuando cambia el asentamiento
			 */
			$("#asentamiento_lista_alternativa").bind("change", function() {
				
				$('#tipo_asentamiento_id_alternativo').removeAttr("disabled");
				asentamiento_lista = $(this).val();
				
			    $.post("/index.php/directorio/dametipoasentamientos", { 'asentamiento_lista': asentamiento_lista }, function(data){
			    	
			    	datos = data.split("-|-");
			    	$('#tipo_asentamiento_id_alternativo').empty().append(datos[0]);
			    	$('#cp_alternativo').val(datos[1]);
			    	$('#asentamiento_alternativo').val(datos[2]);
			    	$('#codigo_postal_alternativo').val(datos[3]);
			    });	
			});
			
			
			
			/**
			 * Pone el tipo de asentamiento cuando se escribe un asentamiento
			 */
		    $('#asentamiento_alternativo').focusin(function() {                          
		    	
		    	asentamiento = $(this).val().trim();
		    	
		    	if (asentamiento != '') {
		    	    $('#tipo_asentamiento_id_alternativo').removeAttr("disabled");
		    	    
		    	} else {
		    		$('#tipo_asentamiento_id_alternativo').val('').removeAttr('checked').removeAttr('selected').attr("disabled","disabled");
		    	} 
		    	
		        }).focusout(function() {                                   
		    	
		        	asentamiento = $(this).val().trim();
			    	
			    	if (asentamiento != '') {
			    		$('#tipo_asentamiento_id_alternativo').removeAttr("disabled");
			    		
			    	} else {
			    		$('#tipo_asentamiento_id_alternativo').val('').removeAttr('checked').removeAttr('selected').attr("disabled","disabled");
			    	}
		    	
		        }).keyup(function() {
		    	
		        	asentamiento = $(this).val().trim();
			    	
			    	if (asentamiento != '') {
			    		$('#tipo_asentamiento_id_alternativo').removeAttr("disabled");
			    		
			    		$.post("/index.php/directorio/dametipoasentamientos", { 'asentamiento_lista': 'simple' }, function(data){
					        $('#tipo_asentamiento_id_alternativo').empty().append(data);
					    });
			    	
			    	} else {
			    		$('#tipo_asentamiento_id_alternativo').val('').removeAttr('checked').removeAttr('selected').attr("disabled","disabled");
			    	}
		    	
		        });
			
	
			
			/**
			 * Pone los asentamientos de acuerdo al codigo postal
			 */
			$('#cp_alternativo').keyup(function() { 
			
				cp = $(this).val();
				
				if (cp.length == 5) {
					
			    $.post("/index.php/directorio/dameubicacion", { 'cp': cp }, function(datos){
	
				if (datos != '0') 
				{
					tags = datos.split("-|-");
					$('#ciudad_id_alternativa').empty().append("<option value=''>---No esta en una ciudad---</option>").attr("disabled","disabled");
					$('#tipo_asentamiento_id_alternativo').empty().append("<option value=''>---Selecciona el tipo de colonia---</option>").attr("disabled","disabled");
					
					$('#municipio_lista_alternativa, #asentamiento_lista_alternativa').removeAttr("disabled");
	    			$('#sin_cp_alternativo, #con_ciudad_alternativa, #sin_ciudad_alternativa, #con_municipio_alternativo, #sin_municipio_alternativo, #con_asentamiento_alternativo, #sin_asentamiento_alternativo').slideUp();
	    			
	    			$('#estado_manual_alternativo').slideUp();
	    			$('#estado_alternativo').slideDown();
	    			
	    			$('#ciudad_alternativa, #municipio_alternativo, #asentamiento_alternativo, #estado_manual_alternativo').val('');
	    			$('#datos_ciudad_alternativa, #datos_municipio_alternativo, #datos_asentamiento_alternativo').slideUp();
	    			$('.datos_ciudad_id_alternativa, #datos_municipio_lista_alternativa, #datos_asentamiento_lista_alternativa').slideDown();
	    			$('#estado_alternativo').val('').removeAttr('checked').removeAttr('selected');

					$('#estado_alternativo option[value="' + tags[0] + '"]').attr("selected", "selected");
					
					//para poner el municipio en la lista y como valor
					tag_municipio=tags[1].split("#-#");
					$('#municipio_lista_alternativa').empty().append(tag_municipio[0]);
					$('#municipio_alternativo').val(tag_municipio[1]);
						
					if (tags[4] != '0') 
		    		{
		    			tag_ciudad=tags[4].split("#-#");
		    			$('#ciudad_id_alternativa').empty().append(tag_ciudad[0]).removeAttr("disabled");
		    			$('#ciudad_alternativa').val(tag_ciudad[1]);
		    		}
						
					if (tags[6] == '1') 
		    		{
						tag_asentamiento=tags[2].split("#-#");
						$('#asentamiento_lista_alternativa').empty().append(tag_asentamiento[0]);
						$('#asentamiento_alternativo').val(tag_asentamiento[1]);
						$('#tipo_asentamiento_id_alternativo').empty().append(tags[3]).removeAttr("disabled");
						$('#codigo_postal_alternativo').val(tags[5]);
								    					    					    			
		    		} else {
		    			$('#asentamiento_lista_alternativa').empty().append(tags[2]);
		    		} 
			
				} else 
		    	{
		    		$('#sin_cp_alternativo').slideDown();
		    		reseteaDomicilioAlternativo();
		    	}
				
			    });
			    
				} else {
					reseteaDomicilioAlternativo();
				}
			});
			
			
			
		});
