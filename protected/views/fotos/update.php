<?php
/* @var $this FotosController */
/* @var $model Fotos */

$this->breadcrumbs=array(
	'Fotoses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Fotos', 'url'=>array('index')),
	array('label'=>'Create Fotos', 'url'=>array('create')),
	array('label'=>'View Fotos', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Fotos', 'url'=>array('admin')),
);
?>

<h1>Update Fotos <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>