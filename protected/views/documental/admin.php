<?php
/* @var $this DocumentalController */
/* @var $model Documental */

$this->breadcrumbs=array(
	'Documentals'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Documental', 'url'=>array('index')),
	array('label'=>'Create Documental', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#documental-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Documentals</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'documental-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'grado_academico',
		'sigla_institucion',
		'sigla_dependencia',
		'dependencia',
		'subdependencia',
		/*
		'actividad',
		'fec_alta',
		'fec_act',
		'usuarios_id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
