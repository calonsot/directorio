<?php
/* @var $this RolesController */
/* @var $data Roles */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('atributos_base')); ?>:</b>
	<?php echo CHtml::encode($data->atributos_base); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tabla_base')); ?>:</b>
	<?php echo CHtml::encode($data->tabla_base); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tablas_adicionales')); ?>:</b>
	<?php echo CHtml::encode($data->tablas_adicionales); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('permisos')); ?>:</b>
	<?php echo CHtml::encode($data->permisos); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_especifico')); ?>:</b>
	<?php echo CHtml::encode($data->tipo_especifico); ?>
	<br />

	
	<b><?php echo CHtml::encode($data->getAttributeLabel('usuario_especifico')); ?>:</b>
	<?php echo CHtml::encode($data->usuario_especifico); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('admin')); ?>:</b>
	<?php echo CHtml::encode($data->admin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('super_usuario')); ?>:</b>
	<?php echo CHtml::encode($data->super_usuario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fec_alta')); ?>:</b>
	<?php echo CHtml::encode($data->fec_alta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fec_act')); ?>:</b>
	<?php echo CHtml::encode($data->fec_act); ?>
	<br />

	

</div>