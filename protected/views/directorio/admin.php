<style>
.cargando * {
	display: none;
}

.cargando {
	z-index:1000;
	height:100%;
	width:50%;
	background: #FCFCFC;
	opacity:0.7;
	position: absolute;	
	display: block;
	background-image: url(../../imagenes/aplicacion/cargando.gif);
	background-position: center;
	background-repeat: no-repeat;
}

#notice {
	color: #2E8B57;
}
</style>

<script
	type="text/javascript"
	src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/actualiza_rows.js"></script>
<link
	rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/actualiza_rows.css" />

<h1>Busca y administra tus contactos</h1>

<?php
$this->menu=array(
		//array('label'=>'List Directorio', 'url'=>array('index')),
		array('label'=>'Crea un contacto', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
			$('.search-button').click(function(){
			$('.search-form').toggle();
			return false;
});
			$('.search-form form').submit(function(){
			$('#directorio-grid').yiiGridView('update', {
			data: $(this).serialize()
});
			return false;
});
			");
?>

<?php //$this->widget('application.extensions.email.Debug'); 
//$email = Yii::app()->email;
//$email->to = 'calonso@conabio.gob.mx';
//$email->subject = 'Hello';
//$email->message = 'Hello brother';
//$email->send();
?>

<script type="text/javascript">
jQuery('body').on('click','#elimina_seleccionados',function()
		{
			$('#notice').html('');
			var selecciono=false;
			$("[id^='casillas_']").each(function()
		    {
		                if ($(this).is(':checked'))
		                {
							selecciono=true;
							return false;
		                }
		    });
		
			if (!selecciono) 
			{
				$('#notice').html('Para eliminar algún contacto debes seleccionar al menos uno.');
				return false;
			}
	
			jQuery.ajax({
				beforeSend: function() {
					$('#cargando').addClass('cargando');
				},
				success: function(html){
					$('#cargando').removeClass('cargando');
					$('#notice').html(html);
					$.fn.yiiGridView.update('directorio-grid');
				},
				fail: function(){
					$('#cargando').removeClass('cargando');
					$('#notice').html('Hubo un error al eliminar los contactos, por favor intentalo de nuevo.');					
				}, 								 
				'type':'POST',
				'url':"<?php echo Yii::app()->request->baseUrl; ?>/index.php/directorio/ajaxupdate",
				'cache':false,
				'data':jQuery(this).parents("form").serialize()
				});
			return false;
		});
		
jQuery('body').on('click','#exporta_seleccionados',function()
		{
			$('#notice').html('');
			var selecciono=false;
			$("[id^='casillas_']").each(function()
		    {
		                if ($(this).is(':checked'))
		                {
							selecciono=true;
							return false;
		                }
		    });
		
			if (!selecciono) 
			{
				$('#notice').html('Para exportar los contactos debes seleccionar al menos uno.');
				return false;
			}
	
			jQuery.ajax({
				beforeSend: function() {
					$('#cargando').addClass('cargando');
				},
				success: function(html){
					$('#cargando').removeClass('cargando');
					$('#notice').html(html);
				},
				fail: function(){
					$('#cargando').removeClass('cargando');
					$('#notice').html('Hubo un error al exportar los contactos, por favor intentalo de nuevo.');					
				}, 								 
				'type':'POST',
				'url':"<?php echo Yii::app()->request->baseUrl; ?>/index.php/directorio/exporta",
				'cache':false,
				'data':jQuery(this).parents("form").serialize()
				});
			return false;
		});

jQuery('body').on('click','#exporta_todos',function()
		{
			$('#notice').html('');
	
			jQuery.ajax({
				beforeSend: function() {
					$('#cargando').addClass('cargando');
				},
				success: function(html){
					
					$('#cargando').removeClass('cargando');
					$('#notice').html('<pre>'+html+'</pre>');
				},
				fail: function(){
					$('#cargando').removeClass('cargando');
					$('#notice').html('Hubo un error al exportar los contactos, por favor intentalo de nuevo.');					
				},
				error : function(data) 
                {
					$('#cargando').removeClass('cargando');
					$('#notice').html('Hubo un error al exportar los contactos, por favor intentalo de nuevo.');
                }, 								 
				'type':'GET',
				'url':"<?php echo Yii::app()->request->baseUrl; ?>/index.php/directorio/admin?exporta_todos=1",
				'cache':false,
				'data': jQuery(this).parents("form").serialize()
				});
			return false;
		});
</script>

<div id="cargando"></div>

<?php echo CHtml::link('Búsqueda por varios campos','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display: none;">
	<?php $this->renderPartial('_search',array(
			'model'=>$model,
)); ?>

</div>
<!-- search-form -->

<?php $form=$this->beginWidget('CActiveForm', array(
		'enableAjaxValidation'=>true,
)); ?>

<br>
<div class="CGridViewContainer">
	<?php $this->widget('zii.widgets.grid.CGridView', array(
			'id'=>'directorio-grid',
			'dataProvider'=>$model->search(),
			'filter'=>$model,
			'columns'=>$this->despliegaColumnas(),
	)
); ?>
</div>

<div id="popup_box">
	<!-- OUR PopupBox DIV-->
	<h1>Por favor se cuidadoso con estos cambios.</h1>
	<a id="popupBoxClose">Cerrar</a>
</div>
<br>
<input type="submit" name="elimina_seleccionados" value="Elimina los seleccionados" id="elimina_seleccionados" />
|
<input type="submit" name="exporta_seleccionados" value="Exporta los seleccionados a tu lista" id="exporta_seleccionados" />
|
<input type="submit" name="exporta_todos" value="Exporta todos a tu lista" id="exporta_todos" />
<br><br>
<div id="notice"></div>
<?php $this->endWidget(); ?>
