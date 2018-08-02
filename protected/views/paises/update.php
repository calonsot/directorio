<?php
/* @var $this PaisesController */
/* @var $model Paises */

$this->breadcrumbs=array(
	'Paises'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Paises', 'url'=>array('index')),
	array('label'=>'Create Paises', 'url'=>array('create')),
	array('label'=>'View Paises', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Paises', 'url'=>array('admin')),
);
?>

<h1>Update Paises <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>