<?php

/**
 * This is the model class for table "asentamiento".
 *
 * The followings are the available columns in table 'asentamiento':
 * @property integer $id
 * @property string $nombre
 * @property string $fec_alta
 * @property string $fec_act
 * @property integer $municipio_id
 * @property integer $tipo_asentamiento_id
 *
 * The followings are the available model relations:
 * @property Municipio $municipio
 * @property TipoAsentamiento $tipoAsentamiento
 * @property CodigoPostal[] $codigoPostals
 */
class Asentamiento extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Asentamiento the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'asentamiento';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, fec_alta, fec_act, municipio_id, tipo_asentamiento_id', 'required'),
			array('municipio_id, tipo_asentamiento_id', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, fec_alta, fec_act, municipio_id, tipo_asentamiento_id', 'safe', 'on'=>'search'),
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
			'municipio' => array(self::BELONGS_TO, 'Municipio', 'municipio_id'),
			'tipoAsentamiento' => array(self::BELONGS_TO, 'TipoAsentamiento', 'tipo_asentamiento_id'),
			'codigoPostals' => array(self::HAS_MANY, 'CodigoPostal', 'asentamiento_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'nombre' => 'Nombre',
			'fec_alta' => 'Fec Alta',
			'fec_act' => 'Fec Act',
			'municipio_id' => 'Municipio',
			'tipo_asentamiento_id' => 'Tipo Asentamiento',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('fec_alta',$this->fec_alta,true);
		$criteria->compare('fec_act',$this->fec_act,true);
		$criteria->compare('municipio_id',$this->municipio_id);
		$criteria->compare('tipo_asentamiento_id',$this->tipo_asentamiento_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}