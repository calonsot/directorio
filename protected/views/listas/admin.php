<?php
/* @var $this ListasController */
/* @var $model Listas */
/*
$this->breadcrumbs=array(
	'Listases'=>array('index'),
	'Manage',
);*/

$this->menu=array(
	//array('label'=>'List Listas', 'url'=>array('index')),
	array('label'=>'Crear una lista', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#listas-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administra tus listas</h1>


<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php //$this->renderPartial('_search',array(
	//'model'=>$model,
//)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'listas-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'esta_activa',
		'id',
		'nombre',
		'cadena',
		'atributos',
		'fec_alta',
		'fec_act',
		/*
		'usuarios_id',
		'formatos_id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
