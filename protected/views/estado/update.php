<?php
/* @var $this EstadoController */
/* @var $model Estado */

$this->breadcrumbs=array(
	'Estados'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Estado', 'url'=>array('index')),
	array('label'=>'Create Estado', 'url'=>array('create')),
	array('label'=>'View Estado', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Estado', 'url'=>array('admin')),
);
?>

<h1>Update Estado <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>