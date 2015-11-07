<?php
/* @var $this HorariosDoctorController */
/* @var $dataProvider CActiveDataProvider */
//Yii::app()->language=Yii::app()->user->idIdioma;  //temporal para ver si funciona
//echo Yii::t('',''); 
$this->breadcrumbs=array(
	Yii::t('HorariosDoctor','Horarios'),
);

$this->menu=array(
	array('label'=>Yii::t('HorariosDoctor','Crear Horario'), 'url'=>array('create')),
	array('label'=>Yii::t('HorariosDoctor','Administrar Horarios'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('HorariosDoctor','Horarios'); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
