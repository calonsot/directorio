<?php
/* @var $this MediosController */
/* @var $model Medios */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'medios-form',
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
		<?php echo $form->labelEx($model,'grupo'); ?>
		<?php echo $form->textField($model,'grupo',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'grupo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'medio'); ?>
		<?php echo $form->textField($model,'medio',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'medio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tipo_medio'); ?>
		<?php echo $form->textField($model,'tipo_medio',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'tipo_medio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'perfil_medio'); ?>
		<?php echo $form->textField($model,'perfil_medio',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'perfil_medio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'programa'); ?>
		<?php echo $form->textField($model,'programa',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'programa'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'seccion'); ?>
		<?php echo $form->textField($model,'seccion',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'seccion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'suplemento'); ?>
		<?php echo $form->textField($model,'suplemento',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'suplemento'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'columna'); ?>
		<?php echo $form->textField($model,'columna',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'columna'); ?>
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