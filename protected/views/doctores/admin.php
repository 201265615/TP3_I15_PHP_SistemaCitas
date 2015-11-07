<?php
/* @var $this DoctoresController */
/* @var $model Doctores */
//Yii::app()->language=Yii::app()->user->idIdioma;  //temporal para ver si funciona
//echo Yii::t('Doctores',''); 
$this->breadcrumbs=array(
	Yii::t('Doctores','Doctores')=>array('index'),
	Yii::t('Doctores','Administrar Doctores'),
);

$this->menu=array(
	array('label'=>Yii::t('Doctores','Ver Doctores'), 'url'=>array('index')),
	array('label'=>Yii::t('Doctores','Crear Doctor'), 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#doctores-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Doctores</h1>

<?php echo Yii::t('Admin','You may optionally enter a comparison operator (<, <=, >, >=, <> or =) at the beginning of each of your search values to specify how the comparison should be done.'); ?>

<?php echo CHtml::link(Yii::t('Admin','Advanced Search'),'#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'doctores-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idDoctor',
		'NombreCompleto',
		'EspecialidadMedica',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
