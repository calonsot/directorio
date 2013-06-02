<?php
/* @var $this MediosController */
/* @var $model Medios */

$this->breadcrumbs=array(
	'Medioses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Medios', 'url'=>array('index')),
	array('label'=>'Create Medios', 'url'=>array('create')),
	array('label'=>'View Medios', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Medios', 'url'=>array('admin')),
);
?>

<h1>Update Medios <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>