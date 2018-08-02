<?php
/* @var $this MediosController */
/* @var $model Medios */
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
		<?php echo $form->label($model,'grupo'); ?>
		<?php echo $form->textField($model,'grupo',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'medio'); ?>
		<?php echo $form->textField($model,'medio',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tipo_medio'); ?>
		<?php echo $form->textField($model,'tipo_medio',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'perfil_medio'); ?>
		<?php echo $form->textField($model,'perfil_medio',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'programa'); ?>
		<?php echo $form->textField($model,'programa',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'seccion'); ?>
		<?php echo $form->textField($model,'seccion',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'suplemento'); ?>
		<?php echo $form->textField($model,'suplemento',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'columna'); ?>
		<?php echo $form->textField($model,'columna',array('size'=>60,'maxlength'=>255)); ?>
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