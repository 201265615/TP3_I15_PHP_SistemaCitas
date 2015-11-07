<?php
/* @var $this DoctoresController */
/* @var $data Doctores */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('NombreCompleto')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->NombreCompleto), array('view', 'id'=>$data->idDoctor)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('EspecialidadMedica')); ?>:</b>
	<?php echo CHtml::encode($data->EspecialidadMedica); ?>
	<br />


</div>