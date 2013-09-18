<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>
	Bienvenido al <i><?php echo CHtml::encode(Yii::app()->name); ?> </i>
</h1>

<table width="80" align="center">
	<tr>
		<td width="25%"><?php echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl.'/imagenes/aplicacion/busca_usuario.png', 'busca usuario'), array('directorio/admin')) ?>
		</td>
		<td width="25%"><?php echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl.'/imagenes/aplicacion/crea_usuario.png', 'crea usuario'), array('directorio/create')) ?>
		</td>
		<td width="25%"><?php echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl.'/imagenes/aplicacion/busca_lista.png', 'busca lista'), array('listas/admin')) ?>
		</td>
		<td width="25%"><?php echo CHtml::link(CHtml::image(Yii::app()->request->baseUrl.'/imagenes/aplicacion/crea_lista.png', 'crea lista'), array('listas/create')) ?>
		</td>
	</tr>
</table>

<?php //$datos=MYPDF::datosBiodiversitas(); print_r($datos); ?>
