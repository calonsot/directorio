<?php
/* @var $this ListasController */
/* @var $model Listas */
/* @var $form CActiveForm */
?>

<div class="form">

	<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'listas-form',
			'enableAjaxValidation'=>false,
)); ?>

	<p class="note">
		Campos con <span class="required">*</span> son obligatorios.
	</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'formatos_id'); ?>
		<?php echo $form->dropDownList($model, 'formatos_id', CHtml::listData(Formatos::model()->findAll(), 'id', 'nombre')) ?>
		<?php echo $form->error($model,'formatos_id'); ?>
	</div>

	<div class="row">
		<?php echo CHtml::label('¿Quieres poner activa esta lista?','esta_activa'); ?>
		<?php echo $form->checkBox($model, 'esta_activa') ?>
		(Recuerda que solo puedes tener una activa a la vez)
		<?php echo $form->error($model,'esta_activa'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'atributos'); ?>
		<?php echo $form->textArea($model,'atributos',array('rows'=>6, 'cols'=>50, 'id'=>'atributos')); ?>
		<?php echo $form->error($model,'atributos'); ?>
	</div>

	<div id="datos_columnas">
		<?php echo CHtml::label('Columnas para incluir en la lista','columnas'); ?>
		<?php echo CHtml::dropDownList('columnas', '',  $this->columnasTablas(),
				array('id'=>'columnas', 'multiple'=>'multiple', 'size'=>'15')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Guardar'); ?>
	</div>

	<?php $this->endWidget(); ?>

</div>
<!-- form -->
