
<div id="datos_otro_domicilio">

	<?php echo $form->labelEx($model,'es_internacional_alternativo', array('id'=>'etiqueta')); ?>
	<?php echo $form->checkBox($model,'es_internacional_alternativo'); ?>
	<?php echo $form->error($model,'es_internacional_alternativo'); ?>

	<?php if ($datos['super_usuario']==1 || Yii::app()->user->id_usuario==5) { ?>
	<div class="row">
		<?php echo $form->labelEx($model,'domicilio_alt_principal', array('id'=>'etiqueta')); ?>
		<?php echo $form->checkBox($model,'domicilio_alt_principal'); ?>
		<?php echo $form->error($model,'domicilio_alt_principal'); ?>
	</div>
	<?php } ?>

	<?php if ($model->es_internacional_alternativo) { ?>
	
	<div id="datos_internacional_alternativo">
		<div class="row">
			<?php echo $form->labelEx($model,'paises_id1'); ?>
			<?php echo $form->dropDownList($model, 'paises_id1',  CHtml::listData(Paises::model()->findAll(array('order'=>'nombre ASC')), 'id', 'nombre'), 
					array('empty'=>'---Selecciona un país---', 'id'=>'pais_id_alternativo', 'options'=>array($model->paises_id1=>array('selected'=>true)), 
				)); ?>
			<?php echo $form->error($model,'paises_id1'); ?>
		</div>
	</div>

	<?php } else { ?>
	
	<div id="datos_internacional_alternativo" style="display: none">
		<div class="row">
			<?php echo $form->labelEx($model,'paises_id1'); ?>
			<?php echo $form->dropDownList($model, 'paises_id1',  CHtml::listData(Paises::model()->findAll(array('order'=>'nombre ASC')), 'id', 'nombre'), 
					array('empty'=>'---Selecciona un país---', 'id'=>'pais_id_alternativo'
				)); ?>
			<?php echo $form->error($model,'paises_id1'); ?>
		</div>
	</div>
	
	<?php } ?>

	<div id="datos_nacional_alternativo">
		<div class="row">
			<?php echo $form->labelEx($model,'cp_alternativo'); ?>
			<?php echo $form->textField($model,'cp_alternativo',array('size'=>5,'maxlength'=>10,'id'=>'cp_alternativo')); ?>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

			<div id="sin_cp_alternativo" style="display: none">Tu búsqueda no dio
				ningún resultado (puedes poner los datos manualmente)</div>

			<?php echo $form->error($model,'cp_alternativo'); ?>
		</div>

		<div id="datos_manual_alternativo" style="display: none">Pon el
			domicilio manualmente (OJO: solo si el contacto tiene domicilio
			internacional) &raquo;</div>
			
			<?php if ($model->es_internacional_alternativo) { ?>
		
		<div id="datos_listas_alternativas">Regresar a las listas de
			datos nacionales &raquo;</div>
			
		<?php } else { ?>
		
		<div id="datos_listas_alternativas" style="display: none">Regresar a
			las listas de datos nacionales &raquo;</div>

		<?php } ?>	
			
		<div class="row">
			<?php echo $form->labelEx($model,'estado_alternativo', array('id'=>'etiqueta')); ?>

			<?php for ($i=0;$i<17;$i++)
				echo "&nbsp;" ?>

			<div class="datos_ciudad_id_alternativa" style="display: inline;">
				<?php echo $form->labelEx($model,'ciudad_id1', array('id'=>'etiqueta')); ?>
			</div>
			<br>

			<?php echo $form->dropDownList($model, 'estado_alternativo',  CHtml::listData(Estado::model()->findAll(), 'id', 'nombre'), 
					array('empty'=>'---Selecciona un estado---', 'id'=>'estado_alternativo')); ?>

			<div style="display: none;" id="datos_estado_manual_alternativo">
				<?php echo CHtml::textField('estado_manual_alternativo','',array('size'=>55,'maxlength'=>255,'id'=>'estado_manual_alternativo')); ?>
			</div>

			<div class="datos_ciudad_id_alternativa" style="display: inline;">
				<?php echo $form->dropDownList($model,'ciudad_id1',array(), array('prompt'=>'---Selecciona una ciudad---', 'id'=>'ciudad_id_alternativa', 'disabled'=>'disabled')); ?>
			</div>

			<div id="con_ciudad_alternativa" class="color_enlace"
				style="display: none">¿No encontraste la ciudad? Anótala &raquo;</div>

			<?php echo $form->error($model,'estado_alternativo'); ?>
			<?php echo $form->error($model,'ciudad_id1'); ?>
		</div>

		<div id="datos_ciudad_alternativa" style="display: none">
			<div class="row">
				<?php echo $form->labelEx($model,'ciudad_alternativa'); ?>
				<?php echo $form->textField($model,'ciudad_alternativa',array('size'=>55,'maxlength'=>255, 'id'=>'ciudad_alternativa')); ?>
				<?php echo $form->error($model,'ciudad_alternativa'); ?>

				<div id="sin_ciudad_alternativa" class="color_enlace"
					style="display: none">Escoger de la lista &raquo;</div>
			</div>
		</div>

		<div id="datos_municipio_lista_alternativa" style="display: inline">
			<div class="row">
				<?php echo CHtml::label('Delegación / Municipio alternativo','municipio_lista_alternativa'); ?>
				<?php echo CHtml::dropDownList('municipio_lista_alternativa','',array(), array('empty'=>'---Selecciona un municipio---', 'id'=>'municipio_lista_alternativa', 'disabled'=>'disabled'
			)); ?>

				<div id="con_municipio_alternativo" class="color_enlace"
					style="display: none">¿No encontraste el municipio? Anótalo &raquo;</div>
			</div>
		</div>

		<div id="datos_municipio_alternativo" style="display: none;">
			<div class="row">
				<?php echo $form->labelEx($model,'municipio_alternativo'); ?>
				<?php echo $form->textField($model,'municipio_alternativo',array('size'=>55,'maxlength'=>255, 'id'=>'municipio_alternativo')); ?>
				<?php echo $form->error($model,'municipio_alternativo'); ?>

				<div id="sin_municipio_alternativo" class="color_enlace"
					style="display: none">Escoger de la lista &raquo;</div>
			</div>
		</div>

		<div id="datos_asentamiento_lista_alternativa">
			<div class="row">
				<?php echo CHtml::label('Colonia alternativa','asentamiento_lista_alternativa'); ?>
				<?php echo CHtml::dropDownList('asentamiento_lista_alternativa','',array(), array('prompt'=>'---Selecciona una colonia---', 'id'=>'asentamiento_lista_alternativa', 'disabled'=>'disabled',
			)); ?>

				<div id="con_asentamiento_alternativo" class="color_enlace"
					style="display: none">¿No encontraste la colonia? Anótala &raquo;</div>
			</div>
		</div>

		<div id="datos_asentamiento_alternativo" style="display: none;">
			<div class="row">
				<?php echo $form->labelEx($model,'asentamiento_alternativo'); ?>
				<?php echo $form->textField($model,'asentamiento_alternativo',array('size'=>55,'maxlength'=>255, 'id'=>'asentamiento_alternativo')); ?>
				<?php echo $form->error($model,'asentamiento_alternativo'); ?>

				<div id="sin_asentamiento_alternativo" class="color_enlace"
					style="display: none">Escoger de la lista &raquo;</div>
			</div>
		</div>

		<div class="row">
			<?php echo $form->label($model,'tipo_asentamiento_id1'); ?>
			<?php echo $form->dropDownList($model, 'tipo_asentamiento_id1',  CHtml::listData(TipoAsentamiento::model()->findAll(), 'id', 'nombre'), 
						array('empty'=>'---Selecciona el tipo de colonia---', 'id'=>'tipo_asentamiento_id_alternativo', 'disabled'=>'disabled')); ?>
			<?php echo $form->error($model,'tipo_asentamiento_id1'); ?>
		</div>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'direccion_alternativa'); ?>
		<?php echo $form->textField($model,'direccion_alternativa',array('size'=>55,'maxlength'=>255, 'id'=>'direccion_alternativa')); ?>
		<?php echo $form->error($model,'direccion_alternativa'); ?>
	</div>

	<div class="row" style="display: none;">
		<?php echo $form->labelEx($model,'codigo_postal_id1'); ?>
		<?php echo $form->textField($model,'codigo_postal_id1',array('size'=>5,'maxlength'=>5,'id'=>'codigo_postal_alternativo')); ?>
		<?php echo $form->error($model,'codigo_postal_id1'); ?>
	</div>
</div>
