<?php
/* @var $this TipoMediosController */
/* @var $model TipoMedios */

$this->breadcrumbs=array(
	'Tipo Medioses'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TipoMedios', 'url'=>array('index')),
	array('label'=>'Create TipoMedios', 'url'=>array('create')),
	array('label'=>'Update TipoMedios', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TipoMedios', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TipoMedios', 'url'=>array('admin')),
);
?>

<h1>View TipoMedios #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
		'fec_alta',
		'fec_act',
	),
)); ?>
