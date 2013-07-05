<?php
/* @var $this GruposController */
/* @var $model Grupos */

$this->breadcrumbs=array(
	'Gruposes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Grupos', 'url'=>array('index')),
	array('label'=>'Manage Grupos', 'url'=>array('admin')),
);
?>

<h1>Create Grupos</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>