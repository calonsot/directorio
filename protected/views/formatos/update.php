<?php
/* @var $this FormatosController */
/* @var $model Formatos */

$this->breadcrumbs=array(
	'Formatoses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Formatos', 'url'=>array('index')),
	array('label'=>'Create Formatos', 'url'=>array('create')),
	array('label'=>'View Formatos', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Formatos', 'url'=>array('admin')),
);
?>

<h1>Update Formatos <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>