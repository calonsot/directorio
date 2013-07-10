
<div id="datos_medios">
	<div class="row">
		<?php echo $form->labelEx($model_m,'grupos_id'); ?>
		<?php echo $form->dropDownList($model_m, 'grupos_id',  CHtml::listData(Grupos::model()->findAll(array('order'=>'nombre ASC')), 'id', 'nombre'), 
						array('id'=>'grupos_id')); ?>
		<?php echo $form->error($model_m,'grupos_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model_m,'medio'); ?>
		<?php echo $form->textField($model_m,'medio',array('size'=>60,'maxlength'=>255,'id'=>'medio')); ?>
		<?php echo $form->error($model_m,'medio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model_m,'tipo_medios_id'); ?>
		<?php echo $form->dropDownList($model_m, 'tipo_medios_id',  CHtml::listData(TipoMedios::model()->findAll(array('order'=>'nombre ASC')), 'id', 'nombre'), 
						array('id'=>'tipo_medios_id')); ?>
		<?php echo $form->error($model_m,'tipo_medios_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model_m,'perfil_medio'); ?>
		<?php echo $form->textField($model_m,'perfil_medio',array('size'=>60,'maxlength'=>255,'id'=>'perfil_medio')); ?>
		<?php echo $form->error($model_m,'perfil_medio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model_m,'programa'); ?>
		<?php echo $form->textField($model_m,'programa',array('size'=>60,'maxlength'=>255,'id'=>'programa')); ?>
		<?php echo $form->error($model_m,'programa'); ?>
	</div>
</div>
