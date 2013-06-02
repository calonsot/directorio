<?php
/* @var $this CodigoPostalController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Codigo Postals',
);

$this->menu=array(
	array('label'=>'Create CodigoPostal', 'url'=>array('create')),
	array('label'=>'Manage CodigoPostal', 'url'=>array('admin')),
);
?>

<h1>Codigo Postals</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
