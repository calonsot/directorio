<?php
/* @var $this TipoAsentamientoController */
/* @var $model TipoAsentamiento */

$this->breadcrumbs=array(
	'Tipo Asentamientos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TipoAsentamiento', 'url'=>array('index')),
	array('label'=>'Create TipoAsentamiento', 'url'=>array('create')),
	array('label'=>'Update TipoAsentamiento', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TipoAsentamiento', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TipoAsentamiento', 'url'=>array('admin')),
);
?>

<h1>View TipoAsentamiento #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
		'fec_alta',
		'fec_act',
	),
)); ?>
