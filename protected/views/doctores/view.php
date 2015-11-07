<?php
/* @var $this DoctoresController */
/* @var $model Doctores */
//Yii::app()->language=Yii::app()->user->idIdioma;  //temporal para ver si funciona
//echo Yii::t('',''); 
$this->breadcrumbs=array(
	Yii::t('Doctores','Doctores')=>array('index'),
	$model->idDoctor,
);

$this->menu=array(
	array('label'=>Yii::t('Doctores','Ver Doctores'), 'url'=>array('index')),
	//array('label'=>'Create Doctores', 'url'=>array('create')),
	//array('label'=>'Update Doctores', 'url'=>array('update', 'id'=>$model->idDoctor)),
	//array('label'=>'Delete Doctores', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idDoctor),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Manage Doctores', 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('Doctores','Doctor').' #'.$model->idDoctor; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'NombreCompleto',
		'EspecialidadMedica',
	),
)); ?>
