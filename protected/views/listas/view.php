<?php
/* @var $this ListasController */
/* @var $model Listas */
/*
$this->breadcrumbs=array(
		'Listases'=>array('index'),
		$model->id,
);*/

$this->menu=array(
		array('label'=>'Crear una lista', 'url'=>array('create')),
		array('label'=>'Editar esta lista', 'url'=>array('update', 'id'=>$model->id)),
		array('label'=>'Borrar esta lista', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
		array('label'=>'Administra tus listas', 'url'=>array('admin')),
);
?>

<h1>
	<?php echo $model->nombre; ?>
</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
		'data'=>$model,
		'attributes'=>array(
		array(
		'name'=>'id',
		'label'=>'Identificador único',
		),
		array(
		'name'=>'formatos_id',
		'value'=>Formatos::model()->findByPk($model->formatos_id)->nombre,
		),
		'esta_activa',
		'cadena',
		'atributos',
		'fec_alta',
		'fec_act',
		'veces_consulta',
	),
)); ?>
