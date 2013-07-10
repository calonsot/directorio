<?php
/* @var $this ListasController */
/* @var $data Listas */
?>

<script>
function reloadGrid(data) {
    location.reload();
}
</script>


<?php $form=$this->beginWidget('CActiveForm', array(
		'enableAjaxValidation'=>true,
)); ?>


<div class="view">

	<?php echo CHtml::link(CHtml::encode($data->nombre), array('view', 'id'=>$data->id)); ?>
	<br /> <b><?php echo CHtml::encode($data->getAttributeLabel('atributos')); ?>:</b>
	<?php echo CHtml::encode($data->atributos); ?>
	<br /> <b><?php echo CHtml::encode($data->getAttributeLabel('esta_activa')); ?>:</b>
	<?php echo CHtml::encode($data->esta_activa) ? 'Sí' : 'No'; ?>
	<br />

	<?php	
	if ($data->cadena != '' && $data->cadena != null) {
	?>

	<b><?php echo CHtml::encode($data->getAttributeLabel('cadena')); ?>:</b>
	<?php echo CHtml::encode($this->ponDatosContactos($data)); ?>
	<br />
	<?php 
	echo CHtml::link('Descarga esta lista', Yii::app()->createUrl('listas/imprimelista?id='.$data->id), array('class'=>'exporta_lista'));
	echo "<br>";

	} else {
	?>

	<b><?php echo CHtml::encode($data->getAttributeLabel('cadena')); ?>:</b>
	<?php echo CHtml::encode($data->cadena); ?>
	<br />
	<?php } ?>

	<b><?php echo CHtml::encode($data->getAttributeLabel('veces_consulta')); ?>:</b>
	<?php echo CHtml::encode($data->veces_consulta); ?>

	<?php if (!$data->esta_activa) { ?>

	<br>
		<?php echo CHtml::ajaxSubmitButton('Activar',array('listas/activa','id'=>$data->id), 
		array('success'=>'reloadGrid')); ?>
	
	<?php } else { ?>
	<br>
	
		<?php echo CHtml::ajaxSubmitButton('Activar',array('listas/activa','id'=>$data->id), 
		array('success'=>'reloadGrid'), array('disabled'=>'disabled')); ?>
	

	<?php } ?>
	<?php $this->endWidget(); ?>

</div>
