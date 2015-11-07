<?php

/**
 * This is the model class for table "Usuarios".
 *
 * The followings are the available columns in table 'Usuarios':
 * @property integer $idUsuario
 * @property string $NombreCompleto
 * @property string $Telefono
 * @property string $CorreoElectronico
 * @property string $Contrasena
 * @property integer $Activo
 * @property string $FechaRegistro
 *
 * The followings are the available model relations:
 * @property Citas[] $citases
 */
class Usuarios extends CActiveRecord
{
    public $crypted_password;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Usuarios';
	}

        /**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('NombreCompleto, Telefono, CorreoElectronico, Contrasena, Idiomas_idIdioma', 'required'),
			//array('Idiomas_idIdioma', 'numerical', 'integerOnly'=>true),
			array('NombreCompleto, CorreoElectronico', 'length', 'max'=>50),
			array('Telefono', 'length', 'max'=>10),
			array('Contrasena', 'length', 'max'=>100),
			array('FechaRegistro', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idUsuario, NombreCompleto, Telefono, CorreoElectronico, Contrasena, Activo, FechaRegistro, Idiomas_idIdioma', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'citases' => array(self::HAS_MANY, 'Citas', 'Usuarios_idUsuario'),
			'idiomasIdIdioma' => array(self::BELONGS_TO, 'Idiomas', 'Idiomas_idIdioma'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idUsuario' => Yii::t('Usuarios','Id Usuario'),
			'NombreCompleto' => Yii::t('Usuarios','Nombre Completo'),
			'Telefono' => Yii::t('Usuarios','Telefono'),
			'CorreoElectronico' => Yii::t('Usuarios','Correo Electronico'),
			'Contrasena' => Yii::t('Usuarios','Contrasena'),
			'Activo' => Yii::t('Usuarios','Activo'),
			'FechaRegistro' => Yii::t('Usuarios','Fecha Registro'),
			'Idiomas_idIdioma' => Yii::t('Usuarios','Idiomas_idIdioma'),
		);
	}


	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idUsuario',$this->idUsuario);
		$criteria->compare('NombreCompleto',$this->NombreCompleto,true);
		$criteria->compare('Telefono',$this->Telefono,true);
		$criteria->compare('CorreoElectronico',$this->CorreoElectronico,true);
		$criteria->compare('Contrasena',$this->Contrasena,true);
		$criteria->compare('Activo',$this->Activo);
		$criteria->compare('FechaRegistro',$this->FechaRegistro,true);
		$criteria->compare('Idiomas_idIdioma',$this->Idiomas_idIdioma);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Usuarios the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        /**
	 * Checks if the given password is correct.
	 * @param string the password to be validated
	 * @return boolean whether the password is valid
	 */
	public function validatePassword($password)
	{
		return CPasswordHelper::verifyPassword($password,$this->Contrasena);
	}

	/**
	 * Generates the password hash.
	 * @param string password
	 * @return string hash
	 */
	public function hashPassword($password)
	{
		return CPasswordHelper::hashPassword($password);
	}
        

 
}
