<?php
/* @var $this DocumentalController */
/* @var $model Documental */

$this->breadcrumbs=array(
	'Documentals'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Documental', 'url'=>array('index')),
	array('label'=>'Create Documental', 'url'=>array('create')),
	array('label'=>'View Documental', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Documental', 'url'=>array('admin')),
);
?>

<h1>Update Documental <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>