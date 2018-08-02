<?php
/* @var $this InstitucionController */
/* @var $model Institucion */

$this->breadcrumbs=array(
	'Institucions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Institucion', 'url'=>array('index')),
	array('label'=>'Manage Institucion', 'url'=>array('admin')),
);
?>

<h1>Create Institucion</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>