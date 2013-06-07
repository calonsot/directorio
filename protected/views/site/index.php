<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>
	Bienvenido al <i><?php echo CHtml::encode(Yii::app()->name); ?> </i>
</h1>

<p>Puedes empezar por:</p>
<ul>
	<li>Crear un <?php echo CHtml::link(CHtml::encode('contacto.'), array('directorio/create')) ?>
	</li>
	<li>Crear una <?php echo CHtml::link(CHtml::encode('lista.'), array('listas/create')) ?>
	</li>
	<li>Buscar un  <?php echo CHtml::link(CHtml::encode('contacto.'), array('directorio/admin')) ?>
	</li>
	<li>Buscar una <?php echo CHtml::link(CHtml::encode('lista.'), array('listas/admin')) ?>
	</li>
</ul>

<iframe src="<?php //echo $this->createUrl('directorio/admin');?>" height="3750px" width="910px"></iframe>

