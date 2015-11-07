<?php
/* @var $this UsuariosController */
/* @var $model Usuarios */

//Yii::app()->language=Yii::app()->user->idIdioma;  //temporal para ver si funciona
//echo Yii::t('Usuarios','');
$this->breadcrumbs=array(
	Yii::t('Usuarios','Usuarios')=>array('index'),
	$model->idUsuario,
);

if(Yii::app()->user->getName()=='admin'){
    $this->menu=array(
            array('label'=>Yii::t('Usuarios','Ver Usuarios'), 'url'=>array('index')),
            array('label'=>Yii::t('Usuarios','Crea Usuario'), 'url'=>array('create')),
            array('label'=>Yii::t('Usuarios','Actualizar Usuario'), 'url'=>array('update', 'id'=>$model->idUsuario)),
            array('label'=>Yii::t('Usuarios','Eliminar Usuario'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idUsuario),'confirm'=>'Are you sure you want to delete this item?')),
            array('label'=>Yii::t('Usuarios','Administrar Usuarios'), 'url'=>array('admin')),
    );
}
?>

<h1><?php echo Yii::t('Usuarios','Usuario').' #'.$model->idUsuario; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'idUsuario',
		'NombreCompleto',
		'Telefono',
		'CorreoElectronico',
		//'Contrasena',
		//'Activo',
		//'FechaRegistro',
	),
)); ?>
