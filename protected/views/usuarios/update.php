<?php
/* @var $this UsuariosController */
/* @var $model Usuarios */
//Yii::app()->language=Yii::app()->user->idIdioma;
$this->breadcrumbs=array(
	Yii::t('Usuarios','Usuarios')=>array('index'),
	$model->idUsuario=>array('view','id'=>$model->idUsuario),
	Yii::t('Usuarios','Update'),
);

if(Yii::app()->user->getName()=='admin'){
    $this->menu=array(
    	array('label'=>Yii::t('Usuarios','Ver Usuarios'), 'url'=>array('index')),
    	array('label'=>Yii::t('Usuarios','Crear Usuario'), 'url'=>array('create')),
    	array('label'=>Yii::t('Usuarios','Administrar Usuarios'), 'url'=>array('admin')),
    );
}

?>

<h1><?php echo Yii::t('Usuarios','Actualizar Usuario') ?></h1>

<?php
$model->Contrasena = "";

$this->renderPartial('_form', array('model'=>$model)); ?>