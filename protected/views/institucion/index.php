<?php
/* @var $this InstitucionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Institucions',
);

$this->menu=array(
	array('label'=>'Create Institucion', 'url'=>array('create')),
	array('label'=>'Manage Institucion', 'url'=>array('admin')),
);
?>

<h1>Institucions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
