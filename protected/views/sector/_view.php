<?php
/* @var $this SectorController */
/* @var $data Sector */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idsector')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idsector), array('view', 'id'=>$data->idsector)); ?>
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


</div>