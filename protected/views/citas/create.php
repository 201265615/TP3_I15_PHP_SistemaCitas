<?php
/* @var $this CitasController */
/* @var $model Citas */
//Yii::app()->language=Yii::app()->user->idIdioma;  //temporal para ver si funciona
//echo Yii::t('',''); 
$this->breadcrumbs=array(
	Yii::t('Citas','Citas')=>array('index'),
	Yii::t('Citas','Create')
);

if(Yii::app()->user->getName()=='admin'){
    $this->menu=array(
	array('label'=>Yii::t('Citas','Ver Citas'), 'url'=>array('index')),
	array('label'=>Yii::t('Citas','Administrar Citas'), 'url'=>array('admin')),
    );
}
else{
    $this->menu=array(
	array('label'=>Yii::t('Citas','Ver Citas'), 'url'=>array('index')),
	//array('label'=>'Manage Citas', 'url'=>array('admin')),
    );
}

?>

<h1><?php echo Yii::t('Citas','Crear Citas') ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>