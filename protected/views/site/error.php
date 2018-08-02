<?php
/* @var $this SiteController */
/* @var $error array */

$this->pageTitle=Yii::app()->name . ' - Error';
/*
$this->breadcrumbs=array(
	'Error',
);*/
?>

<h2>Error <?php echo $code; ?></h2>

<div class="error" style="color: #FF0000;">
<?php echo CHtml::encode($message); ?>
</div>