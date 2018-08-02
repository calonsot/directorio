<?php
/* @var $this FormatosController */
/* @var $model Formatos */

$this->breadcrumbs=array(
	'Formatoses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Formatos', 'url'=>array('index')),
	array('label'=>'Manage Formatos', 'url'=>array('admin')),
);
?>

<h1>Create Formatos</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>