<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/crea_lista.js"></script>

<?php
/* @var $this ListasController */
/* @var $model Listas */
/*
$this->breadcrumbs=array(
	'Listases'=>array('index'),
	'Create',
);*/

$this->menu=array(
	array('label'=>'Administra tus listas', 'url'=>array('admin')),
);
?>

<h1>Crea una lista</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'columnas'=>$columnas,)); ?>