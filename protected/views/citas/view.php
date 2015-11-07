<?php
/* @var $this CitasController */
/* @var $model Citas */

//Yii::app()->language=Yii::app()->user->idIdioma;  //temporal para ver si funciona
//echo Yii::t('Citas','');

$this->breadcrumbs=array(
	Yii::t('Citas','Citas')=>array('index'),
	$model->idCita,
);

if(Yii::app()->user->getName()=='admin'){
    $this->menu=array(
            array('label'=>Yii::t('Citas','Ver Citas'), 'url'=>array('index')),
            array('label'=>Yii::t('Citas','Crear Citas'), 'url'=>array('create')),
            array('label'=>Yii::t('Citas','Actualizar Citas'), 'url'=>array('update', 'id'=>$model->idCita)),
            array('label'=>Yii::t('Citas','Eliminar Cita'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idCita),'confirm'=>Yii::t('Citas','Esta seguro que desea eliminar esta cita?'))),
            array('label'=>Yii::t('Citas','Administrar Citas'), 'url'=>array('admin')),
    );
}
else{
    $this->menu=array(
            array('label'=>Yii::t('Citas','Ver Citas'), 'url'=>array('index')),
            array('label'=>Yii::t('Citas','Crear Citas'), 'url'=>array('create')),
            //array('label'=>'Update Citas', 'url'=>array('update', 'id'=>$model->idCita)),
            array('label'=>Yii::t('Citas','Eliminar Cita'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idCita),'confirm'=>Yii::t('Citas','Esta seguro que desea eliminar esta cita?'))),
            //array('label'=>'Manage Citas', 'url'=>array('admin')),
    );
    
}
?>

<h1><?php echo Yii::t('Citas','Cita').' #'.$model->idCita; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idCita',
		'Activo',
		//'Usuarios_idUsuario',
		//'HorariosDoctor_idHorarioDoctor',
	),
)); ?>
