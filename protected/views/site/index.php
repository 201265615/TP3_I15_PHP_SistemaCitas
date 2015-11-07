<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1> <?php echo Yii::t('Index','Bienvenido(a) al sistema de citas')?> </h1>
<?php  
echo CHtml::image("images/doctores.jpg");  ?>   


<p>
    <br>
    <b>
        <?php echo Yii::t('Index','A través de esta página usted podrá reservar su cita con cualquiera de nuestros especialistas')?>
    </b>
</p>

<br><br>
<?php
if (Yii::app()->user->isGuest)  //para que esta información se muestre sólo si es guest
{
    echo "<ul><li>";
    echo Yii::t('Index',"Si usted ya se ha registrado en nuestra página, vaya a 'Iniciar Sesión'");
    echo "</li>  <br>";
    echo "<li>".Yii::t('Index',"Si usted es un paciente nuevo, vaya a 'Registrarse'").".</li> </ul>";
}
?>


        
<br><br>	


<p><?php echo Yii::t('Index','Para más información de nuestra clínica, puede contactarnos al: 2222-2222')?></p>
