
<div class="row">
	<table>
		<tr>
			<td width="20%"><?php echo $form->labelEx($model,'es_internacional', array('id'=>'etiqueta')); ?>
				<?php echo $form->checkBox($model,'es_internacional'); ?> <?php echo $form->error($model,'es_internacional'); ?>
			</td>
			<td width="20%"><?php echo $form->labelEx($model,'es_institucion', array('id'=>'etiqueta')); ?>
				<?php echo $form->checkBox($model,'es_institucion'); ?> <?php echo $form->error($model,'es_institucion'); ?>
			</td>
			<td width="20%"><?php echo $form->labelEx($model,'domicilio_alt_principal', array('id'=>'etiqueta')); ?>
				<?php echo $form->checkBox($model,'domicilio_alt_principal'); ?> <?php echo $form->error($model,'domicilio_alt_principal'); ?>
			</td>
		</tr>
	</table>
</div>
