<?php
/* @var $this MunicipioController */
/* @var $model Municipio */

$this->breadcrumbs=array(
	'Municipios'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Municipio', 'url'=>array('index')),
	array('label'=>'Create Municipio', 'url'=>array('create')),
	array('label'=>'View Municipio', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Municipio', 'url'=>array('admin')),
);
?>

<h1>Update Municipio <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>