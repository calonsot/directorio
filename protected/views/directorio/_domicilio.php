
<div id="datos_domicilio">

	<?php echo $form->labelEx($model,'es_internacional', array('id'=>'etiqueta')); ?>
	<?php echo $form->checkBox($model,'es_internacional'); ?>
	<?php echo $form->error($model,'es_internacional'); ?>

	<?php if ($model->es_internacional) { ?>
	
	<div id="datos_internacional">
		<div class="row">
			<?php echo $form->labelEx($model,'paises_id'); ?>
			<?php echo $form->dropDownList($model, 'paises_id',  CHtml::listData(Paises::model()->findAll(array('order'=>'nombre ASC')), 'id', 'nombre'), 
					array('empty'=>'---Selecciona un país---', 'id'=>'pais_id', 'options'=>array($model->paises_id=>array('selected'=>true)), 
				)); ?>
			<?php echo $form->error($model,'paises_id'); ?>
		</div>
	</div>

	<?php } else { ?>
	
	<div id="datos_internacional" style="display: none">
		<div class="row">
			<?php echo $form->labelEx($model,'paises_id'); ?>
			<?php echo $form->dropDownList($model, 'paises_id',  CHtml::listData(Paises::model()->findAll(array('order'=>'nombre ASC')), 'id', 'nombre'), 
					array('empty'=>'---Selecciona un país---', 'id'=>'pais_id'
				)); ?>
			<?php echo $form->error($model,'paises_id'); ?>
		</div>
	</div>
	
	<?php } ?>
	
	<div id="datos_nacional">
		<div class="row">
			<?php echo $form->labelEx($model,'cp'); ?>
			<?php echo $form->textField($model,'cp',array('size'=>5,'maxlength'=>10,'id'=>'cp')); ?>
			&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

			<div id="sin_cp" style="display: none">Tu búsqueda no dio ningún
				resultado (puedes poner los datos manualmente)</div>

			<?php echo $form->error($model,'cp'); ?>
		</div>

		<div id="datos_manual" style="display: none">Pon el domicilio
			manualmente (OJO: solo si el contacto tiene domicilio internacional)
			&raquo;</div>
			
		<?php if ($model->es_internacional) { ?>
		
		<div id="datos_listas">Regresar a las listas de
			datos nacionales &raquo;</div>
			
		<?php } else { ?>
		
		<div id="datos_listas" style="display: none">Regresar a las listas de
			datos nacionales &raquo;</div>
			
		<?php } ?>

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
			
			<div style="display: none;" id="datos_estado_manual">
				<?php echo CHtml::textField('estado_manual','',array('size'=>55,'maxlength'=>255,'id'=>'estado_manual')); ?>
			</div>

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
				<?php echo $form->labelEx($model,'ciudad'); ?>
				<?php echo $form->textField($model,'ciudad',array('size'=>55,'maxlength'=>255, 'id'=>'ciudad')); ?>
				<?php echo $form->error($model,'ciudad'); ?>

				<div id="sin_ciudad" class="color_enlace" style="display: none">Escoger
					de la lista &raquo;</div>
			</div>
		</div>

		<div id="datos_municipio_lista" style="display: inline">
			<div class="row">
				<?php echo CHtml::label('Delegación / Municipio','municipio_lista'); ?>
				<?php echo CHtml::dropDownList('municipio_lista','',array(), array('empty'=>'---Selecciona un municipio---', 'id'=>'municipio_lista', 'disabled'=>'disabled'
			)); ?>

				<div id="con_municipio" class="color_enlace" style="display: none">¿No
					encontraste el municipio? Anótalo &raquo;</div>
			</div>
		</div>

		<div id="datos_municipio" style="display: none;">
			<div class="row">
				<?php echo $form->labelEx($model,'municipio'); ?>
				<?php echo $form->textField($model,'municipio',array('size'=>55,'maxlength'=>255, 'id'=>'municipio')); ?>
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
				<?php echo $form->textField($model,'asentamiento',array('size'=>55,'maxlength'=>255, 'id'=>'asentamiento')); ?>
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
		</div>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'direccion'); ?>
		<?php echo $form->textField($model,'direccion',array('size'=>55,'maxlength'=>255, 'id'=>'direccion')); ?>
		<?php echo $form->error($model,'direccion'); ?>
	</div>

	<div class="row" style="display: none;">
		<?php echo $form->labelEx($model,'codigo_postal_id'); ?>
		<?php echo $form->textField($model,'codigo_postal_id',array('size'=>5,'maxlength'=>5,'id'=>'codigo_postal')); ?>
		<?php echo $form->error($model,'codigo_postal_id'); ?>
	</div>
</div>
