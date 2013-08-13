
<?php if (!$model->isNewRecord) { ?>

<div class="row" style="display: none;">
	<?php echo $form->labelEx($model,'id'); ?>
	<?php echo $form->textField($model,'id',array('size'=>5,'maxlength'=>255)); ?>
	<?php echo $form->error($model,'id'); ?>
</div>
<?php } ?>

<div class="row">
	<?php echo $form->labelEx($model,'nombre', array('id'=>'etiqueta')); ?>
	<span style="color: #FFA500;">*</span><br>
	<?php echo $form->textField($model,'nombre',array('size'=>48,'maxlength'=>255, 'id'=>'nombre')); ?>
	<?php echo $form->error($model,'nombre'); ?>
</div>

<div class="row">
	<?php echo $form->labelEx($model,'apellido', array('id'=>'etiqueta')); ?>
	<span style="color: #FFA500;">*</span><br>
	<?php echo $form->textField($model,'apellido',array('size'=>48,'maxlength'=>255, 'id'=>'apellido')); ?>
	<?php echo $form->error($model,'apellido'); ?>
</div>

<div class="row">
	<?php echo $form->labelEx($model,'institucion', array('id'=>'etiqueta')); ?>
	<span style="color: #FFA500;">*</span><br>
	<?php echo $form->textField($model,'institucion',array('size'=>48,'maxlength'=>255, 'id'=>'institucion')); ?>
	<?php echo $form->error($model,'institucion'); ?>
</div>

<div class="row">
	<?php echo $form->labelEx($model,'grado_academico'); ?>
	<?php echo $form->textField($model,'grado_academico',array('size'=>48,'maxlength'=>255)); ?>
	<?php echo $form->error($model,'grado_academico'); ?>
</div>

<div class="row">
	<?php echo $form->labelEx($model,'puesto'); ?>
	<?php echo $form->textField($model,'puesto',array('size'=>48,'maxlength'=>255)); ?>
	<?php echo $form->error($model,'puesto'); ?>
</div>

<div class="row">
	<?php echo $form->labelEx($model,'adscripcion'); ?>
	<?php echo $form->textField($model,'adscripcion',array('size'=>48,'maxlength'=>255)); ?>
	<?php echo $form->error($model,'adscripcion'); ?>
</div>

<div class="row">
	<?php echo $form->labelEx($model,'sector_id'); ?>
	<?php echo $form->dropDownList($model, 'sector_id',  CHtml::listData(Sector::model()->findAll(array('order'=>'nombre ASC')), 'id', 'nombre'), 
			array('empty'=>'---Selecciona el tipo de sector---', 'id'=>'sector'
				)); ?>
	<?php echo $form->error($model,'sector_id'); ?>
</div>

<div class="row">
	<?php echo $form->labelEx($model,'vip'); ?>
	<?php echo  $form->dropDownList($model, 'vip', array(1=>'1', 2=>'2', 3=>'3', 4=>'4', 5=>'5', 6=>'6', 7=>'7',
			8=>'8', 9=>'9', 10=>'10',
	)) ?>
	<?php echo $form->error($model,'vip'); ?>
</div>

<?php if ($model->isNewRecord) { ?>

<div class="row">
	<?php echo $form->labelEx($model_nuevo_td,'tipo_id'); ?>
	<?php echo $form->dropDownList($model_nuevo_td, 'tipo_id', CHtml::listData(Tipo::model()->findAll(array('order'=>'nombre ASC')), 'id', 'nombre'), 
			array('options'=>array(1=>array('selected'=>'selected')),
				)); ?>
	<?php echo $form->error($model_nuevo_td,'tipo_id'); ?>
</div>

<?php } else {
	$num_tipos=count($model_td);

	if ($num_tipos == 1)
				{ ?>

<div class="row">
	<?php echo $form->labelEx($model_td[0],'[1]tipo_id'); ?>
	<?php echo $form->dropDownList($model_td[0], '[1]tipo_id', CHtml::listData(Tipo::model()->findAll(array('order'=>'nombre ASC')), 'id', 'nombre')); ?>
	<?php echo $form->error($model_td[0],'[1]tipo_id'); ?>
</div>

<?php 
if ($model_td[0]->tipo_id != 1)
{
	?>
<div class="row">
	<?php echo CHtml::label('¿Deseas añadir otro tipo de área?',''); ?>
	<?php echo $form->dropDownList($model_nuevo_td, 'tipo_id',  CHtml::listData(Tipo::model()->findAll(array('order'=>'nombre ASC')), 'id', 'nombre'), 
			array('options'=>array(1=>array('selected'=>'selected')),
							)); ?>
	<?php echo $form->error($model_nuevo_td,'tipo_id'); ?>
</div>
<?php 
}
				} else {

					$orden="id>1 ORDER BY nombre ASC";
					$criteria = new CDbCriteria;
					$criteria->condition=$orden;

					for ($i=0;$i<$num_tipos;$i++)
					{
						if ($i == 0) {
							echo $form->labelEx($model_td[$i],'['.($i+1).']tipo_id');
						}
						?>

<div class="row">
	<?php //echo $form->labelEx($model_td[$i],'['.($i+1).']tipo_id'); ?>
	<?php echo $form->dropDownList($model_td[$i],'['.($i+1).']tipo_id', CHtml::listData(Tipo::model()->findAll($criteria), 'id', 'nombre')); ?>
	<?php echo $form->error($model_td[$i],'['.($i+1).']tipo_id'); ?>
</div>

<?php				
					}
					?>

<div class="row">
	<?php echo CHtml::label('¿Deseas añadir otro tipo de área?',''); ?>
	<?php echo $form->dropDownList($model_nuevo_td, 'tipo_id',  CHtml::listData(Tipo::model()->findAll(array('order'=>'nombre ASC')), 'id', 'nombre'), 
			array('options'=>array(1=>array('selected'=>'selected')),
							)); ?>
	<?php echo $form->error($model_nuevo_td,'tipo_id'); ?>
</div>

<?php 					
				}
}
?>

