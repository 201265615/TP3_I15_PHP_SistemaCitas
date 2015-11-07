<?php
/* @var $this UsuariosController */
/* @var $dataProvider CActiveDataProvider */
//Yii::app()->language=Yii::app()->user->idIdioma;  //temporal para ver si funciona
//echo Yii::t('Usuarios','');
$this->breadcrumbs=array(
	Yii::t('Usuarios','Usuarios'),
);

$this->menu=array(
	array('label'=>Yii::t('Usuarios','Crear Usuario'), 'url'=>array('create')),
	array('label'=>Yii::t('Usuarios','Administrar Usuarios'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('Usuarios','Usuarios'); ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
