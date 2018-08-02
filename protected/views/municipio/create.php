<?php
/* @var $this MunicipioController */
/* @var $model Municipio */

$this->breadcrumbs=array(
	'Municipios'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Municipio', 'url'=>array('index')),
	array('label'=>'Manage Municipio', 'url'=>array('admin')),
);
?>

<h1>Create Municipio</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>