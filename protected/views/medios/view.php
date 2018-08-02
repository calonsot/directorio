<?php
/* @var $this MediosController */
/* @var $model Medios */

$this->breadcrumbs=array(
	'Medioses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Medios', 'url'=>array('index')),
	array('label'=>'Create Medios', 'url'=>array('create')),
	array('label'=>'Update Medios', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Medios', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Medios', 'url'=>array('admin')),
);
?>

<h1>View Medios #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'grupo',
		'medio',
		'tipo_medio',
		'perfil_medio',
		'programa',
		'seccion',
		'suplemento',
		'columna',
		'fec_alta',
		'fec_act',
		'usuarios_id',
	),
)); ?>
