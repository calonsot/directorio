<?php
/* @var $this PaisesController */
/* @var $model Paises */

$this->breadcrumbs=array(
	'Paises'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Paises', 'url'=>array('index')),
	array('label'=>'Manage Paises', 'url'=>array('admin')),
);
?>

<h1>Create Paises</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>