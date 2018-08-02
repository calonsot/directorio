<?php
/* @var $this DocumentalController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Documentals',
);

$this->menu=array(
	array('label'=>'Create Documental', 'url'=>array('create')),
	array('label'=>'Manage Documental', 'url'=>array('admin')),
);
?>

<h1>Documentals</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
