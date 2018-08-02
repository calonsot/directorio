<?php
/* @var $this CodigoPostalController */
/* @var $model CodigoPostal */

$this->breadcrumbs=array(
	'Codigo Postals'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CodigoPostal', 'url'=>array('index')),
	array('label'=>'Manage CodigoPostal', 'url'=>array('admin')),
);
?>

<h1>Create CodigoPostal</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>