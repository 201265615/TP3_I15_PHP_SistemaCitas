<?php
/* @var $this SiteController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */
//Yii::app()->language=Yii::app()->session['var_idIdioma'];//Yii::app()->user->idIdioma;  //temporal para ver si funciona
//echo Yii::t('Usuarios','');
$this->pageTitle=Yii::app()->name . ' - Login';
$this->breadcrumbs=array(
	 Yii::t('Usuarios','Iniciar Sesion'),
);
?>

<h1><?php echo Yii::t('Login','Iniciar Sesión')?></h1>

<p><?php echo Yii::t('Login','Por favor ingrese sus credenciales')?></p>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
)); ?>

	<p class="note"><?php echo Yii::t('Login','Campos con')?> 
            <span class="required">*</span> <?php echo Yii::t('Login','son obligatorios')?></p>

	<div class="row">
		<span class="required">*</span><?php echo Yii::t('Login','Correo Electrónico')?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<span class="required">*</span><?php echo Yii::t('Login','Contraseña')?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
		<p class="hint">
			<!-- Hint: You may login with <kbd>demo</kbd>/<kbd>demo</kbd> or <kbd>admin</kbd>/<kbd>admin</kbd>. -->
		</p>
	</div>

	<div class="row rememberMe">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo Yii::t('Login','Recordarme la próxima vez')?>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('Login','Iniciar Sesión')); ?>
	</div>

<?php $this->endWidget(); ?>
</div><!-- form -->
