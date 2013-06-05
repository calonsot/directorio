<?php
/* @var $this DirectorioController */
/* @var $dataProvider CActiveDataProvider */

//$this->breadcrumbs=array(
	//'Lista del directorio',
//);

$this->menu=array(
	array('label'=>'Crea un contacto', 'url'=>array('create')),
	array('label'=>'¿Buscas un contacto?', 'url'=>array('admin')),
);
?>

<h1>Contactos más vistos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>


