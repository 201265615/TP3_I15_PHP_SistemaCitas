<?php
/* @var $this DoctoresController */
/* @var $model Doctores */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'doctores-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo Yii::t('Doctores','Los campos con * son obligatorios.'); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'NombreCompleto'); ?>
		<?php echo $form->textField($model,'NombreCompleto',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'NombreCompleto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'EspecialidadMedica'); ?>
		<?php echo $form->textField($model,'EspecialidadMedica',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'EspecialidadMedica'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('Doctores','Crear Doctor') : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->