<?php
/* @var $this DirectorioController */
/* @var $model Directorio */
/* @var $form CActiveForm */
?>

<div class="wide form">

	<?php $form=$this->beginWidget('CActiveForm', array(
			'action'=>Yii::app()->createUrl($this->route),
			'method'=>'get',
)); ?>

	<div class="row">
		<?php //echo $form->label($model,'id'); ?>
		<?php //echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'es_internacional'); ?>
		<?php //echo $form->dropDownList($model, 'es_internacional', array('1'=>'Sí','0'=>'No',''=>'Muestra todos')); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'es_institucion'); ?>
		<?php //echo $form->dropDownList($model, 'es_institucion', array('1'=>'Sí','0'=>'No',''=>'Muestra todos')); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'nombre'); ?>
		<?php //echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'apellido'); ?>
		<?php //echo $form->textField($model,'apellido',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'institucion'); ?>
		<?php //echo $form->textField($model,'institucion',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo CHtml::label('Busca por nombre, apellido o empresa','alias'); ?>
		<?php echo $form->textField($model,'alias',array('size'=>60,'maxlength'=>255, 'id'=>'alias')); ?>
	</div>

	<div class="row">
		<?php echo CHtml::label('Busca en todos los correos','correos_totales'); ?>
		<?php echo $form->textField($model,'correos_totales',array('size'=>60,'maxlength'=>255, 'id'=>'correo')); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'correo_alternativo'); ?>
		<?php //echo $form->textField($model,'correo_alternativo',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'correos'); ?>
		<?php //echo $form->textArea($model,'correos',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo CHtml::label('Busca en todos los telefónos','telefonos_totales'); ?>
		<?php echo $form->textField($model,'telefonos_totales',array('size'=>60,'maxlength'=>255,'id'=>'telefono')); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'telefono_oficina'); ?>
		<?php //echo $form->textField($model,'telefono_oficina',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'telefono_casa'); ?>
		<?php //echo $form->textField($model,'telefono_casa',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'telefonos'); ?>
		<?php //echo $form->textArea($model,'telefonos',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'puesto'); ?>
		<?php //echo $form->textField($model,'puesto',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'nombre_asistente'); ?>
		<?php //echo $form->textField($model,'nombre_asistente',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'apellido_asistente'); ?>
		<?php //echo $form->textField($model,'apellido_asistente',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'pagina'); ?>
		<?php //echo $form->textField($model,'pagina',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'direccion'); ?>
		<?php //echo $form->textField($model,'direccion',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'direccion_alternativa'); ?>
		<?php //echo $form->textField($model,'direccion_alternativa',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'asentamiento'); ?>
		<?php //echo $form->textField($model,'asentamiento',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'asentamiento_alternativo'); ?>
		<?php //echo $form->textField($model,'asentamiento_alternativo',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'municipio'); ?>
		<?php //echo $form->textField($model,'municipio',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'municipio_alternativo'); ?>
		<?php //echo $form->textField($model,'municipio_alternativo',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'ciudad'); ?>
		<?php //echo $form->textField($model,'ciudad',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'ciudad_alternativa'); ?>
		<?php //echo $form->textField($model,'ciudad_alternativa',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'estado'); ?>
		<?php //echo $form->textField($model,'estado',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'estado_alternativo'); ?>
		<?php //echo $form->textField($model,'estado_alternativo',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'cp'); ?>
		<?php //echo $form->textField($model,'cp'); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'cp_alternativo'); ?>
		<?php //echo $form->textField($model,'cp_alternativo'); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'observaciones'); ?>
		<?php //echo $form->textArea($model,'observaciones',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'veces_consulta'); ?>
		<?php //echo $form->textField($model,'veces_consulta',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'fec_alta'); ?>
		<?php //echo $form->textField($model,'fec_alta'); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'fec_act'); ?>
		<?php //echo $form->textField($model,'fec_act'); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'tipo_id'); ?>
		<?php //echo $form->dropDownList($model,'tipo_id',CHtml::listData(Tipo::model()->findAll(), 'id', 'nombre'), 
				//		array('empty'=>'---Cualquiera---')); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'usuarios_id'); ?>
		<?php //echo $form->textField($model,'usuarios_id'); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'institucion_id'); ?>
		<?php //echo $form->textField($model,'institucion_id'); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'sector_idsector'); ?>
		<?php //echo $form->textField($model,'sector_idsector'); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'paises_id'); ?>
		<?php //echo $form->textField($model,'paises_id'); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'paises_id1'); ?>
		<?php //echo $form->textField($model,'paises_id1'); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'ciudad_id'); ?>
		<?php //echo $form->textField($model,'ciudad_id'); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'ciudad_id1'); ?>
		<?php //echo $form->textField($model,'ciudad_id1'); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'fotos_id'); ?>
		<?php //echo $form->textField($model,'fotos_id'); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'codigo_postal_id'); ?>
		<?php //echo $form->textField($model,'codigo_postal_id'); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'codigo_postal_id1'); ?>
		<?php //echo $form->textField($model,'codigo_postal_id1'); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'tipo_asentamiento_id'); ?>
		<?php //echo $form->textField($model,'tipo_asentamiento_id'); ?>
	</div>

	<div class="row">
		<?php //echo $form->label($model,'tipo_asentamiento_id1'); ?>
		<?php //echo $form->textField($model,'tipo_asentamiento_id1'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

	<?php $this->endWidget(); ?>

</div>
<!-- search-form -->
