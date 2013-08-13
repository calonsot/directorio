
<div id="datos_asistente">
	<div class="row">
		<?php echo $form->labelEx($model,'nombre_asistente'); ?>
		<?php echo $form->textField($model,'nombre_asistente',array('size'=>47,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'nombre_asistente'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'apellido_asistente'); ?>
		<?php echo $form->textField($model,'apellido_asistente',array('size'=>47,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'apellido_asistente'); ?>
	</div>
</div>
