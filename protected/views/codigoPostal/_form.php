<?php
/* @var $this CodigoPostalController */
/* @var $model CodigoPostal */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'codigo-postal-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'codigo'); ?>
		<?php echo $form->textField($model,'codigo'); ?>
		<?php echo $form->error($model,'codigo'); ?>
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
		<?php echo $form->labelEx($model,'asentamiento_id'); ?>
		<?php echo $form->textField($model,'asentamiento_id'); ?>
		<?php echo $form->error($model,'asentamiento_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->