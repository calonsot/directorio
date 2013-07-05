<?php
/* @var $this TipoMediosController */
/* @var $model TipoMedios */

$this->breadcrumbs=array(
	'Tipo Medioses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TipoMedios', 'url'=>array('index')),
	array('label'=>'Create TipoMedios', 'url'=>array('create')),
	array('label'=>'View TipoMedios', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TipoMedios', 'url'=>array('admin')),
);
?>

<h1>Update TipoMedios <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>