<h1>Busca y administra tus contactos</h1>

<?php
/* @var $this DirectorioController */
/* @var $model Directorio */

/*
 $this->breadcrumbs=array(
 		//'Directorios'=>array('index'),
 		'Búsqueda de contactos',
 );*/

$this->menu=array(
		//array('label'=>'List Directorio', 'url'=>array('index')),
		array('label'=>'Crea un contacto', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
		$('.search-button').click(function(){
		$('.search-form').toggle();
		return false;
});
		$('.search-form form').submit(function(){
		$('#directorio-grid').yiiGridView('update', {
		data: $(this).serialize()
});
		return false;
});
		");
?>

<?php //$this->widget('application.extensions.email.Debug'); 
//$email = Yii::app()->email;
//$email->to = 'calonso@conabio.gob.mx';
//$email->subject = 'Hello';
//$email->message = 'Hello brother';
//$email->send();
?>

<script>
function reloadGrid(data) {
    $.fn.yiiGridView.update('directorio-grid');
    alert('Los contactos se exportarón');
}

function reloadGridBorro(data) {
    $.fn.yiiGridView.update('directorio-grid');
    alert('Los contactos han sido eliminados');
}
</script>

<!--p>
Puedes poner al inicio de tu búsqueda operadores de comparación (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>).
</p-->

<?php echo CHtml::link('Búsqueda por varios campos','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display: none;">
	<?php $this->renderPartial('_search',array(
			'model'=>$model,
)); ?>

</div>
<!-- search-form -->

<?php $form=$this->beginWidget('CActiveForm', array(
		'enableAjaxValidation'=>true,
)); ?>

<div class="CGridViewContainer">
<?php $this->widget('zii.widgets.grid.CGridView', array(
		'id'=>'directorio-grid',
		'dataProvider'=>$model->search(),
		'filter'=>$model,
		'columns'=>$this->despliegaColumnas(),
		)
); ?>
</div>

<?php echo CHtml::ajaxSubmitButton('Eliminar',array('directorio/ajaxupdate','act'=>'doDelete'), 
		array('beforeSend'=>'function() { if(confirm("¿Estás seguro de querer eliminar permanentemente estos elementos?")) return true; return false; }', 'success'=>'reloadGridBorro')); ?>
<?php echo CHtml::ajaxSubmitButton('Exporta a tu lista',array('directorio/exporta'), 
		array('success'=>'reloadGrid')); ?>
<?php $this->endWidget(); ?>