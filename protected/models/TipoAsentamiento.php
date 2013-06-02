<?php

/**
 * This is the model class for table "tipo_asentamiento".
 *
 * The followings are the available columns in table 'tipo_asentamiento':
 * @property integer $id
 * @property string $nombre
 * @property string $fec_alta
 * @property string $fec_act
 *
 * The followings are the available model relations:
 * @property Asentamiento[] $asentamientos
 * @property Directorio[] $directorios
 * @property Directorio[] $directorios1
 */
class TipoAsentamiento extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TipoAsentamiento the static model class
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
		return 'tipo_asentamiento';
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
			'asentamientos' => array(self::HAS_MANY, 'Asentamiento', 'tipo_asentamiento_id'),
			'directorios' => array(self::HAS_MANY, 'Directorio', 'tipo_asentamiento_id'),
			'directorios1' => array(self::HAS_MANY, 'Directorio', 'tipo_asentamiento_id1'),
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