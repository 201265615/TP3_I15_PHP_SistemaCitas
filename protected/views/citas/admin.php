<?php
/* @var $this CitasController */
/* @var $model Citas */
//Yii::app()->language=Yii::app()->user->idIdioma;  //temporal para ver si funciona
//echo Yii::t('Citas','');

$this->breadcrumbs=array(
	Yii::t('Citas','Citas')=>array('index'),
	Yii::t('Citas','Administrar Citas'),
);

$this->menu=array(
	array('label'=>Yii::t('Citas','Ver Citas'), 'url'=>array('index')),
	array('label'=>Yii::t('Citas','Crear Citas'), 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#citas-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('Citas','Administrar Citas'); ?></h1>

<?php echo Yii::t('Admin','You may optionally enter a comparison operator (<, <=, >, >=, <> or =) at the beginning of each of your search values to specify how the comparison should be done.'); ?>

<?php echo CHtml::link(Yii::t('Admin','Advanced Search'),'#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'citas-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idCita',
		'Activo',
		'Usuarios_idUsuario',
		'HorariosDoctor_idHorarioDoctor',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
