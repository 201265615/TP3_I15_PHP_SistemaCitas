<?php
/* @var $this DoctoresController */
/* @var $model Doctores */
//Yii::app()->language=Yii::app()->user->idIdioma;  //temporal para ver si funciona
//echo Yii::t('Doctores',''); 
$this->breadcrumbs=array(
	Yii::t('Doctores','Doctores')=>array('index'),
	Yii::t('Doctores','Crear'),
);

$this->menu=array(
	array('label'=>Yii::t('Doctores','Ver Doctores'), 'url'=>array('index')),
	array('label'=>Yii::t('Doctores','Administrar Doctores'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('Doctores','Crear Doctor'); ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>