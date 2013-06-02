<?php
/* @var $this DocumentalController */
/* @var $model Documental */

$this->breadcrumbs=array(
	'Documentals'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Documental', 'url'=>array('index')),
	array('label'=>'Manage Documental', 'url'=>array('admin')),
);
?>

<h1>Create Documental</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>