<?php
/* @var $this SectorController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Sectors',
);

$this->menu=array(
	array('label'=>'Create Sector', 'url'=>array('create')),
	array('label'=>'Manage Sector', 'url'=>array('admin')),
);
?>

<h1>Sectors</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
