<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/crea_lista.js"></script>

<?php
/* @var $this ListasController */
/* @var $model Listas */
/*
$this->breadcrumbs=array(
	'Listases'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);*/

$this->menu=array(
	//array('label'=>'List Listas', 'url'=>array('index')),
	array('label'=>'Crea una lista', 'url'=>array('create')),
	array('label'=>'Ver el contenido de la lista', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'¿Buscas una lista?', 'url'=>array('admin')),
);
?>

<h1><?php echo $model->nombre; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>