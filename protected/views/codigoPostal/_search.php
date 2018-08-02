<?php
/* @var $this CodigoPostalController */
/* @var $model CodigoPostal */
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
		<?php echo $form->label($model,'codigo'); ?>
		<?php echo $form->textField($model,'codigo'); ?>
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
		<?php echo $form->label($model,'asentamiento_id'); ?>
		<?php echo $form->textField($model,'asentamiento_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->