<?php
/* @var $this AsentamientoController */
/* @var $model Asentamiento */

$this->breadcrumbs=array(
	'Asentamientos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Asentamiento', 'url'=>array('index')),
	array('label'=>'Create Asentamiento', 'url'=>array('create')),
	array('label'=>'View Asentamiento', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Asentamiento', 'url'=>array('admin')),
);
?>

<h1>Update Asentamiento <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>