<?php
/* @var $this FotosController */
/* @var $model Fotos */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'fotos-form',
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
		<?php echo $form->labelEx($model,'ruta'); ?>
		<?php echo $form->textField($model,'ruta',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'ruta'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'formato'); ?>
		<?php echo $form->textField($model,'formato',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'formato'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'peso'); ?>
		<?php echo $form->textField($model,'peso',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'peso'); ?>
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

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->