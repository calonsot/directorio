<?php
/* @var $this ListasController */
/* @var $data Listas */
?>

<?php $form=$this->beginWidget('CActiveForm', array(
		'enableAjaxValidation'=>true,
)); ?>


<div class="view">

	<?php echo "<h3>".CHtml::link(CHtml::encode($data->nombre)."</h3>", array('view', 'id'=>$data->id)); ?>
	<b><?php echo CHtml::encode($data->getAttributeLabel('formatos_id')); ?>:</b>
	<?php echo CHtml::encode(Formatos::model()->findByPk((int) $data->formatos_id)->nombre); ?>
	<br /> <b><?php echo CHtml::encode($data->getAttributeLabel('atributos')); ?>:</b>
	<?php echo CHtml::encode($data->atributos); ?>
	<br /> <b><?php echo CHtml::encode($data->getAttributeLabel('esta_activa')); ?>:</b>
	<?php echo CHtml::encode($data->esta_activa) ? 'Sí' : 'No'; ?>
	<br />

	<?php	
	if ($data->cadena != '' && $data->cadena != null) {
	?>
	
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
	
	<br><b><?php echo CHtml::encode($data->getAttributeLabel('fec_alta')); ?>:</b>
	<?php echo CHtml::encode($data->fec_alta); ?>
	
	<br><b><?php echo CHtml::encode($data->getAttributeLabel('fec_act')); ?>:</b>
	<?php echo CHtml::encode($data->fec_act); ?>
	<br>
	
	<?php echo $this->cambiaBoton($data); ?>
	
	<?php $this->endWidget(); ?>

</div>
