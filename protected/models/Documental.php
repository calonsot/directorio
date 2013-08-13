<?php

/**
 * This is the model class for table "documental".
 *
 * The followings are the available columns in table 'documental':
 * @property integer $id
 * @property integer $es_valido
 * @property string $sigla_institucion
 * @property string $sigla_dependencia
 * @property string $dependencia
 * @property string $subdependencia
 * @property string $actividad
 * @property string $fec_alta
 * @property string $fec_act
 * @property integer $usuarios_id
 *
 * The followings are the available model relations:
 * @property Usuarios $usuarios
 * @property Directorio $id0
 */
class Documental extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Documental the static model class
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
		return 'documental';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id', 'required'),
			array('id, es_valido, usuarios_id', 'numerical', 'integerOnly'=>true),
			array('sigla_institucion, sigla_dependencia, dependencia, subdependencia, actividad', 'length', 'max'=>255),
			//pone los vacios como null
			array('sigla_institucion, sigla_dependencia, dependencia, subdependencia, actividad', 'default', 'setOnEmpty'=>true, 'value'=>null),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, es_valido, sigla_institucion, sigla_dependencia, dependencia, subdependencia, actividad, fec_alta, fec_act, usuarios_id', 'safe', 'on'=>'search'),
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
			'usuarios' => array(self::BELONGS_TO, 'Usuarios', 'usuarios_id'),
			'id0' => array(self::BELONGS_TO, 'Directorio', 'id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Identificador único',
			'es_valido' => '¿Es válido para envío biodiversitas?',
			'sigla_institucion' => 'Sigla institución',
			'sigla_dependencia' => 'Sigla dependencia',
			'dependencia' => 'Dependencia',
			'subdependencia' => 'Subdependencia',
			'actividad' => 'Actividad',
			'fec_alta' => 'Fecha de creación',
			'fec_act' => 'Fecha de última actualización',
			'usuarios_id' => 'Dueño',
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
		$criteria->compare('es_valido',$this->es_valido);
		$criteria->compare('sigla_institucion',$this->sigla_institucion,true);
		$criteria->compare('sigla_dependencia',$this->sigla_dependencia,true);
		$criteria->compare('dependencia',$this->dependencia,true);
		$criteria->compare('subdependencia',$this->subdependencia,true);
		$criteria->compare('actividad',$this->actividad,true);
		$criteria->compare('fec_alta',$this->fec_alta,true);
		$criteria->compare('fec_act',$this->fec_act,true);
		$criteria->compare('usuarios_id',$this->usuarios_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}