<div class="row">
	<?php echo $form->labelEx($model,'correo', array('id'=>'etiqueta')); ?>
	<span style="color: #FFA500;">*</span><br>
	<?php echo $form->textField($model,'correo',array('size'=>48,'maxlength'=>255)); ?>

	<div id="datos_correo_repetido" style="display: none">
		Ese correo ya existe en la base.
		<?php echo CHtml::link('Ver','', array('id'=>'enlace_correo_repetido', 'target'=>'blank')); ?>
	</div>

	<?php echo $form->error($model,'correo'); ?>
</div>

<div id="enlace_correos" class="color_enlace">
	<span>+ correos &raquo;</span>
</div>

<div id="datos_correos" style="display: none">
	<div class="row">
		<?php echo $form->labelEx($model,'correo_alternativo', array('id'=>'etiqueta')); ?>
		<span style="color: #FFA500;">*</span><br>
		<?php echo $form->textField($model,'correo_alternativo',array('size'=>48,'maxlength'=>255)); ?>

		<div id="datos_correo_alternativo_repetido" style="display: none">
			Ese correo ya existe en la base.
			<?php echo CHtml::link('Ver','', array('id'=>'enlace_correo_alternativo_repetido', 'target'=>'blank')); ?>
		</div>

		<?php echo $form->error($model,'correo_alternativo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'correos', array('id'=>'etiqueta')); ?>
		<span style="color: #FFA500;">*</span><br>
		<?php echo $form->textArea($model,'correos',array('rows'=>6, 'cols'=>55)); ?>
		<?php echo $form->error($model,'correos'); ?>
	</div>
</div>

<div class="row">
	<?php echo $form->labelEx($model,'telefono_particular', array('id'=>'etiqueta')); ?>
	<span style="color: #FFA500;">*</span><br>
	<?php echo $form->textField($model,'telefono_particular',array('size'=>48,'maxlength'=>255)); ?>
	<?php echo $form->error($model,'telefono_particular'); ?>
</div>

<div id="enlace_telefonos" class="color_enlace">
	<span>+ telefónos &raquo;</span>
</div>

<div id="datos_telefonos" style="display: none">
	<div class="row">
		<?php echo $form->labelEx($model,'telefono_oficina', array('id'=>'etiqueta')); ?>
		<span style="color: #FFA500;">*</span><br>
		<?php echo $form->textField($model,'telefono_oficina',array('size'=>48,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'telefono_oficina'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'telefono_casa', array('id'=>'etiqueta')); ?>
		<span style="color: #FFA500;">*</span><br>
		<?php echo $form->textField($model,'telefono_casa',array('size'=>48,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'telefono_casa'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'telefonos', array('id'=>'etiqueta')); ?>
		<span style="color: #FFA500;">*</span><br>
		<?php echo $form->textArea($model,'telefonos',array('rows'=>6, 'cols'=>55)); ?>
		<?php echo $form->error($model,'telefonos'); ?>
	</div>
</div>

<div class="row">
	<?php echo $form->labelEx($model,'pagina'); ?>
	<?php echo $form->textField($model,'pagina',array('size'=>48,'maxlength'=>255)); ?>
	<?php echo $form->error($model,'pagina'); ?>
</div>

<div class="row">
	<?php echo $form->labelEx($model,'red_social'); ?>
	<?php echo $form->textField($model,'red_social',array('size'=>48,'maxlength'=>255)); ?>
	<?php echo $form->error($model,'red_social'); ?>
</div>

<div class="row">
	<?php echo $form->labelEx($model,'observaciones'); ?>
	<?php echo $form->textArea($model,'observaciones',array('rows'=>6, 'cols'=>55)); ?>
	<?php echo $form->error($model,'observaciones'); ?>
</div>
