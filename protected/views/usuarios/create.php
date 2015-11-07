<?php
/* @var $this UsuariosController */
/* @var $model Usuarios */
if(Yii::app()->user->isGuest){
//    Yii::app()->language = 'en'; //por default ingles
}
else{
//    Yii::app()->language=Yii::app()->user->idIdioma;  //temporal para ver si funciona
}//echo Yii::t('Usuarios','');
$this->breadcrumbs=array(
	Yii::t('Usuarios','Usuarios')=>array('index'),
	Yii::t('Usuarios','Crear'),
);

if(Yii::app()->user->getName()=='admin'){
    $this->menu=array(
            array('label'=>Yii::t('Usuarios','Ver Usuarios'), 'url'=>array('index')),
            array('label'=>Yii::t('Usuarios','Administrar Usuarios'), 'url'=>array('admin')),
    );
}
?>

<h1><?php echo Yii::t('Usuarios','Crear Usuario'); ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>