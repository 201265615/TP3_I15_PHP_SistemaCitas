<?php
/* @var $this CitasController */
/* @var $model Citas */
/* @var $form CActiveForm */

//Yii::app()->language=Yii::app()->user->idIdioma;  //temporal para ver si funciona
//echo Yii::t('','');
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'citas-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo Yii::t('Citas','Los campos con * son obligatorios.'); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php //echo $form->labelEx($model,'idCita'); ?>
		<?php //echo $form->textField($model,'idCita'); ?>
		<?php //echo $form->error($model,'idCita'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'Activo'); ?>
		<?php //echo $form->textField($model,'Activo'); ?>
		<?php //echo $form->error($model,'Activo'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'Usuarios_idUsuario'); ?>
		<?php //echo $form->textField($model,'Usuarios_idUsuario'); ?>
		<?php // echo $form->error($model,'Usuarios_idUsuario'); ?>
	</div>

	<div class="row">
		<?php /*echo $form->labelEx($model,'Doctores Disponibles'); ?>
		<?php echo $form->dropDownList($model,'idDoctor',$this->getDoctorsOption());?>
		<?php echo $form->error($model,'idDoctor'); */?>
	</div>     
        
        
        
        <div class="row">
		<?php echo $form->labelEx($model,'Doctores Disponibles'); ?>
		<?php echo $form->dropDownList($model,'idDoctor',
                        CHtml::listData(Doctores::model()->findAll(), 'idDoctor', 'NombreCompleto'),
                        
                        array(
                            'ajax'=>array(
                                'type' => 'POST',
                                'url' => CController::createUrl('Citas/Selectdos'),
                             //   'url' => CController::createUrl('CitasController/Selectdos'),
                                'update' => '#'.CHtml::activeId($model,'HorariosDoctor_idHorarioDoctor'),                                                                
                            ),                            
                        )                                                
                        );
                        ?>
		<?php echo $form->error($model,'idDoctor'); ?>
	</div>     
        
        <div class="row">
		<?php echo $form->labelEx($model,'HorariosDoctor_idHorarioDoctor'); ?>
                <?php echo $form->dropDownList($model,'HorariosDoctor_idHorarioDoctor',$this->getCitasOption());?>
		<?php echo $form->error($model,'HorariosDoctor_idHorarioDoctor'); ?>		
	</div>
        
        
        
        
        <div class="row">
		<?php //echo $form->labelEx($model,'HorariosDoctor_idHorarioDoctor'); ?>
                <?php //echo $form->dropDownList($model,'HorariosDoctor_idHorarioDoctor',array());?>
		<?php //echo $form->error($model,'HorariosDoctor_idHorarioDoctor'); ?>
		
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('Citas','Reservar Cita') : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->