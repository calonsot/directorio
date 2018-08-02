<?php
/* @var $this PaisesController */
/* @var $model Paises */

$this->breadcrumbs=array(
	'Paises'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Paises', 'url'=>array('index')),
	array('label'=>'Create Paises', 'url'=>array('create')),
	array('label'=>'Update Paises', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Paises', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Paises', 'url'=>array('admin')),
);
?>

<h1>View Paises #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
		'sigla',
		'fec_alta',
		'fec_act',
	),
)); ?>
