<?php
/* @var $this MediosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Medioses',
);

$this->menu=array(
	array('label'=>'Create Medios', 'url'=>array('create')),
	array('label'=>'Manage Medios', 'url'=>array('admin')),
);
?>

<h1>Medioses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
