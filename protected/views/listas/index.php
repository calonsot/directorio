<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/crea_lista.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/muestra_listas.css" />

<?php
/* @var $this ListasController */
/* @var $dataProvider CActiveDataProvider */

/*
$this->breadcrumbs=array(
	'Listases',
);
*/

$this->menu=array(
	array('label'=>'Crear una lista', 'url'=>array('create')),
	array('label'=>'Administra tus listas', 'url'=>array('admin')),
);
?>

<h1>Listas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
