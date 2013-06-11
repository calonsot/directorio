<?php
/* @var $this DirectorioController */
/* @var $data Directorio */
?>

<div class="view">

	<?php 
	if ($data->fotos_id != '' && $data->fotos_id !=null) {
		echo CHtml::image(Fotos::model()->findByPk($data->fotos_id)->ruta,
				$data->es_institucion ? $data->institucion : $data->nombre.' '.$data->apellido, array('height'=>'110px', 'align'=>'right'));
	}else {
		echo CHtml::image('../../imagenes/aplicacion/blank-profile.jpg', 'sin foto de perfil', array('width'=>'100px', 'align'=>'right'));
	}

	?>

	<?php 
	//if ($data->es_institucion == 1) {
	//	echo CHtml::link(CHtml::encode($data->institucion), array('view', 'id'=>$data->id));
	//} else {
	//	echo CHtml::link(CHtml::encode($data->nombre.' '.$data->apellido), array('view', 'id'=>$data->id));
	//}
	echo CHtml::link(CHtml::encode($data->es_institucion ? $data->institucion : $data->nombre.' '.$data->apellido), array('view', 'id'=>$data->id));
	?>
	<br /> <b><?php echo CHtml::encode($data->getAttributeLabel('es_internacional')); ?>:</b>
	<?php echo CHtml::encode($data->es_internacional ? 'Sí' : 'No'); ?>
	<br /> <b><?php echo CHtml::encode($data->getAttributeLabel('es_institucion')); ?>:</b>
	<?php echo CHtml::encode($data->es_institucion ? 'Sí' : 'No'); ?>
	<br /> <b><?php echo CHtml::encode($data->getAttributeLabel('correo')); ?>:</b>
	<?php echo CHtml::encode($data->correo); ?>
	<br /> <b><?php echo CHtml::encode($data->getAttributeLabel('tipo_id')); ?>:</b>
	<?php echo CHtml::encode(Tipo::model()->findByPk($data->tipo_id)->nombre); ?>
	<br /> <b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
	<?php
	$estado=Estado::model()->findByPk($data->estado);
	if ($estado != null) {
		echo CHtml::encode($estado->nombre);
		}
		?>
	<br /> <b><?php echo CHtml::encode($data->getAttributeLabel('veces_consulta')); ?>:</b>
	<?php echo CHtml::encode($data->veces_consulta); ?>
	<br />

	<?php /*
		<b><?php echo CHtml::encode($data->getAttributeLabel('correo_alternativo')); ?>:</b>
		<?php echo CHtml::encode($data->correo_alternativo); ?>
		<br />

		<b><?php echo CHtml::encode($data->getAttributeLabel('correos')); ?>:</b>
		<?php echo CHtml::encode($data->correos); ?>
		<br />

		<b><?php echo CHtml::encode($data->getAttributeLabel('telefono_particular')); ?>:</b>
		<?php echo CHtml::encode($data->telefono_particular); ?>
		<br />

		<b><?php echo CHtml::encode($data->getAttributeLabel('telefono_oficina')); ?>:</b>
		<?php echo CHtml::encode($data->telefono_oficina); ?>
		<br />

		<b><?php echo CHtml::encode($data->getAttributeLabel('telefono_casa')); ?>:</b>
		<?php echo CHtml::encode($data->telefono_casa); ?>
		<br />

		<b><?php echo CHtml::encode($data->getAttributeLabel('telefonos')); ?>:</b>
		<?php echo CHtml::encode($data->telefonos); ?>
		<br />

		<b><?php echo CHtml::encode($data->getAttributeLabel('puesto')); ?>:</b>
		<?php echo CHtml::encode($data->puesto); ?>
		<br />

		<b><?php echo CHtml::encode($data->getAttributeLabel('nombre_asistente')); ?>:</b>
		<?php echo CHtml::encode($data->nombre_asistente); ?>
		<br />

		<b><?php echo CHtml::encode($data->getAttributeLabel('apellido_asistente')); ?>:</b>
		<?php echo CHtml::encode($data->apellido_asistente); ?>
		<br />

		<b><?php echo CHtml::encode($data->getAttributeLabel('pagina')); ?>:</b>
		<?php echo CHtml::encode($data->pagina); ?>
		<br />

		<b><?php echo CHtml::encode($data->getAttributeLabel('direccion')); ?>:</b>
		<?php echo CHtml::encode($data->direccion); ?>
		<br />

		<b><?php echo CHtml::encode($data->getAttributeLabel('direccion_alternativa')); ?>:</b>
		<?php echo CHtml::encode($data->direccion_alternativa); ?>
		<br />

		<b><?php echo CHtml::encode($data->getAttributeLabel('asentamiento')); ?>:</b>
		<?php echo CHtml::encode($data->asentamiento); ?>
		<br />

		<b><?php echo CHtml::encode($data->getAttributeLabel('asentamiento_alternativo')); ?>:</b>
		<?php echo CHtml::encode($data->asentamiento_alternativo); ?>
		<br />

		<b><?php echo CHtml::encode($data->getAttributeLabel('municipio')); ?>:</b>
		<?php echo CHtml::encode($data->municipio); ?>
		<br />

		<b><?php echo CHtml::encode($data->getAttributeLabel('municipio_alternativo')); ?>:</b>
		<?php echo CHtml::encode($data->municipio_alternativo); ?>
		<br />

		<b><?php echo CHtml::encode($data->getAttributeLabel('ciudad')); ?>:</b>
		<?php echo CHtml::encode($data->ciudad); ?>
		<br />

		<b><?php echo CHtml::encode($data->getAttributeLabel('ciudad_alternativa')); ?>:</b>
		<?php echo CHtml::encode($data->ciudad_alternativa); ?>
		<br />

		<b><?php echo CHtml::encode($data->getAttributeLabel('estado')); ?>:</b>
		<?php echo CHtml::encode($data->estado); ?>
		<br />

		<b><?php echo CHtml::encode($data->getAttributeLabel('estado_alternativo')); ?>:</b>
		<?php echo CHtml::encode($data->estado_alternativo); ?>
		<br />

		<b><?php echo CHtml::encode($data->getAttributeLabel('cp')); ?>:</b>
		<?php echo CHtml::encode($data->cp); ?>
		<br />

		<b><?php echo CHtml::encode($data->getAttributeLabel('cp_alternativo')); ?>:</b>
		<?php echo CHtml::encode($data->cp_alternativo); ?>
		<br />

		<b><?php echo CHtml::encode($data->getAttributeLabel('observaciones')); ?>:</b>
		<?php echo CHtml::encode($data->observaciones); ?>
		<br />

		<b><?php echo CHtml::encode($data->getAttributeLabel('veces_consulta')); ?>:</b>
		<?php echo CHtml::encode($data->veces_consulta); ?>
		<br />

		<b><?php echo CHtml::encode($data->getAttributeLabel('fec_alta')); ?>:</b>
		<?php echo CHtml::encode($data->fec_alta); ?>
		<br />

		<b><?php echo CHtml::encode($data->getAttributeLabel('fec_act')); ?>:</b>
		<?php echo CHtml::encode($data->fec_act); ?>
		<br />

		<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_id')); ?>:</b>
		<?php echo CHtml::encode($data->tipo_id); ?>
		<br />

		<b><?php echo CHtml::encode($data->getAttributeLabel('usuarios_id')); ?>:</b>
		<?php echo CHtml::encode($data->usuarios_id); ?>
		<br />

		<b><?php echo CHtml::encode($data->getAttributeLabel('institucion_id')); ?>:</b>
		<?php echo CHtml::encode($data->institucion_id); ?>
		<br />

		<b><?php echo CHtml::encode($data->getAttributeLabel('sector_idsector')); ?>:</b>
		<?php echo CHtml::encode($data->sector_idsector); ?>
		<br />

		<b><?php echo CHtml::encode($data->getAttributeLabel('paises_id')); ?>:</b>
		<?php echo CHtml::encode($data->paises_id); ?>
		<br />

		<b><?php echo CHtml::encode($data->getAttributeLabel('paises_id1')); ?>:</b>
		<?php echo CHtml::encode($data->paises_id1); ?>
		<br />

		<b><?php echo CHtml::encode($data->getAttributeLabel('ciudad_id')); ?>:</b>
		<?php echo CHtml::encode($data->ciudad_id); ?>
		<br />

		<b><?php echo CHtml::encode($data->getAttributeLabel('ciudad_id1')); ?>:</b>
		<?php echo CHtml::encode($data->ciudad_id1); ?>
		<br />

		<b><?php echo CHtml::encode($data->getAttributeLabel('fotos_id')); ?>:</b>
		<?php echo CHtml::encode($data->fotos_id); ?>
		<br />

		<b><?php echo CHtml::encode($data->getAttributeLabel('codigo_postal_id')); ?>:</b>
		<?php echo CHtml::encode($data->codigo_postal_id); ?>
		<br />

		<b><?php echo CHtml::encode($data->getAttributeLabel('codigo_postal_id1')); ?>:</b>
		<?php echo CHtml::encode($data->codigo_postal_id1); ?>
		<br />

		<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_asentamiento_id')); ?>:</b>
		<?php echo CHtml::encode($data->tipo_asentamiento_id); ?>
		<br />

		<b><?php echo CHtml::encode($data->getAttributeLabel('tipo_asentamiento_id1')); ?>:</b>
		<?php echo CHtml::encode($data->tipo_asentamiento_id1); ?>
		<br />

	*/ ?>

</div>
