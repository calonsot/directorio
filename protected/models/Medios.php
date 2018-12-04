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
 * @property integer $comunicados_prensa
 * @property integer $ecos
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
			array('id, usuarios_id, grupos_id, tipo_medios_id', 'numerical', 'integerOnly'=>true),
			array('medio, perfil_medio, programa, comunicados_prensa, ecos', 'length', 'max'=>255),
			//pone los vacios con null
			array('medio, perfil_medio, programa', 'default', 'setOnEmpty'=>true, 'value'=>null),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, grupos_id, medio, tipo_medios_id, perfil_medio, programa, comunicados_prensa, ecos, fec_alta, fec_act, usuarios_id', 'safe', 'on'=>'search'),
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
			'grupos' => array(self::BELONGS_TO, 'Grupos', 'grupos_id'),
			'tipo_medios' => array(self::BELONGS_TO, 'TipoMedios', 'tipo_medios_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Identificador único',
			'grupos_id' => 'Grupo especifico',
			'medio' => 'Medio',
			'tipo_medios_id' => 'Tipo de medio',
			'perfil_medio' => 'Perfil del medio',
			'programa' => 'Programa',
			'comunicados_prensa' => '¿Enviar comunicados de prensa?',
			'ecos' => '¿Suscrito a Ecos?',
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
		$criteria->compare('grupos_id',$this->grupos_id);
		$criteria->compare('medio',$this->medio,true);
		$criteria->compare('tipo_medios',$this->tipo_medios);
		$criteria->compare('perfil_medio',$this->perfil_medio,true);
		$criteria->compare('programa',$this->programa,true);
		$criteria->compare('comunicados_prensa',$this->comunicados_prensa);
		$criteria->compare('ecos',$this->ecos);
		$criteria->compare('fec_alta',$this->fec_alta,true);
		$criteria->compare('fec_act',$this->fec_act,true);
		$criteria->compare('usuarios_id',$this->usuarios_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}