<?php
/* @var $this AsentamientoController */
/* @var $model Asentamiento */

$this->breadcrumbs=array(
	'Asentamientos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Asentamiento', 'url'=>array('index')),
	array('label'=>'Create Asentamiento', 'url'=>array('create')),
	array('label'=>'Update Asentamiento', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Asentamiento', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Asentamiento', 'url'=>array('admin')),
);
?>

<h1>View Asentamiento #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
		'fec_alta',
		'fec_act',
		'municipio_id',
		'tipo_asentamiento_id',
	),
)); ?>
