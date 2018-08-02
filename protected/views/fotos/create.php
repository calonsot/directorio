<?php
/* @var $this FotosController */
/* @var $model Fotos */

$this->breadcrumbs=array(
	'Fotoses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Fotos', 'url'=>array('index')),
	array('label'=>'Manage Fotos', 'url'=>array('admin')),
);
?>

<h1>Create Fotos</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>