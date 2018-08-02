
<div class="row" align="justify">
	<?php echo $form->labelEx($model_f,'nombre'); ?>
	<?php echo $form->fileField($model_f, 'nombre'); ?>
	
	
	<?php if (!$model->isNewRecord) { 
	echo CHtml::button("Quitar", array('id'=>'quita_foto')); } ?>
	
	
	<?php echo $form->error($model_f,'nombre'); ?>
</div>

<?php

$foto=Fotos::model()->findByPk($model->fotos_id);

?>

<div id="foto_de_carga">

	<?php
	if ($foto != null) {
	 	if (strpos($foto->ruta, 'blank-profile.jpg') === false) { ?>
	<?php echo CHtml::image("../".$foto->ruta,
				DirectorioController::personaoInstitucion($model), array('height'=>'110px', 'align'=>'left')); ?>
				
		<?php } else { ?>
		<?php echo CHtml::image(Yii::app()->request->baseUrl.'/imagenes/aplicacion/blank-profile.jpg', 'sin foto de perfil', array('width'=>'100px', 'align'=>'left'));
		} ?>
	<?php } else {

		echo CHtml::image(Yii::app()->request->baseUrl.'/imagenes/aplicacion/blank-profile.jpg', 'sin foto de perfil', array('width'=>'100px', 'align'=>'left'));
}?>

</div>

<div style="display: none" id="foto_predeterminada">
	<?php echo CHtml::image(Yii::app()->request->baseUrl.'/imagenes/aplicacion/blank-profile.jpg', 'sin foto de perfil', array('width'=>'100px', 'align'=>'left')); ?>
</div>

<div id="datos_foto_vacia" style="display: none;">
	<?php echo CHtml::textField('foto_vacia','1',array('size'=>60,'maxlength'=>255,'id'=>'foto_vacia')); ?>
</div>
