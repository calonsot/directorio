<?php
/* @var $this TipoController */
/* @var $model Tipo */

$this->breadcrumbs=array(
	'Tipos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Tipo', 'url'=>array('index')),
	array('label'=>'Create Tipo', 'url'=>array('create')),
	array('label'=>'View Tipo', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Tipo', 'url'=>array('admin')),
);
?>

<h1>Update Tipo <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>