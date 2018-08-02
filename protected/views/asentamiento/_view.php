<?php
/* @var $this AsentamientoController */
/* @var $data Asentamiento */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fec_alta')); ?>:</b>
	<?php echo CHtml::encode($data->fec_alta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fec_act')); ?>:</b>
	<?php echo CHtml::encode($data->fec_act); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('municipio_id')); ?>:</b>
	<?php echo CHtml::encode($data->municipio_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_asentamiento_id')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_asentamiento_id); ?>
	<br />


</div>