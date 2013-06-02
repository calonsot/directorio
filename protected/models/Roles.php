<?php

/**
 * This is the model class for table "roles".
 *
 * The followings are the available columns in table 'roles':
 * @property integer $id
 * @property string $nombre
 * @property string $atributos_base
 * @property string $tabla_base
 * @property string $tablas_adicionales
 * @property string $permisos
 * @property string $tipo_especifico
 * @property string $usuario_especifico
 * @property integer $admin
 * @property integer $super_usuario
 * @property string $fec_alta
 * @property string $fec_act
 *
 * The followings are the available model relations:
 * @property Usuarios[] $usuarioses
 */
class Roles extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Roles the static model class
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
		return 'roles';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre, atributos_base', 'required'),
			array('admin, super_usuario', 'numerical', 'integerOnly'=>true),
			array('nombre, tabla_base, tablas_adicionales, permisos, tipo_especifico, usuario_especifico', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, atributos_base, tabla_base, tablas_adicionales, permisos, tipo_especifico, usuario_especifico, admin, super_usuario, fec_alta, fec_act', 'safe', 'on'=>'search'),
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
			'usuarioses' => array(self::HAS_MANY, 'Usuarios', 'roles_id'),
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
			'atributos_base' => 'Atributos base',
			'tabla_base' => 'Tabla base',
			'tablas_adicionales' => 'Tablas adicionales',
			'permisos' => 'Permisos',
			'tipo_especifico' => 'Tipo especifico',
			'usuario_especifico' => 'Usuario especifico',
			'admin' => '¿Administrador?',
			'super_usuario' => '¿Super usuario?',
			'fec_alta' => 'Fecha alta',
			'fec_act' => 'Fecha actualizo',
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
		$criteria->compare('atributos_base',$this->atributos_base,true);
		$criteria->compare('tabla_base',$this->tabla_base,true);
		$criteria->compare('tablas_adicionales',$this->tablas_adicionales,true);
		$criteria->compare('permisos',$this->permisos,true);
		$criteria->compare('tipo_especifico',$this->tipo_especifico,true);
		$criteria->compare('usuario_especifico',$this->usuario_especifico,true);
		$criteria->compare('admin',$this->admin);
		$criteria->compare('super_usuario',$this->super_usuario);
		$criteria->compare('fec_alta',$this->fec_alta,true);
		$criteria->compare('fec_act',$this->fec_act,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}