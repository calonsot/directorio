<?php
/* @var $this PaisesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Paises',
);

$this->menu=array(
	array('label'=>'Create Paises', 'url'=>array('create')),
	array('label'=>'Manage Paises', 'url'=>array('admin')),
);
?>

<h1>Paises</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
