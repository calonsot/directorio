<?php
/* @var $this DirectorioController */
/* @var $model Directorio */
/* @var $form CActiveForm */
?>

<div class="form">

	<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'directorio-form',
			'enableAjaxValidation'=>false,
			'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">
		Campos con <span style="color: #FFA500;">*</span> se necesita al menos un campo.
	</p>

	<?php echo $form->errorSummary($model); ?>

	<br><br>

	<table width="100%">
		<tr>
			<td width="50%">

				<fieldset class="todos_los_campos">
					<legend>
						<h2>Datos Principales</h2>
					</legend>
					<?php if ($model->isNewRecord) { ?>
					<?php $this->renderPartial('_datos_principales',array(
							'model'=>$model, 'model_f'=>$model_f, 'model_nuevo_td'=>$model_nuevo_td,
							'form'=>$form,
					)); ?>

					<?php } else { ?>
					<?php $this->renderPartial('_datos_principales',array(
							'model'=>$model, 'model_f'=>$model_f, 'model_nuevo_td'=>$model_nuevo_td,
							'model_td'=>$model_td, 'form'=>$form,
					)); ?>

					<?php } ?>
				</fieldset>

				<fieldset class="todos_los_campos">
					<legend>
						<h2>Datos del asistente</h2>
					</legend>
					<?php $this->renderPartial('_asistente',array(
							'model'=>$model, 'form'=>$form,
					)); ?>
				</fieldset>
			</td>
			<td width="50%"><?php $tablas=explode(",", trim($datos['tablas_adicionales'])); ?>
				<?php if ($datos['super_usuario']==1 || in_array("biodiversitas", $tablas)) { ?>
				<fieldset class="todos_los_campos">
					<legend>
						<h2>Biodiversitas</h2>
					</legend>
					<?php $this->renderPartial('_biodiversitas',array(
							'model_c'=>$model_c, 'form'=>$form, 'tablas'=>$tablas, 'datos'=>$datos,
					)); ?>
				</fieldset> <?php  } ?> <?php if ($datos['super_usuario']==1 || in_array("medios", $tablas)) { ?>
				<fieldset class="todos_los_campos">
					<legend>
						<h2>Medios</h2>
					</legend>
					<?php $this->renderPartial('_medios',array(
							'model_m'=>$model_m, 'form'=>$form,
					)); ?>
				</fieldset> <?php  } ?>

				<fieldset class="todos_los_campos">
					<legend>
						<h2>Domicilio</h2>
					</legend>
					<?php $this->renderPartial('_domicilio',array(
							'model'=>$model, 'form'=>$form,
					)); ?>
				</fieldset>

				<fieldset class="todos_los_campos">
					<legend>
						<h2>Domicilio alternativo</h2>
					</legend>
					<?php $this->renderPartial('_domicilio_alternativo',array(
							'model'=>$model, 'form'=>$form, 'datos'=>$datos,
					)); ?>
				</fieldset>
			</td>
		</tr>
	</table>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear contacto' : 'Guardar cambios'); ?>
	</div>

	<?php $this->endWidget(); ?>

</div>
<!-- form -->
