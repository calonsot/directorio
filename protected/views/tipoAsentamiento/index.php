<?php
/* @var $this TipoAsentamientoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tipo Asentamientos',
);

$this->menu=array(
	array('label'=>'Create TipoAsentamiento', 'url'=>array('create')),
	array('label'=>'Manage TipoAsentamiento', 'url'=>array('admin')),
);
?>

<h1>Tipo Asentamientos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
