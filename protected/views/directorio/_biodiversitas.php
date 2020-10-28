
<div id="datos_documental">

	<?php if (!$model_c->isNewRecord && ($datos['super_usuario']==1 || Yii::app()->user->id_usuario==5)) { ?>
	<div class="row">
		<?php echo $form->labelEx($model_c,'es_valido'); ?>
		<?php echo $form->dropDownList($model_c, 'es_valido', array(0=>"No", 1=>"Sí"), 
						array('id'=>'es_valido')); ?>
		<?php echo $form->error($model_c,'es_valido'); ?>
	</div>
	
	<?php } ?>

	<div class="row">
		<?php echo $form->labelEx($model_c,'confirmo'); ?>
		<?php echo $form->dropDownList($model_c, 'confirmo', array(0=>"No", 1=>"Sí"), 
						array('id'=>'confirmo')); ?>
		<?php echo $form->error($model_c,'confirmo'); ?>
	</div>

    <div class="row">
        <?php echo $form->labelEx($model_c,'es_valido_alt'); ?>
        <?php echo $form->dropDownList($model_c, 'es_valido_alt', array(0=>"No", 1=>"Sí"),
            array('id'=>'es_valido_alt')); ?>
        <?php echo $form->error($model_c,'es_valido_alt'); ?>
    </div>
	
	<div class="row">
		<?php echo $form->labelEx($model_c,'sigla_institucion'); ?>
		<?php echo $form->textField($model_c,'sigla_institucion',array('size'=>55,'maxlength'=>255,'id'=>'sigla_institucion')); ?>
		<?php echo $form->error($model_c,'sigla_institucion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model_c,'dependencia'); ?>
		<?php echo $form->textField($model_c,'dependencia',array('size'=>55,'maxlength'=>255,'id'=>'dependencia')); ?>
		<?php echo $form->error($model_c,'dependencia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model_c,'sigla_dependencia'); ?>
		<?php echo $form->textField($model_c,'sigla_dependencia',array('size'=>55,'maxlength'=>255,'id'=>'sigla_dependencia')); ?>
		<?php echo $form->error($model_c,'sigla_dependencia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model_c,'subdependencia'); ?>
		<?php echo $form->textField($model_c,'subdependencia',array('size'=>55,'maxlength'=>255,'id'=>'subdependencia')); ?>
		<?php echo $form->error($model_c,'subdependencia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model_c,'actividad'); ?>
		<?php echo $form->textField($model_c,'actividad',array('size'=>55,'maxlength'=>255,'id'=>'actividad')); ?>
		<?php echo $form->error($model_c,'actividad'); ?>
	</div>
</div>
