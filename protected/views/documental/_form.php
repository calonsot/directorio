<?php
/* @var $this DocumentalController */
/* @var $model Documental */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'documental-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
		<?php echo $form->error($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'grado_academico'); ?>
		<?php echo $form->textField($model,'grado_academico',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'grado_academico'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sigla_institucion'); ?>
		<?php echo $form->textField($model,'sigla_institucion',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'sigla_institucion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'sigla_dependencia'); ?>
		<?php echo $form->textField($model,'sigla_dependencia',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'sigla_dependencia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dependencia'); ?>
		<?php echo $form->textField($model,'dependencia',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'dependencia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'subdependencia'); ?>
		<?php echo $form->textField($model,'subdependencia',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'subdependencia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'actividad'); ?>
		<?php echo $form->textField($model,'actividad',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'actividad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fec_alta'); ?>
		<?php echo $form->textField($model,'fec_alta'); ?>
		<?php echo $form->error($model,'fec_alta'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fec_act'); ?>
		<?php echo $form->textField($model,'fec_act'); ?>
		<?php echo $form->error($model,'fec_act'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'usuarios_id'); ?>
		<?php echo $form->textField($model,'usuarios_id'); ?>
		<?php echo $form->error($model,'usuarios_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->