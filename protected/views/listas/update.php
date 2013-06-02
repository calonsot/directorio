<script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/crea_lista.js"></script>

<?php
/* @var $this ListasController */
/* @var $model Listas */

$this->breadcrumbs=array(
	'Listases'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Listas', 'url'=>array('index')),
	array('label'=>'Create Listas', 'url'=>array('create')),
	array('label'=>'View Listas', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Listas', 'url'=>array('admin')),
);
?>

<h1>Update Listas <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>