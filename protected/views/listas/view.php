<script type="text/javascript"
	src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/crea_lista.js"></script>
<link
	rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/muestra_listas.css" />

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

<?php $form=$this->beginWidget('CActiveForm', array(
		'enableAjaxValidation'=>true,
)); ?>

<h1>
	<?php echo $model->nombre; ?>
</h1>


<?php $this->widget('zii.widgets.CDetailView', array(
		'data'=>$model,
		'attributes'=>array(
		array(
		'header'=>'',
		'type'=>'raw',
		'value'=>$this->cambiaBoton($model)
		),
		//array(
		//'name'=>'id',
		//'label'=>'Identificador único',
		//),
		array(
		'name'=>'formatos_id',
		'value'=>Formatos::model()->findByPk($model->formatos_id)->nombre,
		),
		array(
		'name'=>'esta_activa',
		'value'=>$model->esta_activa ? 'Sí': 'No'
		),
		'fec_alta',
		'fec_act',
		//'veces_consulta',
		array(
			'header'=>'',
			'type'=>'raw',
			'value'=>CHtml::link('Descarga esta lista', Yii::app()->createUrl('listas/imprimelista?id='.$model->id), array('class'=>'exporta_lista'))
		),
		//'atributos',
		array(
			'name'=>'cadena',
			'value'=>$this->ponDatosContactos($model, true),
			'type'=>'raw',
		),
	),
));

echo '<br>Predeterminadamente solo despliega los primeros 100 contactos, si deseas ver todos, por favor descarga la lista.';

$this->endWidget(); ?>
