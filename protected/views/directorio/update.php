<script>
	path = "<?php echo Yii::app()->request->baseUrl; ?>";
</script>

<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/crea_contacto.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/domicilio.js"></script>
<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/domicilio_alternativo.js"></script>

<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/crea_contacto.css" />

<?php
/* @var $this DirectorioController */
/* @var $model Directorio */
/*
$this->breadcrumbs=array(
	//'Directorios'=>array('index'),
	//$model->id=>array('view','id'=>$model->id),
	'Actualiza contacto',
);*/

$this->menu=array(
	//array('label'=>'List Directorio', 'url'=>array('index')),
	array('label'=>'Crea un contacto', 'url'=>array('create')),
	array('label'=>'Ve la información de este contacto', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Elimina este contacto', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Estás seguro que deseas eliminar este contacto?')),
	array('label'=>'¿Buscas otro contacto?', 'url'=>array('admin')),
);
?>

<h1>
<?php 
echo $model->grado_academico.' '.DirectorioController::personaoInstitucion($model); 
?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model, 'model_m'=>$model_m, 'model_c'=>$model_c, 
		'model_f'=>$model_f, 'model_td'=>$model_td, 'model_nuevo_td'=>$model_nuevo_td, 'datos'=>$datos)); ?>
