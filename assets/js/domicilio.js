/**
 * Parte del domicilio
 */

$(document).ready(
		function() {
															
			function reseteaDomicilio () 
			{
				$('#codigo_postal, #ciudad, #ciudad_id, #municipio, #municipio_lista, #asentamiento, #asentamiento_lista, #tipo_asentamiento_id').val('').empty();
				$('#estado').val('').removeAttr('checked').removeAttr('selected');
				$('#ciudad_id').append("<option value=''>---Selecciona una ciudad---</option>");
				$('#municipio_lista').append("<option value=''>---Selecciona una municipio---</option>");
				$('#asentamiento_lista').append("<option value=''>---Selecciona una colonia---</option>");
				$('#tipo_asentamiento_id').append("<option value=''>---Selecciona un tipo de colonia---</option>");
				$('#con_ciudad, #sin_ciudad, #con_municipio, #sin_municipio, #con_asentamiento, #sin_asentamiento').slideUp();
			}
			
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
			
			
			//-----------------------PARTE DE RESETEAR EL CODIGO POSTAL ID-------------------------//
			
			$('#estado, #municipio_lista, ciudad_id, asentamiento_lista, tipo_asentamiento_id').bind("change", function() {
				$('#codigo_postal').val('');
				
			});
			
			$('#estado_manual, ciudad, municipio, asentamiento').keyup(function(){
				$('#codigo_postal').val('');
				
			});
			
			
			
			
			//-----------------------PARTE DE AJAX-------------------------//	

			/**
			 * Habilita el atributo asentamiento
			 */
			$('#municipio_lista').bind("change", function() {
				
				$('#tipo_asentamiento_id').empty().append("<option value=''>---Selecciona el tipo de colonia---</option>").attr("disabled","disabled");
				$('#asentamiento_lista').removeAttr("disabled");
				municipio_lista = $(this).val();
		
				$.post(path + "/index.php/directorio/dameasentamientos", { 'municipio_lista': municipio_lista }, function(data){
					
					tags=data.split('-|-');
					$('#asentamiento_lista').empty().append(tags[0]);
					$('#municipio').val(tags[1]);
			    });	
				
			    $.post(path + "/index.php/directorio/dameciudad", { 'municipio': municipio_lista }, function(data){
		
			    	if (data != '0') 
			    	{
			    		tags=data.split('-|-');
				        $('#ciudad_id').empty().append(tags[0]).removeAttr("disabled");
				        $('#ciudad').val(tags[1]);
				        $('#con_ciudad').slideUp();
			    	
			    	} else {
			    		$('#ciudad_id').empty().append("<option value=''>---No se encuentra en ciudad---</option>").attr("disabled","disabled");
			    		$('#ciudad').val('');
			    		$('#con_ciudad').slideUp();
			    	}
			    	
			    	$('#con_asentamiento').slideDown();
			      
			    });	
			});
			
			
			
			/**
			 * Pone las ciudad cuando cambia ciudad_id
			 */
			$("#ciudad_id").bind("change", function() {
			    
				ciudad_val=$(this).val();
				ciudad=$('#ciudad_id option[value="' + ciudad_val + '"]').text();
				$('#ciudad').val(ciudad);
			});
			
			
			
			/**
			 * Pone las ciudades cuando cambia estado
			 */
			$("#estado").bind("change", function() {
			    
				$('#ciudad_id').removeAttr("disabled");
				$('#municipio_lista').removeAttr("disabled");
				$('#asentamiento_lista').empty().append("<option value=''>---Selecciona una colonia---</option>").attr("disabled","disabled");
				$('#tipo_asentamiento_id').empty().append("<option value=''>---Selecciona el tipo de colonia---</option>");
				$('#codigo_postal, #municipio, #asentamiento, #ciudad, #estado_manual').val('');
				
				estado = $(this).val();
			    
				$.post(path + "/index.php/directorio/damemunicipios", { 'estado': estado }, function(data){
			        $('#municipio_lista').empty().append(data);
			    });
				
				$.post(path + "/index.php/directorio/dameciudades", { 'estado': estado }, function(data){
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
				
			    $.post(path + "/index.php/directorio/dametipoasentamientos", { 'asentamiento_lista': asentamiento_lista }, function(data){
			    	
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
			    		
			    		$.post(path + "/index.php/directorio/dametipoasentamientos", { 'asentamiento_lista': 'simple' }, function(data){
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
			
				cp = $(this).val();
				
				if (cp.length == 5) {
					
			    $.post(path + "/index.php/directorio/dameubicacion", { 'cp': cp }, function(datos){
	
				if (datos != '0') 
				{
					tags = datos.split("-|-");

					$('#ciudad_id').empty().append("<option value=''>---No esta en una ciudad---</option>").attr("disabled","disabled");
					$('#tipo_asentamiento_id').empty().append("<option value=''>---Selecciona el tipo de colonia---</option>").attr("disabled","disabled");
					
					$('#municipio_lista, #asentamiento_lista').removeAttr("disabled");
	    			$('#sin_cp, #con_ciudad, #sin_ciudad, #con_municipio, #sin_municipio, #con_asentamiento, #sin_asentamiento').slideUp();
	    			
	    			$('#estado_manual').slideUp();
	    			$('#estado').slideDown();
	    			$('#ciudad, #municipio, #asentamiento, #estado_manual').val('');
	    			$('#datos_ciudad, #datos_municipio, #datos_asentamiento').slideUp();
	    			$('.datos_ciudad_id, #datos_municipio_lista, #datos_asentamiento_lista').slideDown();
	    			$('#estado').val('').removeAttr('checked').removeAttr('selected');
	    			
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
