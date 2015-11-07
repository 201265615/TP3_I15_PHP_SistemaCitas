<?php
/* @var $this HorariosDoctorController */
/* @var $model HorariosDoctor */
//Yii::app()->language=Yii::app()->user->idIdioma;  //temporal para ver si funciona
//echo Yii::t('',''); 
$this->breadcrumbs=array(
	Yii::t('HorariosDoctor','Horarios')=>array('index'),
	$model->idHorarioDoctor,
);

$this->menu=array(
	array('label'=>Yii::t('HorariosDoctor','Ver Horarios'), 'url'=>array('index')),
	array('label'=>Yii::t('HorariosDoctor','Crear Horario'), 'url'=>array('create')),
	array('label'=>Yii::t('HorariosDoctor','Actualizar Horario'), 'url'=>array('update', 'id'=>$model->idHorarioDoctor)),
	array('label'=>Yii::t('HorariosDoctor','Eliminar Horario'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idHorarioDoctor),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('HorariosDoctor','Administrar Horarios'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('HorariosDoctor','Horario').' #'.$model->idHorarioDoctor; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idHorarioDoctor',
		'FechaHoraInicio',
		'FechaHoraFin',
		'Doctores_idDoctor',
		'Disponible',
	),
)); ?>
