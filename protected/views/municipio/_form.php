<?php
/* @var $this MunicipioController */
/* @var $model Municipio */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'municipio-form',
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
		<?php echo $form->labelEx($model,'estado_id'); ?>
		<?php echo $form->textField($model,'estado_id'); ?>
		<?php echo $form->error($model,'estado_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'ciudad_id'); ?>
		<?php echo $form->textField($model,'ciudad_id'); ?>
		<?php echo $form->error($model,'ciudad_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->