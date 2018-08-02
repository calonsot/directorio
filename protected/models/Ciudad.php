<?php

/**
 * This is the model class for table "ciudad".
 *
 * The followings are the available columns in table 'ciudad':
 * @property integer $id
 * @property string $nombre
 * @property string $fec_alta
 * @property string $fec_act
 * @property integer $estado_id
 *
 * The followings are the available model relations:
 * @property Estado $estado
 * @property Directorio[] $directorios
 * @property Directorio[] $directorios1
 * @property Municipio[] $municipios
 */
class Ciudad extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Ciudad the static model class
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
		return 'ciudad';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, fec_alta, fec_act, estado_id', 'required'),
			array('estado_id', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, fec_alta, fec_act, estado_id', 'safe', 'on'=>'search'),
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
			'estado' => array(self::BELONGS_TO, 'Estado', 'estado_id'),
			'directorios' => array(self::HAS_MANY, 'Directorio', 'ciudad_id'),
			'directorios1' => array(self::HAS_MANY, 'Directorio', 'ciudad_id1'),
			'municipios' => array(self::HAS_MANY, 'Municipio', 'ciudad_id'),
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
			'estado_id' => 'Estado',
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
		$criteria->compare('estado_id',$this->estado_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}