<?php

/**
 * This is the model class for table "citas".
 *
 * The followings are the available columns in table 'citas':
 * @property integer $idCita
 * @property integer $Activo
 * @property integer $Usuarios_idUsuario
 * @property integer $HorariosDoctor_idHorarioDoctor
 *
 * The followings are the available model relations:
 * @property Horariosdoctor $horariosDoctorIdHorarioDoctor
 * @property Usuarios $usuariosIdUsuario
 */
class Citas extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
        public $idDoctor;
	public function tableName()
	{
		return 'Citas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('Usuarios_idUsuario, HorariosDoctor_idHorarioDoctor', 'required'),
			array('Activo, Usuarios_idUsuario, HorariosDoctor_idHorarioDoctor', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('Activo, Usuarios_idUsuario, HorariosDoctor_idHorarioDoctor', 'safe', 'on'=>'search'),
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
			'horariosDoctorIdHorarioDoctor' => array(self::BELONGS_TO, 'Horariosdoctor', 'HorariosDoctor_idHorarioDoctor'),
			'usuariosIdUsuario' => array(self::BELONGS_TO, 'Usuarios', 'Usuarios_idUsuario'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idCita' => Yii::t('Citas','Id Cita'),
			'Activo' => Yii::t('Citas','Activo'),
			'Usuarios_idUsuario' => Yii::t('Citas','Usuarios Id Usuario'),
			'HorariosDoctor_idHorarioDoctor' => Yii::t('Citas','Horarios'),
                        'Doctores Disponibles' => Yii::t('Citas','Doctores Disponibles'),
                        'Reservar Cita' => 'Reservar Cita',
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

		$criteria->compare('idCita',$this->idCita);
		$criteria->compare('Activo',$this->Activo);
		$criteria->compare('Usuarios_idUsuario',$this->Usuarios_idUsuario);
		$criteria->compare('HorariosDoctor_idHorarioDoctor',$this->HorariosDoctor_idHorarioDoctor);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Citas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function getCitasUsuario() {
            if(Yii::app()->user->getName()=='admin'){
                $rows = Yii::app()->db->createCommand()
                ->select('c.idCita, c.Usuarios_idUsuario, c.HorariosDoctor_idHorarioDoctor, h.FechaHoraInicio, h.FechaHoraFin, d.NombreCompleto')
                ->from('Citas c')
                ->join('HorariosDoctor h','c.HorariosDoctor_idHorarioDoctor = h.idHorarioDoctor')
                ->join('Doctores d', 'd.idDoctor = h.Doctores_idDoctor')
                //->where('c.Usuarios_idUsuario=:id', array(':id'=>Yii::app()->user->id))//donde el id del usuario sea el usuario actual
                ->order('h.FechaHoraInicio')
                ->queryAll();
            }
            else{
            $rows = Yii::app()->db->createCommand()
                ->select('c.idCita, c.Usuarios_idUsuario, c.HorariosDoctor_idHorarioDoctor, h.FechaHoraInicio, h.FechaHoraFin, d.NombreCompleto')
                ->from('Citas c')
                ->join('HorariosDoctor h','c.HorariosDoctor_idHorarioDoctor = h.idHorarioDoctor')
                ->join('Doctores d', 'd.idDoctor = h.Doctores_idDoctor')
                ->where('c.Usuarios_idUsuario=:id', array(':id'=>Yii::app()->user->id))//donde el id del usuario sea el usuario actual
                ->order('h.FechaHoraInicio')
                ->queryAll();
                //->queryRow();

                //var_dump($rows);
            }
            return $rows;
        }
}

