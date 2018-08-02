<?php
/* @var $this DocumentalController */
/* @var $model Documental */
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
		<?php echo $form->label($model,'grado_academico'); ?>
		<?php echo $form->textField($model,'grado_academico',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sigla_institucion'); ?>
		<?php echo $form->textField($model,'sigla_institucion',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sigla_dependencia'); ?>
		<?php echo $form->textField($model,'sigla_dependencia',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dependencia'); ?>
		<?php echo $form->textField($model,'dependencia',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'subdependencia'); ?>
		<?php echo $form->textField($model,'subdependencia',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'actividad'); ?>
		<?php echo $form->textField($model,'actividad',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fec_alta'); ?>
		<?php echo $form->textField($model,'fec_alta'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fec_act'); ?>
		<?php echo $form->textField($model,'fec_act'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'usuarios_id'); ?>
		<?php echo $form->textField($model,'usuarios_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->