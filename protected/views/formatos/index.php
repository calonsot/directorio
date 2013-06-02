<?php
/* @var $this FormatosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Formatoses',
);

$this->menu=array(
	array('label'=>'Create Formatos', 'url'=>array('create')),
	array('label'=>'Manage Formatos', 'url'=>array('admin')),
);
?>

<h1>Formatoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
