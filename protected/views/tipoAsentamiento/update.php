<?php
/* @var $this TipoAsentamientoController */
/* @var $model TipoAsentamiento */

$this->breadcrumbs=array(
	'Tipo Asentamientos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TipoAsentamiento', 'url'=>array('index')),
	array('label'=>'Create TipoAsentamiento', 'url'=>array('create')),
	array('label'=>'View TipoAsentamiento', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TipoAsentamiento', 'url'=>array('admin')),
);
?>

<h1>Update TipoAsentamiento <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>