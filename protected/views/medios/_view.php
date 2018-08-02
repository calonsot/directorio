<?php
/* @var $this MediosController */
/* @var $data Medios */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('grupo')); ?>:</b>
	<?php echo CHtml::encode($data->grupo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('medio')); ?>:</b>
	<?php echo CHtml::encode($data->medio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_medio')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_medio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('perfil_medio')); ?>:</b>
	<?php echo CHtml::encode($data->perfil_medio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('programa')); ?>:</b>
	<?php echo CHtml::encode($data->programa); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('seccion')); ?>:</b>
	<?php echo CHtml::encode($data->seccion); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('suplemento')); ?>:</b>
	<?php echo CHtml::encode($data->suplemento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('columna')); ?>:</b>
	<?php echo CHtml::encode($data->columna); ?>
	<br />

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