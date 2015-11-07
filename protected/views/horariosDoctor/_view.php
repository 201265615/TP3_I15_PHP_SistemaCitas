<?php
/* @var $this HorariosDoctorController */
/* @var $data HorariosDoctor */
//Yii::app()->language=Yii::app()->user->idIdioma;  //temporal para ver si funciona
//echo Yii::t('',''); 
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idHorarioDoctor')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idHorarioDoctor), array('view', 'id'=>$data->idHorarioDoctor)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FechaHoraInicio')); ?>:</b>
	<?php echo CHtml::encode($data->FechaHoraInicio); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FechaHoraFin')); ?>:</b>
	<?php echo CHtml::encode($data->FechaHoraFin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Doctores_idDoctor')); ?>:</b>
	<?php echo CHtml::encode($data->Doctores_idDoctor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Disponible')); ?>:</b>
	<?php echo CHtml::encode($data->Disponible); ?>
	<br />


</div>