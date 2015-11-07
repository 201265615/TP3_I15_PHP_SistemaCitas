<?php
/* @var $this HorariosDoctorController */
/* @var $model HorariosDoctor */
//Yii::app()->language=Yii::app()->user->idIdioma;  //temporal para ver si funciona
//echo Yii::t('',''); 
$this->breadcrumbs=array(
	Yii::t('HorariosDoctor','Horarios')=>array('index'),
	Yii::t('HorariosDoctor','Administrar Horarios'),
);

$this->menu=array(
	array('label'=>Yii::t('HorariosDoctor','Ver Horarios'), 'url'=>array('index')),
	array('label'=>Yii::t('HorariosDoctor','Crear Horario'), 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#horarios-doctor-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('HorariosDoctor','Administrar Horarios'); ?></h1>

<?php echo Yii::t('Admin','You may optionally enter a comparison operator (<, <=, >, >=, <> or =) at the beginning of each of your search values to specify how the comparison should be done.'); ?>

<?php echo CHtml::link(Yii::t('Admin','Advanced Search'),'#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'horarios-doctor-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idHorarioDoctor',
		'FechaHoraInicio',
		'FechaHoraFin',
		'Doctores_idDoctor',
		'Disponible',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
