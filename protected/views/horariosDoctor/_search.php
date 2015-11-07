<?php
/* @var $this HorariosDoctorController */
/* @var $model HorariosDoctor */
/* @var $form CActiveForm */
//Yii::app()->language=Yii::app()->user->idIdioma;  //temporal para ver si funciona
//echo Yii::t('',''); 
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idHorarioDoctor'); ?>
		<?php echo $form->textField($model,'idHorarioDoctor'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FechaHoraInicio'); ?>
		<?php echo $form->textField($model,'FechaHoraInicio'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FechaHoraFin'); ?>
		<?php echo $form->textField($model,'FechaHoraFin'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Doctores_idDoctor'); ?>
		<?php echo $form->textField($model,'Doctores_idDoctor'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Disponible'); ?>
		<?php echo $form->textField($model,'Disponible'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->