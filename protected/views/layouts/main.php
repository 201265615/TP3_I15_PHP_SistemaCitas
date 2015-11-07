<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
<?php 
/*
$GLOBALS['primeraVez'] = 0;

if(!Yii::app()->user->isGuest){
    //Yii::app()->language = 'en'; //por default ingles
    if($GLOBALS['primeraVez'] == 0){ //que no lo asigne si ya fue asignado
        Yii::app()->language=Yii::app()->user->idIdioma;
        $GLOBALS['primeraVez'] = 1;
    }
    //Yii::app()->language=Yii::app()->user->idIdioma;
   
}
else{
    //Yii::app()->setLanguage($lang);
    //Yii::app()->language=Yii::app()->user->idIdioma;  //temporal para ver si funciona
    //$idioma = 'es';
}*/
//echo Yii::t('Menu',''); ?>
 
<div class="container" id="page">

	<div id="header">
                <?php echo CHtml::form(); ?>
                    <div id="langdrop" style="float: right; padding: 15px 10px">
                        <?php 
                         $idioma = Yii::app()->language;
                        echo CHtml::dropDownList('_lang', Yii::app()->language, array(
                            'es' => 'Espanol','en' => 'English', 'fr' => 'Français'), array('submit' => '')                              
                                ); ?>
                    </div>
                <?php echo CHtml::endForm(); ?>
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php 
                if(Yii::app()->user->getName()=='admin'){
                    $this->widget('zii.widgets.CMenu',array(
                            'items'=>array(
                                    //array('label'=>'Inicio', 'url'=>array('post/index')),
                                    array('label'=>Yii::t('Menu','Citas'), 'url'=>array('/citas/admin'),'visible'=>!Yii::app()->user->isGuest), //muestra la vista si esta logueado
                                    array('label'=>Yii::t('Menu','Doctores'), 'url'=>array('/doctores/admin'), 'visible'=>!Yii::app()->user->isGuest), //muestra la vista si esta logueado
                                    array('label'=>Yii::t('Menu','Horarios'), 'url'=>array('/horariosDoctor/admin'),'visible'=>!Yii::app()->user->isGuest),
                                    array('label'=>Yii::t('Menu','Iniciar Sesion'), 'url'=>array('site/login'), 'visible'=>Yii::app()->user->isGuest),
                                    array('label'=>Yii::t('Menu','Usuarios'), 'url'=>array('/usuarios/admin'), 'visible'=>!Yii::app()->user->isGuest),
                                    array('label'=>Yii::t('Menu','Actualizar Perfil'), 'url'=>array('/usuarios/update&id='.Yii::app()->user->id), 'visible'=>!Yii::app()->user->isGuest),
                                    array('label'=>Yii::t('Menu','Registrarse'), 'url'=>array('usuarios/create'), 'visible'=>Yii::app()->user->isGuest),
                                    array('label'=>Yii::t('Menu','Cerrar Sesion (').Yii::app()->user->name.')', 'url'=>array('site/logout'), 'visible'=>!Yii::app()->user->isGuest)
                            ),
                    )); 
                }else{
                    $this->widget('zii.widgets.CMenu',array(
                            'items'=>array(
                                    //array('label'=>'Inicio', 'url'=>array('post/index')),
                                    array('label'=>Yii::t('Menu','Citas'), 'url'=>array('/citas'),'visible'=>!Yii::app()->user->isGuest), //muestra la vista si esta logueado
                                    array('label'=>Yii::t('Menu','Doctores'), 'url'=>array('/doctores'), 'visible'=>!Yii::app()->user->isGuest), //muestra la vista si esta logueado
                                    array('label'=>Yii::t('Menu','Iniciar Sesion'), 'url'=>array('site/login'), 'visible'=>Yii::app()->user->isGuest),
                                    array('label'=>Yii::t('Menu','Actualizar Perfil'), 'url'=>array('/usuarios/update&id='.Yii::app()->user->id), 'visible'=>!Yii::app()->user->isGuest),
                                    array('label'=>Yii::t('Menu','Registrarse'), 'url'=>array('usuarios/create'), 'visible'=>Yii::app()->user->isGuest),
                                    array('label'=>Yii::t('Menu','Cerrar Sesion (').Yii::app()->user->name.')', 'url'=>array('site/logout'), 'visible'=>!Yii::app()->user->isGuest)
                            ),
                    )); 
                    
                }
                ?>
            
	</div><!-- mainmenu -->

	<?php $this->widget('zii.widgets.CBreadcrumbs', array(
		'links'=>$this->breadcrumbs,
	)); ?><!-- breadcrumbs -->

	<?php echo $content; ?>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by Kevin Escobar Miranda - Fernanda Chaves Mu&ntildeoz.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>