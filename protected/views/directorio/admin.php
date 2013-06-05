<?php
/* @var $this DirectorioController */
/* @var $model Directorio */

/*
 $this->breadcrumbs=array(
 		//'Directorios'=>array('index'),
 		'Búsqueda de contactos',
 );*/

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

<script>
function reloadGrid(data) {
    $.fn.yiiGridView.update('directorio-grid');
    alert('Los contactos se exportarón');
}

function reloadGridBorro(data) {
    $.fn.yiiGridView.update('directorio-grid');
    alert('Los contactos han sido eliminados');
}
</script>

<h1>Busca y administra tus contactos</h1>

<!--p>
Puedes poner al inicio de tu búsqueda operadores de comparación (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>).
</p-->

<?php echo CHtml::link('Búsqueda depurada','#',array('class'=>'search-button')); ?>
<div class="search-form">
	<?php $this->renderPartial('_search',array(
			'model'=>$model,
)); ?>

</div>
<!-- search-form -->

<?php $form=$this->beginWidget('CActiveForm', array(
		'enableAjaxValidation'=>true,
)); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'directorio-grid',
		'dataProvider'=>$model->search(),
		'filter'=>$model,
		'columns'=>array(
				array(
						'id'=>'casillas',
						'class'=>'CCheckBoxColumn',
						'selectableRows' => '50000',
				),
				//'id',
				array(
						'name'=>'es_internacional',
						'header'=>'¿Int?',
						'filter'=>array('1'=>'Sí','0'=>'No'),
						'value'=>'($data->es_internacional=="1")?("Sí"):("No")',
				),
				array(
						'name'=>'es_institucion',
						'header'=>'¿Inst?',
						'filter'=>array('1'=>'Sí','0'=>'No'),
						'value'=>'($data->es_institucion=="1")?("Sí"):("No")',
				),
				'nombre',
				'apellido',
				'institucion',
				'correo',
				//'correo_alternativo',
				//'correos',
				'telefono_particular',
				//'telefono_oficina',
				//'telefono_casa',
				//'telefonos',
				//'puesto',
				//'nombre_asistente',
				//'apellido_asistente',
				//'pagina',
				//'direccion',
				//'direccion_alternativa',
				//'asentamiento',
				//'asentamiento_alternativo',
				//'municipio',
				//'municipio_alternativo',
				//'ciudad',
				//'ciudad_alternativa',
				array(
                'name'=>"estado",
                'filter'=>CHtml::listData(Estado::model()->findAll(), 'id', 'nombre'),
				'value'=>'Controller::situacionEstado($data->estado)',
                ),
				/*array(
				 'name'=>"estado",
						//'filter'=>CHtml::listData(Estado::model()->findAll(), 'id', 'nombre'),
						'value'=>$this->renderPrueba(),
				),*/
				//'cp',
				//'cp_alternativo',
				//'observaciones',
				//'veces_consulta',
				//'fec_alta',
				//'fec_act',
				//'tipo_id',
				array(
                'name'=>"tipo_id",
                'filter'=>CHtml::listData(Tipo::model()->findAll(array('order'=>'nombre ASC')), 'id', 'nombre'),
				'value'=>'Tipo::model()->findByPk($data->tipo_id)->nombre',
               	),
				array(
						'name'=>"usuarios_id",
						'filter'=>CHtml::listData(Usuarios::model()->findAll(), 'id', 'usuario'),
						'value'=>'Usuarios::model()->findByPk($data->usuarios_id)->usuario',
				),
		//'institucion_id',
		//'sector_idsector',
		//'paises_id',
		//'paises_id1',
		//'ciudad_id',
		//'ciudad_id1',
		//'fotos_id',
		//'codigo_postal_id',
		//'codigo_postal_id1',
		//'tipo_asentamiento_id',
		//'tipo_asentamiento_id1',
		array(
			'class'=>'CButtonColumn',
		),
		),
)); ?>


<?php echo CHtml::ajaxSubmitButton('Eliminar',array('directorio/ajaxupdate','act'=>'doDelete'), 
		array('beforeSend'=>'function() { if(confirm("¿Estás seguro de querer eliminar permanentemente estos elementos?")) return true; return false; }', 'success'=>'reloadGridBorro')); ?>
<?php echo CHtml::ajaxSubmitButton('Exporta a tu lista',array('directorio/exporta'), 
		array('success'=>'reloadGrid')); ?>
<?php $this->endWidget(); ?>