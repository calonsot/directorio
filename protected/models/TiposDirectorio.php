<?php

/**
 * This is the model class for table "tipos_directorio".
 *
 * The followings are the available columns in table 'tipos_directorio':
 * @property integer $tipo_id
 * @property integer $directorio_id
 * @property string $fec_alta
 * @property string $fec_act
 */
class TiposDirectorio extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TiposDirectorio the static model class
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
		return 'tipos_directorio';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
				array('directorio_id, fec_alta', 'required'),
				array('tipo_id, directorio_id', 'numerical', 'integerOnly'=>true),
				// The following rule is used by search().
				// Please remove those attributes that should not be searched.
				array('tipo_id, directorio_id, fec_alta, fec_act', 'safe', 'on'=>'search'),
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
				'directorio_id' => array(self::BELONGS_TO, 'Directorio', 'directorio_id'),
				'tipo_id' => array(self::BELONGS_TO, 'Tipo', 'tipo_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
				'tipo_id' => 'Área(s)',
				'directorio_id' => 'Directorio',
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

		$criteria->compare('tipo_id',$this->tipo_id);
		$criteria->compare('directorio_id',$this->directorio_id);
		$criteria->compare('fec_alta',$this->fec_alta,true);
		$criteria->compare('fec_act',$this->fec_act,true);

		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
}