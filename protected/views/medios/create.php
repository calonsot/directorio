<?php
/* @var $this MediosController */
/* @var $model Medios */

$this->breadcrumbs=array(
	'Medioses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Medios', 'url'=>array('index')),
	array('label'=>'Manage Medios', 'url'=>array('admin')),
);
?>

<h1>Create Medios</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>