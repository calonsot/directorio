<?php
/* @var $this AsentamientoController */
/* @var $model Asentamiento */

$this->breadcrumbs=array(
	'Asentamientos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Asentamiento', 'url'=>array('index')),
	array('label'=>'Manage Asentamiento', 'url'=>array('admin')),
);
?>

<h1>Create Asentamiento</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>