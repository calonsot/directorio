<?php
/* @var $this RolesController */
/* @var $model Roles */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'atributos_base'); ?>
		<?php echo $form->textArea($model,'atributos_base',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tabla_base'); ?>
		<?php echo $form->textField($model,'tabla_base',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tablas_adicionales'); ?>
		<?php echo $form->textField($model,'tablas_adicionales',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'permisos'); ?>
		<?php echo $form->textField($model,'permisos',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tipo_especifico'); ?>
		<?php echo $form->textField($model,'tipo_especifico',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'usuario_especifico'); ?>
		<?php echo $form->textField($model,'usuario_especifico',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'admin'); ?>
		<?php echo $form->textField($model,'admin'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'super_usuario'); ?>
		<?php echo $form->textField($model,'super_usuario'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fec_alta'); ?>
		<?php echo $form->textField($model,'fec_alta'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fec_act'); ?>
		<?php echo $form->textField($model,'fec_act'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->