<?php
/* @var $this TipoMediosController */
/* @var $model TipoMedios */

$this->breadcrumbs=array(
	'Tipo Medioses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TipoMedios', 'url'=>array('index')),
	array('label'=>'Manage TipoMedios', 'url'=>array('admin')),
);
?>

<h1>Create TipoMedios</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>