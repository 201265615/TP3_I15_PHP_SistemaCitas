<?php
/* @var $this DoctoresController */
/* @var $dataProvider CActiveDataProvider */
//Yii::app()->language=Yii::app()->user->idIdioma;
$this->breadcrumbs=array(
	Yii::t('Doctores','Doctores'),
);

//$this->menu=array(
//	array('label'=>'Create Doctores', 'url'=>array('create')),
//	array('label'=>'Manage Doctores', 'url'=>array('admin')),
//);
?>

<h1><?php echo Yii::t('Doctores','Doctores') ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
