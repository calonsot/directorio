<?php
/* @var $this CodigoPostalController */
/* @var $model CodigoPostal */

$this->breadcrumbs=array(
	'Codigo Postals'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CodigoPostal', 'url'=>array('index')),
	array('label'=>'Create CodigoPostal', 'url'=>array('create')),
	array('label'=>'View CodigoPostal', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CodigoPostal', 'url'=>array('admin')),
);
?>

<h1>Update CodigoPostal <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>