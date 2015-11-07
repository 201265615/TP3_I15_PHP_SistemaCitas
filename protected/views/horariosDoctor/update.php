<?php
/* @var $this HorariosDoctorController */
/* @var $model HorariosDoctor */
//Yii::app()->language=Yii::app()->user->idIdioma;  //temporal para ver si funciona
//echo Yii::t('',''); 
$this->breadcrumbs=array(
	Yii::t('HorariosDoctor','Horarios')=>array('index'),
	$model->idHorarioDoctor=>array('view','id'=>$model->idHorarioDoctor),
	Yii::t('HorariosDoctor','Actualizar Horario'),
);

$this->menu=array(
	array('label'=>Yii::t('HorariosDoctor','Ver Horarios'), 'url'=>array('index')),
	array('label'=>Yii::t('HorariosDoctor','Crear Horario'), 'url'=>array('create')),
	array('label'=>Yii::t('HorariosDoctor','Administrar Horarios'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('HorariosDoctor','Actualizar Horario').' #'.$model->idHorarioDoctor; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>