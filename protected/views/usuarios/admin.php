<?php
/* @var $this UsuariosController */
/* @var $model Usuarios */
//Yii::app()->language=Yii::app()->user->idIdioma;  //temporal para ver si funciona
//echo Yii::t('Usuarios','');
$this->breadcrumbs=array(
	Yii::t('Usuarios','Usuarios')=>array('index'),
	Yii::t('Usuarios','Administrar Usuarios'),
);

$this->menu=array(
	array('label'=>Yii::t('Usuarios','Ver Usuarios'), 'url'=>array('index')),
	array('label'=>Yii::t('Usuarios','Crear Usuario'), 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#usuarios-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('Usuarios','Administrar Usuarios'); ?></h1>

<?php echo Yii::t('Admin','You may optionally enter a comparison operator (<, <=, >, >=, <> or =) at the beginning of each of your search values to specify how the comparison should be done.'); ?>

<?php echo CHtml::link(Yii::t('Admin','Advanced Search'),'#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'usuarios-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idUsuario',
		'NombreCompleto',
		'Telefono',
		'CorreoElectronico',
		'Contrasena',
		'Activo',
		/*
		'FechaRegistro',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
