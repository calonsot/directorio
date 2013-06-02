<?php

/**
 * This is the model class for table "estado".
 *
 * The followings are the available columns in table 'estado':
 * @property integer $id
 * @property string $nombre
 * @property string $fec_alta
 * @property string $fec_act
 *
 * The followings are the available model relations:
 * @property Ciudad[] $ciudads
 * @property Municipio[] $municipios
 */
class Estado extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Estado the static model class
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
		return 'estado';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, fec_alta, fec_act', 'required'),
			array('nombre', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, fec_alta, fec_act', 'safe', 'on'=>'search'),
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
			'ciudads' => array(self::HAS_MANY, 'Ciudad', 'estado_id'),
			'municipios' => array(self::HAS_MANY, 'Municipio', 'estado_id'),
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

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}