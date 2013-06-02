<?php

/**
 * This is the model class for table "codigo_postal".
 *
 * The followings are the available columns in table 'codigo_postal':
 * @property integer $id
 * @property integer $codigo
 * @property string $fec_alta
 * @property string $fec_act
 * @property integer $asentamiento_id
 *
 * The followings are the available model relations:
 * @property Asentamiento $asentamiento
 * @property Directorio[] $directorios
 * @property Directorio[] $directorios1
 */
class CodigoPostal extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CodigoPostal the static model class
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
		return 'codigo_postal';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('codigo, fec_alta, fec_act, asentamiento_id', 'required'),
			array('codigo, asentamiento_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, codigo, fec_alta, fec_act, asentamiento_id', 'safe', 'on'=>'search'),
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
			'asentamiento' => array(self::BELONGS_TO, 'Asentamiento', 'asentamiento_id'),	
			'directorios' => array(self::HAS_MANY, 'Directorio', 'codigo_postal_id'),
			'directorios1' => array(self::HAS_MANY, 'Directorio', 'codigo_postal_id1'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'codigo' => 'Codigo',
			'fec_alta' => 'Fec Alta',
			'fec_act' => 'Fec Act',
			'asentamiento_id' => 'Asentamiento',
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
		$criteria->compare('codigo',$this->codigo);
		$criteria->compare('fec_alta',$this->fec_alta,true);
		$criteria->compare('fec_act',$this->fec_act,true);
		$criteria->compare('asentamiento_id',$this->asentamiento_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}