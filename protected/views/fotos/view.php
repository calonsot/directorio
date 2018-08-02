<?php
/* @var $this FotosController */
/* @var $model Fotos */

$this->breadcrumbs=array(
	'Fotoses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Fotos', 'url'=>array('index')),
	array('label'=>'Create Fotos', 'url'=>array('create')),
	array('label'=>'Update Fotos', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Fotos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Fotos', 'url'=>array('admin')),
);
?>

<h1>View Fotos #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
		'ruta',
		'formato',
		'peso',
		'fec_alta',
		'fec_act',
	),
)); ?>
