<?php
/* @var $this DocumentalController */
/* @var $model Documental */

$this->breadcrumbs=array(
	'Documentals'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Documental', 'url'=>array('index')),
	array('label'=>'Create Documental', 'url'=>array('create')),
	array('label'=>'Update Documental', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Documental', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Documental', 'url'=>array('admin')),
);
?>

<h1>View Documental #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'sigla_institucion',
		'sigla_dependencia',
		'dependencia',
		'subdependencia',
		'actividad',
		'fec_alta',
		'fec_act',
		'usuarios_id',
	),
)); ?>
