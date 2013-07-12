<?php
/* @var $this DirectorioController */
/* @var $data Directorio */
?>

<div class="view">

	<?php 
	
	if ($data->fotos_id != '' && $data->fotos_id !=null) {
		echo CHtml::image(Fotos::model()->findByPk($data->fotos_id)->ruta,
				DirectorioController::personaoInstitucion($data), array('height'=>'130px', 'align'=>'right'));
	}else {
		echo CHtml::image(Yii::app()->request->baseUrl.'/imagenes/aplicacion/blank-profile.jpg', 'sin foto de perfil', array('width'=>'130px', 'align'=>'right'));
	}

	?>

	<?php 
	
	echo "<h3>".CHtml::link(CHtml::encode($data->grado_academico).' '.DirectorioController::personaoInstitucion($data), array('view', 'id'=>$data->id))."</h3>";
	?>
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('vip')); ?>:</b>
	<?php echo CHtml::encode($data->vip); ?>
	<br><b><?php echo CHtml::encode($data->getAttributeLabel('correo')); ?>:</b>
	<?php echo CHtml::encode($data->correo); ?>
	<br /> <b><?php echo CHtml::encode($data->getAttributeLabel('sector_id')); ?>:</b>
	<?php echo Sector::model()->findByPk($data->sector_id)->nombre; ?>
	<br /> <b><?php echo CHtml::encode($data->getAttributeLabel('tipos.tipo_id')); ?>:</b>
	<?php echo DirectorioController::dameTipos($data->id); ?>
	<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php echo DirectorioController::validaEstado($data->estado); ?>
	<br /> <b><?php echo CHtml::encode($data->getAttributeLabel('paises_id')); ?>:</b>
	<?php echo DirectorioController::validaPais($data->paises_id); ?>
	<br /> <b><?php echo CHtml::encode($data->getAttributeLabel('usuarios_id')); ?>:</b>
	<?php echo CHtml::link(Usuarios::model()->findByPk($data->usuarios_id)->nombre, array('usuarios/view', 'id'=>$data->usuarios_id)); ?>
	<br /> <b><?php echo CHtml::encode($data->getAttributeLabel('veces_consulta')); ?>:</b>
	<?php echo CHtml::encode($data->veces_consulta); ?>

</div>
