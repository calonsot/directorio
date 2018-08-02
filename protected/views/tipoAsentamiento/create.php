<?php
/* @var $this TipoAsentamientoController */
/* @var $model TipoAsentamiento */

$this->breadcrumbs=array(
	'Tipo Asentamientos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TipoAsentamiento', 'url'=>array('index')),
	array('label'=>'Manage TipoAsentamiento', 'url'=>array('admin')),
);
?>

<h1>Create TipoAsentamiento</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>