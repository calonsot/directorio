<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/crea_contacto.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/crea_contacto.css" />

<?php
/* @var $this DirectorioController */
/* @var $model Directorio */
/*
$this->breadcrumbs=array(
	//'Directorios'=>array('index'),
	'Crea un contacto',
);*/

$this->menu=array(
	//array('label'=>'List Directorio', 'url'=>array('index')),
	array('label'=>'Administra tus contactos', 'url'=>array('admin')),
);
?>

<h1>Crea un contacto</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'model_m'=>$model_m, 'model_c'=>$model_c, 'model_f'=>$model_f,)); ?>