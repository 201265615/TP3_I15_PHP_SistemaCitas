<?php
/* @var $this CitasController */
/* @var $data Citas */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idCita')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idCita), array('view', 'id'=>$data->idCita)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Activo')); ?>:</b>
	<?php echo CHtml::encode($data->Activo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Usuarios_idUsuario')); ?>:</b>
	<?php echo CHtml::encode($data->Usuarios_idUsuario); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('HorariosDoctor_idHorarioDoctor')); ?>:</b>
	<?php echo CHtml::encode($data->HorariosDoctor_idHorarioDoctor); ?>
	<br />


</div>