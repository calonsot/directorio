<?php

/**
 * This is the model class for table "listas".
 *
 * The followings are the available columns in table 'listas':
 * @property integer $id
 * @property string $nombre
 * @property string $cadena
 * @property string $atributos
 * @property integer $esta_activa
 * @property integer $veces_consulta
 * @property string $fec_alta
 * @property string $fec_act
 * @property integer $usuarios_id
 * @property integer $formatos_id
 *
 * The followings are the available model relations:
 * @property Usuarios $usuarios
 * @property Formatos $formatos
 */
class Listas extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Listas the static model class
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
		return 'listas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
				array('nombre, atributos', 'required'),
				array('usuarios_id, formatos_id, esta_activa, veces_consulta', 'numerical', 'integerOnly'=>true),
				array('nombre', 'length', 'max'=>255),
				array('cadena, atributos', 'safe'),
				//pone los vacios como nulos
				array('cadena, atributos', 'default', 'setOnEmpty'=>true, 'value'=>null),
				// The following rule is used by search().
				// Please remove those attributes that should not be searched.
				array('id, nombre, cadena, atributos, esta_activa, veces_consulta, fec_alta, fec_act, usuarios_id, formatos_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * (non-PHPdoc)
	 * @see CActiveRecord::beforeSave()
	 */
	public function beforeSave()
	{

	 if ($this->esta_activa == 1)
	 {
	 	$activas=Listas::model()->findAllByAttributes(array('esta_activa'=>1, 'usuarios_id'=>Yii::app()->user->id_usuario));
	 	
	 	foreach ($activas as $act)
	 	{
	 		$act->esta_activa=0;
	 		$act->saveAttributes(array('esta_activa'));
	 	}
	 }

	 return parent::beforeSave();
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
				'formatos' => array(self::BELONGS_TO, 'Formatos', 'formatos_id'),
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
				'cadena' => 'Cadena de contactos',
				'atributos' => 'Columnas de datos',
				'esta_activa' => '¿Esta activa?',
				'veces_consulta' => 'Número de veces consultada',
				'fec_alta' => 'Fecha de creación',
				'fec_act' => 'Fecha de la ultima actualización',
				'usuarios_id' => 'Dueño',
				'formatos_id' => 'Formato',
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
		$criteria->compare('cadena',$this->cadena,true);
		$criteria->compare('atributos',$this->atributos,true);
		$criteria->compare('esta_activa',$this->esta_activa,true);
		$criteria->compare('veces_consulta',$this->veces_consulta,true);
		$criteria->compare('fec_alta',$this->fec_alta,true);
		$criteria->compare('fec_act',$this->fec_act,true);
		$criteria->compare('usuarios_id',$this->usuarios_id);
		$criteria->compare('formatos_id',$this->formatos_id);
		$criteria->addCondition('usuarios_id='.Yii::app()->user->id_usuario,'AND');
		$criteria->addCondition('usuarios_id='.Yii::app()->user->id_usuario,'AND');
		

		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
}