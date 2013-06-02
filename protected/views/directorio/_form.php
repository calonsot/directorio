<?php
/* @var $this DirectorioController */
/* @var $model Directorio */
/* @var $form CActiveForm */
?>

<div class="form">

	<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'directorio-form',
			'enableAjaxValidation'=>false,
)); ?>

	<p class="note">
		Campos con <span class="required">*</span> son necesarios.
	</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<table id="casetas">
			<tr>
				<td width="20%"><?php echo $form->labelEx($model,'es_internacional', array('id'=>'etiqueta')); ?>
					<?php echo $form->checkBox($model,'es_internacional'); ?> <?php echo $form->error($model,'es_internacional'); ?>
				</td>
				<td width="20%"><?php echo $form->labelEx($model,'es_institucion', array('id'=>'etiqueta')); ?>
					<?php echo $form->checkBox($model,'es_institucion'); ?> <?php echo $form->error($model,'es_institucion'); ?>
				</td>
				<td width="20%"><label id="etiqueta">¿Tiene datos de medios?</label>
					<input type="checkbox" name="caja_medios" id="caja_medios">
				</td>
				<td width="20%"><label id="etiqueta">¿Tiene datos de centro
						documental?</label> <input type="checkbox" name="caja_documental"
					id="caja_documental">
				</td>
			</tr>
			<tr>
				<td width="20%"><label id="etiqueta">¿Tiene domicilio?</label> <input
					type="checkbox" name="caja_domicilio" id="caja_domicilio">
				</td>
				<td width="20%"><label id="etiqueta">¿Tiene domicilio alternativo?</label>
					<input type="checkbox" name="caja_otro_domicilio"
					id="caja_otro_domicilio">
				</td>
				<td width="20%"><label id="etiqueta">¿Tiene fotografía?</label> <input
					type="checkbox" name="caja_foto" id="caja_foto">
				</td>
				<td width="20%"><label id="etiqueta">¿Tiene asistente?</label> <input
					type="checkbox" name="caja_asistente" id="caja_asistente">
				</td>
			</tr>
		</table>
	</div>

	<table>
		<tr>
			<td><div id="enlace_principal" style="display: none"
					class="color_enlace">
					<span>Datos Principales &raquo;</span>
				</div></td>
			<td><div id="enlace_domicilio" style="display: none"
					class="color_enlace">
					<span>Domicilio &raquo;</span>
				</div></td>
			<td><div id="enlace_otro_domicilio" style="display: none"
					class="color_enlace">
					<span>Domicilio alternativo &raquo;</span>
				</div></td>
			<td><div id="enlace_medios" style="display: none"
					class="color_enlace">
					<span>Medios &raquo;</span>
				</div></td>
			<td><div id="enlace_documental" style="display: none"
					class="color_enlace">
					<span>Centro documental &raquo;</span>
				</div></td>
			<td><div id="enlace_foto" style="display: none" class="color_enlace">
					<span>Foto &raquo;</span>
				</div></td>
			<td><div id="enlace_asistente" style="display: none"
					class="color_enlace">
					<span>Asistente &raquo;</span>
				</div></td>
		</tr>
	</table>

	<div id="datos_persona">
		<div class="row">
			<?php echo $form->labelEx($model,'nombre'); ?>
			<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>255, 'id'=>'nombre')); ?>
			<?php echo $form->error($model,'nombre'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'apellido'); ?>
			<?php echo $form->textField($model,'apellido',array('size'=>60,'maxlength'=>255, 'id'=>'apellido')); ?>
			<?php echo $form->error($model,'apellido'); ?>
		</div>
	</div>

	<div id="datos_institucion" style="display: none">
		<div class="row">
			<?php echo $form->labelEx($model,'institucion'); ?>
			<?php echo $form->textField($model,'institucion',array('size'=>60,'maxlength'=>255, 'id'=>'institucion')); ?>
			<?php echo $form->error($model,'institucion'); ?>
		</div>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tipo_id'); ?>
		<?php echo $form->dropDownList($model, 'tipo_id',  CHtml::listData(Tipo::model()->findAll(array('order'=>'nombre ASC')), 'id', 'nombre'), 
				array('empty'=>'---Selecciona el tipo de clasificación---', 'id'=>'tipo'
				)); ?>
		<?php echo $form->error($model,'tipo_id'); ?>
	</div>

	<div id="datos_principal">
		<div class="row">
			<?php echo $form->labelEx($model,'correo'); ?>
			<?php echo $form->textField($model,'correo',array('size'=>60,'maxlength'=>255)); ?>

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
				<?php echo $form->labelEx($model,'correo_alternativo'); ?>
				<?php echo $form->textField($model,'correo_alternativo',array('size'=>60,'maxlength'=>255)); ?>

				<div id="datos_correo_alternativo_repetido" style="display: none">
					Ese correo ya existe en la base.
					<?php echo CHtml::link('Ver','', array('id'=>'enlace_correo_alternativo_repetido', 'target'=>'blank')); ?>
				</div>

				<?php echo $form->error($model,'correo_alternativo'); ?>
			</div>

			<div class="row">
				<?php echo $form->labelEx($model,'correos'); ?>
				<?php echo $form->textArea($model,'correos',array('rows'=>6, 'cols'=>50)); ?>
				<?php echo $form->error($model,'correos'); ?>
			</div>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'telefono_particular'); ?>
			<?php echo $form->textField($model,'telefono_particular',array('size'=>60,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'telefono_particular'); ?>
		</div>

		<div id="enlace_telefonos" class="color_enlace">
			<span>+ telefónos &raquo;</span>
		</div>

		<div id="datos_telefonos" style="display: none">
			<div class="row">
				<?php echo $form->labelEx($model,'telefono_oficina'); ?>
				<?php echo $form->textField($model,'telefono_oficina',array('size'=>60,'maxlength'=>255)); ?>
				<?php echo $form->error($model,'telefono_oficina'); ?>
			</div>

			<div class="row">
				<?php echo $form->labelEx($model,'telefono_casa'); ?>
				<?php echo $form->textField($model,'telefono_casa',array('size'=>60,'maxlength'=>255)); ?>
				<?php echo $form->error($model,'telefono_casa'); ?>
			</div>

			<div class="row">
				<?php echo $form->labelEx($model,'telefonos'); ?>
				<?php echo $form->textArea($model,'telefonos',array('rows'=>6, 'cols'=>50)); ?>
				<?php echo $form->error($model,'telefonos'); ?>
			</div>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'puesto'); ?>
			<?php echo $form->textField($model,'puesto',array('size'=>60,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'puesto'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'pagina'); ?>
			<?php echo $form->textField($model,'pagina',array('size'=>60,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'pagina'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'observaciones'); ?>
			<?php echo $form->textArea($model,'observaciones',array('rows'=>6, 'cols'=>50)); ?>
			<?php echo $form->error($model,'observaciones'); ?>
		</div>
	</div>

	<div id="datos_asistente" style="display: none">
		<div class="row">
			<?php echo $form->labelEx($model,'nombre_asistente'); ?>
			<?php echo $form->textField($model,'nombre_asistente',array('size'=>60,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'nombre_asistente'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'apellido_asistente'); ?>
			<?php echo $form->textField($model,'apellido_asistente',array('size'=>60,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'apellido_asistente'); ?>
		</div>
	</div>

	<div id="datos_domicilio" style="display: none">

		<div id="datos_internacional" style="display: none">
			<div class="row">
				<?php echo $form->labelEx($model,'paises_id'); ?>
				<?php echo $form->dropDownList($model, 'paises_id',  CHtml::listData(Paises::model()->findAll(array('order'=>'nombre ASC')), 'id', 'nombre'), 
						array('empty'=>'---Selecciona un país---', 'id'=>'pais_id'
				)); ?>
				<?php echo $form->error($model,'paises_id'); ?>
			</div>
		</div>

		<div class="row">
			<?php //echo $form->labelEx($model,'asentamiento'); ?>
			<?php //echo $form->textField($model,'asentamiento',array('size'=>60,'maxlength'=>255)); ?>
			<?php //echo $form->error($model,'asentamiento'); ?>
		</div>

		<div class="row">
			<?php //echo $form->labelEx($model,'municipio'); ?>
			<?php //echo $form->textField($model,'municipio',array('size'=>60,'maxlength'=>255)); ?>
			<?php //echo $form->error($model,'municipio'); ?>
		</div>

		<div class="row">
			<?php //echo $form->labelEx($model,'ciudad'); ?>
			<?php //echo $form->textField($model,'ciudad',array('size'=>60,'maxlength'=>255)); ?>
			<?php //echo $form->error($model,'ciudad'); ?>
		</div>

		<div class="row">
			<?php //echo $form->labelEx($model,'estado'); ?>
			<?php //echo $form->textField($model,'estado',array('size'=>60,'maxlength'=>255)); ?>
			<?php //echo $form->error($model,'estado'); ?>
		</div>

		<div id="datos_nacional">
			<div class="row">
				<?php echo $form->labelEx($model,'cp'); ?>
				<?php echo $form->textField($model,'cp',array('size'=>5,'maxlength'=>5,'id'=>'cp')); ?>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

				<div id="sin_cp" style="display: none">Tu búsqueda no dio ningún
					resultado (puedes poner los datos manualmente)</div>

				<?php echo $form->error($model,'codigo_postal'); ?>
			</div>

			<div class="row">
				<?php echo $form->labelEx($model,'estado', array('id'=>'etiqueta')); ?>

				<?php for ($i=0;$i<33;$i++)
				echo "&nbsp;" ?>

				<div class="datos_ciudad_id" style="display: inline;">
					<?php echo $form->labelEx($model,'ciudad_id', array('id'=>'etiqueta')); ?>
				</div>
				<br>

				<?php echo $form->dropDownList($model, 'estado',  CHtml::listData(Estado::model()->findAll(), 'id', 'nombre'), 
						array('empty'=>'---Selecciona un estado---', 'id'=>'estado', 'ajax' => array(
						'type'=>'POST',
						'url'=>Yii::app()->createUrl('directorio/damemunicipios'),
						'update'=>'#municipio_lista',
			))); ?>

				<div class="datos_ciudad_id" style="display: inline;">
					<?php echo $form->dropDownList($model,'ciudad_id',array(), array('prompt'=>'---Selecciona una ciudad---', 'id'=>'ciudad_id', 'disabled'=>'disabled')); ?>
				</div>

				<div id="con_ciudad" class="color_enlace" style="display: none">¿No
					encontraste la ciudad? Anótala &raquo;</div>

				<?php echo $form->error($model,'estado'); ?>
				<?php echo $form->error($model,'ciudad_id'); ?>
			</div>

			<div id="datos_ciudad" style="display: none">
				<div class="row">
					<?php echo $form->labelEx($model,'ciudad', array('id'=>'etiqueta')); ?>
					<?php echo $form->textField($model,'ciudad',array('size'=>60,'maxlength'=>255, 'id'=>'ciudad')); ?>
					<?php echo $form->error($model,'ciudad'); ?>

					<div id="sin_ciudad" class="color_enlace" style="display: none">Escoger
						de la lista &raquo;</div>
				</div>
			</div>

			<div id="datos_municipio_lista" style="display: inline">
				<div class="row">
					<?php echo CHtml::label('Municipio','municipio_lista'); ?>
					<?php echo CHtml::dropDownList('municipio_lista','',array(), array('empty'=>'---Selecciona un municipio---', 'id'=>'municipio_lista', 'disabled'=>'disabled'
			)); ?>

					<div id="con_municipio" class="color_enlace" style="display: none">¿No
						encontraste el municipio? Anótalo &raquo;</div>
				</div>
			</div>

			<div id="datos_municipio" style="display: none;">
				<div class="row">
					<?php echo $form->labelEx($model,'municipio'); ?>
					<?php echo $form->textField($model,'municipio',array('size'=>60,'maxlength'=>255, 'id'=>'municipio')); ?>
					<?php echo $form->error($model,'municipio'); ?>

					<div id="sin_municipio" class="color_enlace" style="display: none">Escoger
						de la lista &raquo;</div>
				</div>
			</div>

			<div id="datos_asentamiento_lista">
				<div class="row">
					<?php echo CHtml::label('Colonia','asentamiento_lista'); ?>
					<?php echo CHtml::dropDownList('asentamiento_lista','',array(), array('prompt'=>'---Selecciona una colonia---', 'id'=>'asentamiento_lista', 'disabled'=>'disabled',
			)); ?>

					<div id="con_asentamiento" class="color_enlace"
						style="display: none">¿No encontraste la colonia? Anótala &raquo;</div>
				</div>
			</div>

			<div id="datos_asentamiento" style="display: none;">
				<div class="row">
					<?php echo $form->labelEx($model,'asentamiento'); ?>
					<?php echo $form->textField($model,'asentamiento',array('size'=>60,'maxlength'=>255, 'id'=>'asentamiento')); ?>
					<?php echo $form->error($model,'asentamiento'); ?>

					<div id="sin_asentamiento" class="color_enlace"
						style="display: none">Escoger de la lista &raquo;</div>
				</div>
			</div>

			<div class="row">
				<?php echo $form->label($model,'tipo_asentamiento_id'); ?>
				<?php echo $form->dropDownList($model, 'tipo_asentamiento_id',  CHtml::listData(TipoAsentamiento::model()->findAll(), 'id', 'nombre'), 
						array('empty'=>'---Selecciona el tipo de colonia---', 'id'=>'tipo_asentamiento_id', 'disabled'=>'disabled')); ?>
				<?php echo $form->error($model,'tipo_asentamiento_id'); ?>

				<div id="sin_asentamiento" class="color_enlace"
					style="display: none">Escoger de la lista &raquo;</div>
			</div>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'direccion'); ?>
			<?php echo $form->textField($model,'direccion',array('size'=>60,'maxlength'=>255, 'id'=>'direccion')); ?>
			<?php echo $form->error($model,'direccion'); ?>
		</div>

	</div>

	<div id="datos_otro_domicilio" style="display: none">

		<div class="row">
			<?php echo $form->labelEx($model,'direccion_alternativa'); ?>
			<?php echo $form->textField($model,'direccion_alternativa',array('size'=>60,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'direccion_alternativa'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'asentamiento_alternativo'); ?>
			<?php echo $form->textField($model,'asentamiento_alternativo',array('size'=>60,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'asentamiento_alternativo'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'municipio_alternativo'); ?>
			<?php echo $form->textField($model,'municipio_alternativo',array('size'=>60,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'municipio_alternativo'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'ciudad_alternativa'); ?>
			<?php echo $form->textField($model,'ciudad_alternativa',array('size'=>60,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'ciudad_alternativa'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'estado_alternativo'); ?>
			<?php echo $form->textField($model,'estado_alternativo',array('size'=>60,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'estado_alternativo'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'estado_alternativo'); ?>
			<?php echo $form->textField($model,'estado_alternativo',array('size'=>60,'maxlength'=>255)); ?>
			<?php echo $form->error($model,'estado_alternativo'); ?>
		</div>
	</div>

	<div id="datos_medios" style="display: none;">
		<div class="row">
			<?php echo $form->labelEx(Medios::model(),'grupo'); ?>
			<?php echo $form->textField(Medios::model(),'grupo',array('size'=>60,'maxlength'=>255,'id'=>'grupo')); ?>
			<?php echo $form->error(Medios::model(),'grupo'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx(Medios::model(),'medio'); ?>
			<?php echo $form->textField(Medios::model(),'medio',array('size'=>60,'maxlength'=>255,'id'=>'medio')); ?>
			<?php echo $form->error(Medios::model(),'medio'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx(Medios::model(),'tipo_medio'); ?>
			<?php echo $form->textField(Medios::model(),'tipo_medio',array('size'=>60,'maxlength'=>255,'id'=>'tipo_medio')); ?>
			<?php echo $form->error(Medios::model(),'tipo_medio'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx(Medios::model(),'perfil_medio'); ?>
			<?php echo $form->textField(Medios::model(),'perfil_medio',array('size'=>60,'maxlength'=>255,'id'=>'perfil_medio')); ?>
			<?php echo $form->error(Medios::model(),'perfil_medio'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx(Medios::model(),'programa'); ?>
			<?php echo $form->textField(Medios::model(),'programa',array('size'=>60,'maxlength'=>255,'id'=>'programa')); ?>
			<?php echo $form->error(Medios::model(),'programa'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx(Medios::model(),'seccion'); ?>
			<?php echo $form->textField(Medios::model(),'seccion',array('size'=>60,'maxlength'=>255,'id'=>'seccion')); ?>
			<?php echo $form->error(Medios::model(),'seccion'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx(Medios::model(),'suplemento'); ?>
			<?php echo $form->textField(Medios::model(),'suplemento',array('size'=>60,'maxlength'=>255,'id'=>'suplemento')); ?>
			<?php echo $form->error(Medios::model(),'suplemento'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx(Medios::model(),'columna'); ?>
			<?php echo $form->textField(Medios::model(),'columna',array('size'=>60,'maxlength'=>255,'id'=>'columna')); ?>
			<?php echo $form->error(Medios::model(),'columna'); ?>
		</div>
	</div>

	<div id="datos_documental" style="display: none;">
		<div class="row">
			<?php echo $form->labelEx(Documental::model(),'grado_academico'); ?>
			<?php echo $form->textField(Documental::model(),'grado_academico',array('size'=>60,'maxlength'=>255,'id'=>'grado_academico')); ?>
			<?php echo $form->error(Documental::model(),'grado_academico'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx(Documental::model(),'sigla_institucion'); ?>
			<?php echo $form->textField(Documental::model(),'sigla_institucion',array('size'=>60,'maxlength'=>255,'id'=>'sigla_institucion')); ?>
			<?php echo $form->error(Documental::model(),'sigla_institucion'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx(Documental::model(),'dependencia'); ?>
			<?php echo $form->textField(Documental::model(),'dependencia',array('size'=>60,'maxlength'=>255,'id'=>'dependencia')); ?>
			<?php echo $form->error(Documental::model(),'dependencia'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx(Documental::model(),'sigla_dependencia'); ?>
			<?php echo $form->textField(Documental::model(),'sigla_dependencia',array('size'=>60,'maxlength'=>255,'id'=>'sigla_dependencia')); ?>
			<?php echo $form->error(Documental::model(),'sigla_dependencia'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx(Documental::model(),'subdependencia'); ?>
			<?php echo $form->textField(Documental::model(),'subdependencia',array('size'=>60,'maxlength'=>255,'id'=>'subdependencia')); ?>
			<?php echo $form->error(Documental::model(),'subdependencia'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx(Documental::model(),'actividad'); ?>
			<?php echo $form->textField(Documental::model(),'actividad',array('size'=>60,'maxlength'=>255,'id'=>'actividad')); ?>
			<?php echo $form->error(Documental::model(),'actividad'); ?>
		</div>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'veces_consulta'); ?>
		<?php //echo $form->textField($model,'veces_consulta',array('size'=>20,'maxlength'=>20)); ?>
		<?php //echo $form->error($model,'veces_consulta'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'fec_alta'); ?>
		<?php //echo $form->textField($model,'fec_alta'); ?>
		<?php //echo $form->error($model,'fec_alta'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'fec_act'); ?>
		<?php //echo $form->textField($model,'fec_act'); ?>
		<?php //echo $form->error($model,'fec_act'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'tipo_id'); ?>
		<?php //echo $form->textField($model,'tipo_id'); ?>
		<?php //echo $form->error($model,'tipo_id'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'usuarios_id'); ?>
		<?php //echo $form->textField($model,'usuarios_id'); ?>
		<?php //echo $form->error($model,'usuarios_id'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'institucion_id'); ?>
		<?php //echo $form->textField($model,'institucion_id'); ?>
		<?php //echo $form->error($model,'institucion_id'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'sector_id'); ?>
		<?php //echo $form->textField($model,'sector_id'); ?>
		<?php //echo $form->error($model,'sector_id'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'paises_id'); ?>
		<?php //echo $form->textField($model,'paises_id'); ?>
		<?php //echo $form->error($model,'paises_id'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'paises_id1'); ?>
		<?php //echo $form->textField($model,'paises_id1'); ?>
		<?php //echo $form->error($model,'paises_id1'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'ciudad_id'); ?>
		<?php //echo $form->textField($model,'ciudad_id'); ?>
		<?php //echo $form->error($model,'ciudad_id'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'ciudad_id1'); ?>
		<?php //echo $form->textField($model,'ciudad_id1'); ?>
		<?php //echo $form->error($model,'ciudad_id1'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'fotos_id'); ?>
		<?php //echo $form->textField($model,'fotos_id'); ?>
		<?php //echo $form->error($model,'fotos_id'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'codigo_postal_id'); ?>
		<?php //echo $form->textField($model,'codigo_postal_id'); ?>
		<?php //echo $form->error($model,'codigo_postal_id'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'codigo_postal_id1'); ?>
		<?php //echo $form->textField($model,'codigo_postal_id1'); ?>
		<?php //echo $form->error($model,'codigo_postal_id1'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'tipo_asentamiento_id'); ?>
		<?php //echo $form->textField($model,'tipo_asentamiento_id'); ?>
		<?php //echo $form->error($model,'tipo_asentamiento_id'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'tipo_asentamiento_id1'); ?>
		<?php //echo $form->textField($model,'tipo_asentamiento_id1'); ?>
		<?php //echo $form->error($model,'tipo_asentamiento_id1'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear contacto' : 'Guardar cambios'); ?>
	</div>

	<?php $this->endWidget(); ?>

</div>
<!-- form -->
