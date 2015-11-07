<?php
/* @var $this CitasController */
/* @var $model Citas */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idCita'); ?>
		<?php echo $form->textField($model,'idCita'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Activo'); ?>
		<?php echo $form->textField($model,'Activo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Usuarios_idUsuario'); ?>
		<?php echo $form->textField($model,'Usuarios_idUsuario'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'HorariosDoctor_idHorarioDoctor'); ?>
		<?php echo $form->textField($model,'HorariosDoctor_idHorarioDoctor'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->