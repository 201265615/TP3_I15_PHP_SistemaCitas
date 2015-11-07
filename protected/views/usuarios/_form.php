<?php
/* @var $this UsuariosController */
/* @var $model Usuarios */
/* @var $form CActiveForm */
if(Yii::app()->user->isGuest){
//    Yii::app()->language = 'en'; //por default ingles
}
else{
//    Yii::app()->language=Yii::app()->user->idIdioma;  //temporal para ver si funciona
}
//echo Yii::t('Usuarios','');
?>

<div class="form">

<?php if(Yii::app()->user->hasFlash(Yii::t('Usuarios','registrarse'))): ?>
 
<div class="flash-success" width="100">
    <?php echo Yii::app()->user->getFlash(Yii::t('Usuarios','registrarse')); ?>
</div>
 
<?php else: ?>
    
    
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuarios-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
    
        <?php echo Yii::t('Usuarios','Los campos con * son obligatorios.'); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'NombreCompleto'); ?>
		<?php echo $form->textField($model,'NombreCompleto',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'NombreCompleto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Telefono'); ?>
		<?php echo $form->textField($model,'Telefono',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'Telefono'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'CorreoElectronico'); ?>
		<?php echo $form->textField($model,'CorreoElectronico',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'CorreoElectronico'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'Contrasena'); ?>
		<?php echo $form->passwordField($model,'Contrasena',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'Contrasena'); ?>
	</div>
        
        <div class="row">
		<?php echo $form->labelEx($model,'Idiomas_idIdioma'); ?>
                <?php echo $form->dropDownList($model,'Idiomas_idIdioma',$this->getIdiomasOption());?>
		<?php echo $form->error($model,'Idiomas_idIdioma'); ?>		
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'Activo'); ?>
		<?php //echo $form->textField($model,'Activo'); ?>
		<?php //echo $form->error($model,'Activo'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'FechaRegistro'); ?>
		<?php //echo $form->textField($model,'FechaRegistro'); ?>
		<?php //echo $form->error($model,'FechaRegistro'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('Usuarios','Crear Usuario') : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<?php endif; ?>