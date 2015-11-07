<?php
/* @var $this CitasController */
/* @var $model Citas */

$this->breadcrumbs=array(
	Yii::t('Citas','Citas')=>array('index'),
	$model->idCita=>array('view','id'=>$model->idCita),
	Yii::t('Citas','Actualizar Citas'),
);

$this->menu=array(
	array('label'=>Yii::t('Citas','Ver Citas'), 'url'=>array('index')),
        array('label'=>Yii::t('Citas','Crear Citas'), 'url'=>array('create')),
        array('label'=>Yii::t('Citas','Administrar Citas'), 'url'=>array('admin')),
);
?>

<h1>Update Citas <?php echo $model->idCita; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>