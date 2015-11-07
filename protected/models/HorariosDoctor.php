<?php

/**
 * This is the model class for table "HorariosDoctor".
 *
 * The followings are the available columns in table 'HorariosDoctor':
 * @property integer $idHorarioDoctor
 * @property string $FechaHoraInicio
 * @property string $FechaHoraFin
 * @property integer $Doctores_idDoctor
 * @property integer $Disponible
 *
 * The followings are the available model relations:
 * @property Citas[] $citases
 * @property Doctores $doctoresIdDoctor
 */
class HorariosDoctor extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'HorariosDoctor';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('FechaHoraInicio, FechaHoraFin, Doctores_idDoctor', 'required'),
			array('Doctores_idDoctor, Disponible', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idHorarioDoctor, FechaHoraInicio, FechaHoraFin, Doctores_idDoctor, Disponible', 'safe', 'on'=>'search'),
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
			'citases' => array(self::HAS_MANY, 'Citas', 'HorariosDoctor_idHorarioDoctor'),
			'doctoresIdDoctor' => array(self::BELONGS_TO, 'Doctores', 'Doctores_idDoctor'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idHorarioDoctor' => Yii::t('HorariosDoctor','Id Horario Doctor'),
			'FechaHoraInicio' => Yii::t('HorariosDoctor','Fecha Hora Inicio'),
			'FechaHoraFin' => Yii::t('HorariosDoctor','Fecha Hora Fin'),
			'Doctores_idDoctor' => Yii::t('HorariosDoctor','Id Doctor'),
			'Disponible' => Yii::t('HorariosDoctor','Disponible'),
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

		$criteria->compare('idHorarioDoctor',$this->idHorarioDoctor);
		$criteria->compare('FechaHoraInicio',$this->FechaHoraInicio,true);
		$criteria->compare('FechaHoraFin',$this->FechaHoraFin,true);
		$criteria->compare('Doctores_idDoctor',$this->Doctores_idDoctor);
		$criteria->compare('Disponible',$this->Disponible);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return HorariosDoctor the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
