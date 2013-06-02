<?php

/**
 * This is the model class for table "medios".
 *
 * The followings are the available columns in table 'medios':
 * @property integer $id
 * @property string $grupo
 * @property string $medio
 * @property string $tipo_medio
 * @property string $perfil_medio
 * @property string $programa
 * @property string $seccion
 * @property string $suplemento
 * @property string $columna
 * @property string $fec_alta
 * @property string $fec_act
 * @property integer $usuarios_id
 *
 * The followings are the available model relations:
 * @property Usuarios $usuarios
 * @property Directorio $id0
 */
class Medios extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Medios the static model class
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
		return 'medios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			//array('id, fec_alta, fec_act, usuarios_id', 'required'),
		    array('id', 'required'),
			array('id, usuarios_id', 'numerical', 'integerOnly'=>true),
			array('grupo, medio, tipo_medio, perfil_medio, programa, seccion, suplemento, columna', 'length', 'max'=>255),
			//pone los vacios con null
			array('grupo, medio, tipo_medio, perfil_medio, programa, seccion, suplemento, columna', 'default', 'setOnEmpty'=>true, 'value'=>null),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, grupo, medio, tipo_medio, perfil_medio, programa, seccion, suplemento, columna, fec_alta, fec_act, usuarios_id', 'safe', 'on'=>'search'),
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
			'grupo' => 'Grupo',
			'medio' => 'Medio',
			'tipo_medio' => 'Tipo de medio',
			'perfil_medio' => 'Perfil del medio',
			'programa' => 'Programa',
			'seccion' => 'Sección',
			'suplemento' => 'Suplemento',
			'columna' => 'Columna',
			'fec_alta' => 'Fecha de creación',
			'fec_act' => 'Fecha de la ultima actualización',
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
		$criteria->compare('grupo',$this->grupo,true);
		$criteria->compare('medio',$this->medio,true);
		$criteria->compare('tipo_medio',$this->tipo_medio,true);
		$criteria->compare('perfil_medio',$this->perfil_medio,true);
		$criteria->compare('programa',$this->programa,true);
		$criteria->compare('seccion',$this->seccion,true);
		$criteria->compare('suplemento',$this->suplemento,true);
		$criteria->compare('columna',$this->columna,true);
		$criteria->compare('fec_alta',$this->fec_alta,true);
		$criteria->compare('fec_act',$this->fec_act,true);
		$criteria->compare('usuarios_id',$this->usuarios_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}