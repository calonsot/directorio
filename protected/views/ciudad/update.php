<?php
/* @var $this CiudadController */
/* @var $model Ciudad */

$this->breadcrumbs=array(
	'Ciudads'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Ciudad', 'url'=>array('index')),
	array('label'=>'Create Ciudad', 'url'=>array('create')),
	array('label'=>'View Ciudad', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Ciudad', 'url'=>array('admin')),
);
?>

<h1>Update Ciudad <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>