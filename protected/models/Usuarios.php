<?php

/**
 * This is the model class for table "usuarios".
 *
 * The followings are the available columns in table 'usuarios':
 * @property integer $id
 * @property string $usuario
 * @property string $email
 * @property string $passwd
 * @property string $nombre
 * @property string $apellido
 * @property string $fec_alta
 * @property string $fec_act
 * @property integer $roles_id
 *
 * The followings are the available model relations:
 * @property DirJaci[] $dirJacis
 * @property Directorio[] $directorios
 * @property Exporta[] $exportas
 * @property Medios[] $medioses
 * @property Roles $roles
 */
class Usuarios extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Usuarios the static model class
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
		return 'usuarios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('usuario, email, passwd, nombre, apellido', 'required'),
			array('roles_id', 'numerical', 'integerOnly'=>true),
			array('usuario, email, passwd, nombre, apellido', 'length', 'max'=>255),
				//valida el email
			//array('email','email'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, usuario, email, passwd, nombre, apellido, fec_alta, fec_act, roles_id', 'safe', 'on'=>'search'),
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
			'documental' => array(self::HAS_MANY, 'Documental', 'usuarios_id'),
			'directorios' => array(self::HAS_MANY, 'Directorio', 'usuarios_id'),
			'listas' => array(self::HAS_MANY, 'Listas', 'usuarios_id'),
			'medioses' => array(self::HAS_MANY, 'Medios', 'usuarios_id'),
			'roles' => array(self::BELONGS_TO, 'Roles', 'roles_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'usuario' => 'Usuario',
			'email' => 'Correo',
			'passwd' => 'Contraseña',
			'nombre' => 'Nombre (s)',
			'apellido' => 'Apellido (s)',
			'fec_alta' => 'Fecha registro',
			'fec_act' => 'Fecha ultima actualización',
			'roles_id' => 'Roles',
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
		$criteria->compare('usuario',$this->usuario,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('passwd',$this->passwd,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('apellido',$this->apellido,true);
		$criteria->compare('fec_alta',$this->fec_alta,true);
		$criteria->compare('fec_act',$this->fec_act,true);
		$criteria->compare('roles_id',$this->roles_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}