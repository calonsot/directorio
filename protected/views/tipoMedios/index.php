<?php
/* @var $this TipoMediosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tipo Medioses',
);

$this->menu=array(
	array('label'=>'Create TipoMedios', 'url'=>array('create')),
	array('label'=>'Manage TipoMedios', 'url'=>array('admin')),
);
?>

<h1>Tipo Medioses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
