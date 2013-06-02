<?php
/* @var $this SectorController */
/* @var $model Sector */

$this->breadcrumbs=array(
	'Sectors'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Sector', 'url'=>array('index')),
	array('label'=>'Manage Sector', 'url'=>array('admin')),
);
?>

<h1>Create Sector</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>