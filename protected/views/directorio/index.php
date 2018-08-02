<?php
/* @var $this DirectorioController */
/* @var $dataProvider CActiveDataProvider */

//$this->breadcrumbs=array(
	//'Lista del directorio',
//);

/*
$this->menu=array(
		//'type'=>'raw',
		'encodeLabel'=>false,
		//'items'=>array(
		//		array('label'=>'<img src="'.Yii::app()->request->baseUrl.'/imagenes/aplicacion/abstract/plus_green.png" width="30px;"/> Crear un contacto', 'url'=>array('create')),
		array('label'=>'<img src="'.Yii::app()->request->baseUrl.'/imagenes/aplicacion/abstract/plus_green.png" />', 'url'=>array('create')
		
));*/


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


