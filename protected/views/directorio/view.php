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
	<?php 
	echo $model->es_institucion ? $model->institucion : $model->nombre.' '.$model->apellido;
	?>
</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
		'data'=>$model,
		'attributes'=>array(
				array(
						'label'=>'',
						'value'=>'--------------------------------------------DATOS PRINCIPALES------------------------------------------------------',
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
						'name'=>'tipo_id',
						'value'=>Tipo::model()->findByPk($model->tipo_id)->nombre,
				),
				'institucion_id',
				'sector_id',
				'correo',
				'correo_alternativo',
				'correos',
				'telefono_particular',
				'telefono_oficina',
				'telefono_casa',
				'telefonos',
				'puesto',
				'pagina',
				'observaciones',
				array(
						'label'=>'',
						'value'=>'---------------------------------------------------DOMICILIO------------------------------------------------------------',
				),
				'direccion',
				'asentamiento',
				'tipo_asentamiento_id',
				'municipio',
				'ciudad',
				'estado',
				'cp',
				'paises_id',
				array(
				'label'=>'',
				'value'=>'------------------------------------------DOMICILIO ALTERNATIVO------------------------------------------------',
				),
				'direccion_alternativa',
				'asentamiento_alternativo',
				'tipo_asentamiento_id1',
				'municipio_alternativo',
				'ciudad_alternativa',
				'estado_alternativo',
				'cp_alternativo',
				'paises_id1',
				array(
				'label'=>'',
				'value'=>'-----------------------------------------------DATOS ASISTENTE-------------------------------------------------------',
				),
				'nombre_asistente',
				'apellido_asistente',
				array(
						'label'=>'',
				'value'=>'---------------------------------------------DATOS ADICIONALES-----------------------------------------------------',
				),
				'veces_consulta',
				'fec_alta',
				'fec_act',
				'usuarios_id',
				'fotos_id',
		),
)); ?>
