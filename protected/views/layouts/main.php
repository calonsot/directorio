<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="language" content="es.MX" />

<!-- blueprint CSS framework -->
<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css"
	media="screen, projection" />
<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css"
	media="print" />
<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
<link rel="stylesheet" type="text/css"
	href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

<script type="text/javascript"
	src="<?php echo Yii::app()->request->baseUrl; ?>/assets/js/jquery-1.9.1.min.js"></script>

<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

	<div class="container" id="page">

		<div id="header">
			<div id="logo">
				<?php echo CHtml::image('/directorio/imagenes/aplicacion/directorio_banner.png', 'directorio CONABIO', array('width'=>'80%')) ?>
				<?php echo CHtml::image('/directorio/imagenes/aplicacion/conabio.png', 'CONABIO', array('width'=>'15%')) ?>
			</div>
		</div>
		<!-- header -->

		<div id="mainmenu">
			<?php $this->widget('zii.widgets.CMenu',array(
					'items'=>array(
				array('label'=>'Inicio', 'url'=>array('/site/index')),
				array('label'=>'Directorio', 'url'=>array('/directorio/index'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Mis listas', 'url'=>array('/listas/index'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Mi cuenta', 'url'=>Yii::app()->createUrl('usuarios/view',array(
						'id'=>$this->verificaLogin())), 'visible'=>!Yii::app()->user->isGuest),
				//array('label'=>'(Ningúna lista activa)', 'url'=>Yii::app()->createUrl('usuarios/view',array(
				//'id'=>$this->verificaLogin())), 'visible'=>!Yii::app()->user->isGuest),
				//array('label'=>Listas::model()->findByAttributes(array('esta_activa'=>1))->nombre.'(lista activa)', 'url'=>Yii::app()->createUrl('usuarios/view',array(
				//'id'=>$this->verificaLogin())), 'visible'=>!Yii::app()->user->isGuest),
				//array('label'=>'Dudas y sugerencias', 'url'=>array('/site/contact')),
				//array('label'=>'Importa contactos desde archivo', 'url'=>array('/directorio/importacontactos'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>'Iniciar sesión', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Cerrar sesión ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
		</div>
		<!-- mainmenu -->
		<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
				'links'=>$this->breadcrumbs,
		)); ?>
		<!-- breadcrumbs -->
		<?php endif?>

		<?php echo $content; ?>

		<div class="clear"></div>

		<div id="footer">
			Derechos reservados &copy;
			<?php echo date('Y'); ?>
			- CONABIO<br />
			<?php //echo Yii::powered(); ?>
		</div>
		<!-- footer -->

	</div>
	<!-- page -->

</body>
</html>
