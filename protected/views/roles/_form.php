<?php
/* @var $this RolesController */
/* @var $model Roles */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'roles-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'atributos_base'); ?>
		<?php echo $form->textArea($model,'atributos_base',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'atributos_base'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tabla_base'); ?>
		<?php echo $form->textField($model,'tabla_base',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'tabla_base'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tablas_adicionales'); ?>
		<?php echo $form->textField($model,'tablas_adicionales',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'tablas_adicionales'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'permisos'); ?>
		<?php echo $form->textField($model,'permisos',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'permisos'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tipo_especifico'); ?>
		<?php echo $form->textField($model,'tipo_especifico',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'tipo_especifico'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'usuario_especifico'); ?>
		<?php echo $form->textField($model,'usuario_especifico',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'usuario_especifico'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'admin'); ?>
		<?php echo $form->textField($model,'admin'); ?>
		<?php echo $form->error($model,'admin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'super_usuario'); ?>
		<?php echo $form->textField($model,'super_usuario'); ?>
		<?php echo $form->error($model,'super_usuario'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'fec_alta'); ?>
		<?php //echo $form->textField($model,'fec_alta'); ?>
		<?php //echo $form->error($model,'fec_alta'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'fec_act'); ?>
		<?php //echo $form->textField($model,'fec_act'); ?>
		<?php //echo $form->error($model,'fec_act'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->