<?php
/* @var $this UsuariosController */
/* @var $model Usuarios */
/*
$this->breadcrumbs=array(
	//'Usuarios'=>array('index'),
	'Mi cuenta',
);*/

$this->pageTitle=Yii::app()->name . ' - Mi cuenta';

if ($this->verificaLogin(true) == $model->id) {
	
$this->menu=array(
	//array('label'=>'Lista de usuarios', 'url'=>array('index')),
	//array('label'=>'Registrarse', 'url'=>array('create')),
	array('label'=>'Edita tu cuenta', 'url'=>array('update', 'id'=>$model->id)),
	//array('label'=>'Borra usuarios', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Administra usuarios', 'url'=>array('admin')),
);
}
?>

<h1><?php echo $model->nombre.' '.$model->apellido; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'id',
		'usuario',
		'email',
		//'passwd',
		'nombre',
		'apellido',
		'fec_alta',
		'fec_act',
		//'roles_id',
	),
)); ?>
