<?php
/* @var $this DocumentalController */
/* @var $data Documental */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('grado_academico')); ?>:</b>
	<?php echo CHtml::encode($data->grado_academico); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sigla_institucion')); ?>:</b>
	<?php echo CHtml::encode($data->sigla_institucion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sigla_dependencia')); ?>:</b>
	<?php echo CHtml::encode($data->sigla_dependencia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dependencia')); ?>:</b>
	<?php echo CHtml::encode($data->dependencia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('subdependencia')); ?>:</b>
	<?php echo CHtml::encode($data->subdependencia); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('actividad')); ?>:</b>
	<?php echo CHtml::encode($data->actividad); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('fec_alta')); ?>:</b>
	<?php echo CHtml::encode($data->fec_alta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fec_act')); ?>:</b>
	<?php echo CHtml::encode($data->fec_act); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuarios_id')); ?>:</b>
	<?php echo CHtml::encode($data->usuarios_id); ?>
	<br />

	*/ ?>

</div>