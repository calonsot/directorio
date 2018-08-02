<?php
/* @var $this FormatosController */
/* @var $model Formatos */

$this->breadcrumbs=array(
	'Formatoses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Formatos', 'url'=>array('index')),
	array('label'=>'Create Formatos', 'url'=>array('create')),
	array('label'=>'Update Formatos', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Formatos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Formatos', 'url'=>array('admin')),
);
?>

<h1>View Formatos #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
		'fec_alta',
		'fec_act',
	),
)); ?>
