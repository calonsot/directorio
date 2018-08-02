<?php
/* @var $this CodigoPostalController */
/* @var $model CodigoPostal */

$this->breadcrumbs=array(
	'Codigo Postals'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List CodigoPostal', 'url'=>array('index')),
	array('label'=>'Create CodigoPostal', 'url'=>array('create')),
	array('label'=>'Update CodigoPostal', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CodigoPostal', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CodigoPostal', 'url'=>array('admin')),
);
?>

<h1>View CodigoPostal #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'codigo',
		'fec_alta',
		'fec_act',
		'asentamiento_id',
	),
)); ?>
