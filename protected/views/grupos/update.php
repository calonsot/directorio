<?php
/* @var $this GruposController */
/* @var $model Grupos */

$this->breadcrumbs=array(
	'Gruposes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Grupos', 'url'=>array('index')),
	array('label'=>'Create Grupos', 'url'=>array('create')),
	array('label'=>'View Grupos', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Grupos', 'url'=>array('admin')),
);
?>

<h1>Update Grupos <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>