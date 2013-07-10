<?php
/* @var $this DirectorioController */
/* @var $model Directorio */
/*
 $this->breadcrumbs=array(
 		//'Directorios'=>array('index'),
 		'Información del contacto',
 );*/

$this->menu=array(
		//array('label'=>'List Directorio', 'url'=>array('index')),
		array('label'=>'Crear un contacto', 'url'=>array('create')),
		array('label'=>'Actualiza este contacto', 'url'=>array('update', 'id'=>$model->id)),
		array('label'=>'Elimina este contacto', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'¿Estás seguro que deseas eliminar este contacto?')),
		array('label'=>'¿Buscas un contacto?', 'url'=>array('admin')),
);
?>

<h1>
	<table border="1" style="display: table-row;">
		<tr>
			<td width="80%"><?php 
			echo $model->es_institucion ? $model->institucion : $model->nombre.' '.$model->apellido;
			?>
			</td>
			<td><?php 
			$foto=Fotos::model()->findByPk($model->fotos_id);
			if ($foto != null) {
			?> <?php echo CHtml::image($foto->ruta,
				$model->es_institucion ? $model->institucion : $model->nombre.' '.$model->apellido, array('height'=>'110px', 'align'=>'right')); ?>
				<?php } else {
					echo CHtml::image(Yii::app()->request->baseUrl.'/imagenes/aplicacion/blank-profile.jpg', 'sin foto de perfil', array('width'=>'100px', 'align'=>'right'));
				}?></td>
		</tr>
	</table>
</h1>


<?php $this->widget('zii.widgets.CDetailView', array(
		'data'=>$model,
		'attributes'=>array(
				array(
						'label'=>'',
						'value'=>'<ul><li><h2>Datos principales</h2></li></ul>',
						'type'=>'raw',
				),
				'id',
				array(
						'name'=>'es_internacional',
						'value'=>$model->es_internacional==1 ? ("Sí"):("No"),
				),
				array(
						'name'=>'es_institucion',
						'value'=>$model->es_institucion==1 ? ("Sí"):("No"),
				),
				array(
						'name'=>'tipos.tipo_id',
						'type'=>'raw',
						'value'=>$tipos,
				),
				array(
						'name'=>'sector_id',
						'value'=>Sector::model()->findByPk($model->sector_id)->nombre,
				),
				'institucion',
				'nombre',
				'apellido',
				'correo',
				'correo_alternativo',
				'correos',
				'telefono_particular',
				'telefono_oficina',
				'telefono_casa',
				'telefonos',
				'puesto',
				'adscripcion',
				'pagina',
				'red_social',
				'observaciones',
				array(
						'label'=>'',
						'type'=>'raw',
						'value'=>'<ul><li><h2>Domicilio</h2></li></ul>',
						'type'=>'raw',
				),
				'direccion',
				'asentamiento',
				array(
						'name'=>'tipo_asentamiento_id',
						'value'=>DirectorioController::validaTipoAsentamiento($model->tipo_asentamiento_id),
				),
				'municipio',
				'ciudad',
				array(
						'name'=>'estado',
						'value'=>DirectorioController::validaEstado($model->estado),
				),
				'cp',
				array(
						'name'=>'paises_id',
						'value'=>DirectorioController::validaPais($model->paises_id),
				),
				array(
						'label'=>'',
						'value'=>'<ul><li><h2>Domicilio alternativo</h2></li></ul>',
						'type'=>'raw',
				),
				'direccion_alternativa',
				'asentamiento_alternativo',
				array(
						'name'=>'tipo_asentamiento_id1',
						'value'=>DirectorioController::validaTipoAsentamiento($model->tipo_asentamiento_id1),
				),
				'municipio_alternativo',
				'ciudad_alternativa',
				array(
						'name'=>'estado_alternativo',
						'value'=>DirectorioController::validaEstado($model->estado_alternativo),
				),
				'cp_alternativo',
				array(
						'name'=>'paises_id1',
						'value'=>DirectorioController::validaPais($model->paises_id1),
				),
				array(
						'label'=>'',
						'value'=>'<ul><li><h2>Datos asistente</h2></li></ul>',
						'type'=>'raw',
				),
				'nombre_asistente',
				'apellido_asistente',
				array(
						'label'=>'',
						'value'=>'<ul><li><h2>Datos adicionales</h2></li></ul>',
						'type'=>'raw',
				),
				'veces_consulta',
				'fec_alta',
				'fec_act',
				array(
						'name'=>'usuarios_id',
						'type'=>'raw',
						'value'=>CHtml::link(CHtml::encode(Usuarios::model()->findByPk($model->usuarios_id)->nombre.' '.Usuarios::model()->findByPk($model->usuarios_id)->apellido),
								array('usuarios/view', 'id'=>$model->usuarios_id)),
				),
				array(
						'label'=>'',
						'value'=>'<ul><li><h2>Datos de Medios</h2></li></ul>',
						'type'=>'raw',
				),
				array(
						'name'=>'grupos_id',
						'value'=>Grupos::model()->findByPk($model_m->grupos_id)->nombre,
				),
				array(
						'name'=>'medio',
						'value'=>$model_m->medio,
				),
				array(
						'name'=>'tipo_medios_id',
						'value'=>TipoMedios::model()->findByPk($model_m->tipo_medios_id)->nombre,
				),
				array(
						'name'=>'perfil_medio',
						'value'=>$model_m->perfil_medio,
				),
				array(
						'name'=>'programa',
						'value'=>$model_m->programa,
				),
				array(
				'label'=>'',
				'value'=>'<ul><li><h2>Datos de Biodiversitas</h2></li></ul>',
				'type'=>'raw',
				),
				array(
				'name'=>'es_valido',
				'value'=>$model_c->es_valido==1 ? ("Sí"):("No"),
				),
				array(
				'name'=>'grado_academico',
				'value'=>$model_c->grado_academico,
				),
				array(
				'name'=>'sigla_institucion',
				'value'=>$model_c->sigla_institucion,
				),
				array(
				'name'=>'dependencia',
				'value'=>$model_c->dependencia,
				),
				array(
				'name'=>'sigla_dependencia',
				'value'=>$model_c->sigla_dependencia,
				),
				array(
				'name'=>'subdependencia',
				'value'=>$model_c->subdependencia,
				),
				array(
				'name'=>'actividad',
				'value'=>$model_c->actividad,
				),
				array(
				'name'=>'domicilio_alt_principal',
				'value'=>$model->domicilio_alt_principal==1 ? ("Sí"):("No"),
				),
		),
)); ?>
