<?php

/**
 * This is the model class for table "directorio".
 *
 * The followings are the available columns in table 'directorio':
 * @property integer $id
 * @property integer $es_internacional
 * @property integer $es_institucion
 * @property string $nombre
 * @property string $apellido
 * @property string $institucion
 * @property string $correo
 * @property string $correo_alternativo
 * @property string $correos
 * @property string $telefono_particular
 * @property string $telefono_oficina
 * @property string $telefono_casa
 * @property string $telefonos
 * @property string $puesto
 * @property string $nombre_asistente
 * @property string $apellido_asistente
 * @property string $pagina
 * @property string $direccion
 * @property string $direccion_alternativa
 * @property string $asentamiento
 * @property string $asentamiento_alternativo
 * @property string $municipio
 * @property string $municipio_alternativo
 * @property string $ciudad
 * @property string $ciudad_alternativa
 * @property string $estado
 * @property string $estado_alternativo
 * @property integer $cp
 * @property integer $cp_alternativo
 * @property string $observaciones
 * @property string $veces_consulta
 * @property string $fec_alta
 * @property string $fec_act
 * @property integer $tipo_id
 * @property integer $usuarios_id
 * @property integer $institucion_id
 * @property integer $sector_id
 * @property integer $paises_id
 * @property integer $ciudad_id
 * @property integer $ciudad_id1
 * @property integer $paises_id1
 * @property integer $fotos_id
 * @property integer $codigo_postal_id
 * @property integer $codigo_postal_id1
 * @property integer $tipo_asentamiento_id
 * @property integer $tipo_asentamiento_id1
 *
 * The followings are the available model relations:
 * @property Fotos $fotos
 * @property Tipo $tipo
 * @property Usuarios $usuarios
 * @property Paises $paises
 * @property Ciudad $ciudad
 * @property CodigoPostal $codigoPostal
 * @property Sector $sectorIdsector
 * @property CodigoPostal $codigoPostalId1
 * @property TipoAsentamiento $tipoAsentamiento
 * @property TipoAsentamiento $tipoAsentamientoId1
 * @property Paises $paisesId1
 * @property Ciudad $ciudadId1
 * @property Paises $paisesId1
 * @property Institucion $institucion0
 * @property Documental $documental
 * @property Medios $medios
 */
class Directorio extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Directorio the static model class
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
		return 'directorio';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		//$validator = new EmptyNullValidator();
		//$validator->validateAttribute($object, $attribute)

		return array(
				//array('usuarios_id', 'required'),
				array('id, es_internacional, es_institucion, cp, cp_alternativo, tipo_id, usuarios_id, institucion_id, sector_id, paises_id, paises_id1, ciudad_id, ciudad_id1, fotos_id, codigo_postal_id, codigo_postal_id1, tipo_asentamiento_id, tipo_asentamiento_id1', 'numerical', 'integerOnly'=>true),
				array('nombre, apellido, institucion, correo, correo_alternativo, telefono_particular, telefono_oficina, telefono_casa, puesto, nombre_asistente, apellido_asistente, pagina, direccion, direccion_alternativa, asentamiento, asentamiento_alternativo, municipio, municipio_alternativo, ciudad, ciudad_alternativa, estado, estado_alternativo', 'length', 'max'=>255),
				array('veces_consulta', 'length', 'max'=>20),
				array('correos, telefonos, observaciones', 'safe'),
				//valida el campo para mail
		array('correo, correo_alternativo', 'email'),
		//set empty values to null
		array('nombre, apellido, institucion, correo, correo_alternativo, correos, telefono_particular, telefono_oficina, telefono_casa, telefonos, puesto, nombre_asistente, apellido_asistente, pagina, direccion, direccion_alternativa, asentamiento, asentamiento_alternativo, municipio, municipio_alternativo, ciudad, ciudad_alternativa, estado, estado_alternativo, observaciones', 'default', 'setOnEmpty'=>true, 'value'=>null),
		// The following rule is used by search().
		// Please remove those attributes that should not be searched.
		array('id, es_internacional, es_institucion, nombre, apellido, institucion, correo, correo_alternativo, correos, telefono_particular, telefono_oficina, telefono_casa, telefonos, puesto, nombre_asistente, apellido_asistente, pagina, direccion, direccion_alternativa, asentamiento, asentamiento_alternativo, municipio, municipio_alternativo, ciudad, ciudad_alternativa, estado, estado_alternativo, cp, cp_alternativo, observaciones, veces_consulta, fec_alta, fec_act, tipo_id, usuarios_id, institucion_id, sector_id, paises_id, paises_id1, ciudad_id, ciudad_id1, fotos_id, codigo_postal_id, codigo_postal_id1, tipo_asentamiento_id, tipo_asentamiento_id1', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * (non-PHPdoc)
	 * @see CActiveRecord::beforeSave()
	 */
	public function beforeSave()
	{
		if ($this->isNewRecord) {

			$correo=Directorio::model()->findByAttributes(array('correo'=>$this->correo));
			$correo_alternativo=Directorio::model()->findByAttributes(array('correo_alternativo'=>$this->correo_alternativo));
				
			if ($correo != null || $correo_alternativo != null) {
				//return 'el correo esta repetido';
				return false;

				//	} else {
				//return parent::beforeSave();
				//}


			} else {
				return parent::beforeSave();
			}

			//return parent::beforeSave();
		}
	}


	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
				'fotos' => array(self::BELONGS_TO, 'Fotos', 'fotos_id'),
				'tipo' => array(self::BELONGS_TO, 'Tipo', 'tipo_id'),
				'usuarios' => array(self::BELONGS_TO, 'Usuarios', 'usuarios_id'),
				'paises' => array(self::BELONGS_TO, 'Paises', 'paises_id'),
				'ciudad' => array(self::BELONGS_TO, 'Ciudad', 'ciudad_id'),
				'codigoPostal' => array(self::BELONGS_TO, 'CodigoPostal', 'codigo_postal_id'),
				'sectorId' => array(self::BELONGS_TO, 'Sector', 'sector_id'),
				'codigoPostalId1' => array(self::BELONGS_TO, 'CodigoPostal', 'codigo_postal_id1'),
				'tipoAsentamiento' => array(self::BELONGS_TO, 'TipoAsentamiento', 'tipo_asentamiento_id'),
				'tipoAsentamientoId1' => array(self::BELONGS_TO, 'TipoAsentamiento', 'tipo_asentamiento_id1'),
				'paisesId1' => array(self::BELONGS_TO, 'Paises', 'paises_id1'),
				'ciudadId1' => array(self::BELONGS_TO, 'Ciudad', 'ciudad_id1'),
				'institucion0' => array(self::BELONGS_TO, 'Institucion', 'institucion_id'),
				'documental' => array(self::HAS_ONE, 'Documental', 'id'),
				'medios' => array(self::HAS_ONE, 'Medios', 'id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
				'id' => 'Identificador único',
				'es_internacional' => '¿Es internacional?',
				'es_institucion' => '¿Es una institución?',
				'nombre' => 'Nombre(s)',
				'apellido' => 'Apellido(s)',
				'institucion' => 'Nombre de la institución',
				'correo' => 'Correo',
				'correo_alternativo' => 'Correo alternativo',
				'correos' => 'Muchos correos',
				'telefono_particular' => 'Telefóno particular',
				'telefono_oficina' => 'Telefóno oficina',
				'telefono_casa' => 'Telefóno casa',
				'telefonos' => 'Muchos telefónos',
				'puesto' => 'Puesto del contacto',
				'nombre_asistente' => 'Nombre(s) del asistente',
				'apellido_asistente' => 'Apellido(s) del asistente',
				'pagina' => 'Pagina web',
				'direccion' => 'Dirección',
				'direccion_alternativa' => 'Dirección alternativa',
				'asentamiento' => 'Colonia',
				'asentamiento_alternativo' => 'Colonia alternativa',
				'municipio' => 'Municipio',
				'municipio_alternativo' => 'Municipio alternativo',
				'ciudad' => 'Ciudad',
				'ciudad_alternativa' => 'Ciudad alternativa',
				'estado' => 'Estado',
				'estado_alternativo' => 'Estado alternativo',
				'cp' => 'Código postal',
				'cp_alternativo' => 'Código postal alternativo',
				'observaciones' => 'Observaciones',
				'veces_consulta' => 'Número de veces consultado',
				'fec_alta' => 'Fecha de creación',
				'fec_act' => 'Fecha de la ultima actualización',
				'tipo_id' => 'Tipo de clasificación',
				'usuarios_id' => 'Dueño',
				'institucion_id' => 'Institución',
				'sector_id' => 'Sector',
				'paises_id' => 'País',
				'paises_id1' => 'País alternativo',
				'ciudad_id' => 'Ciudad',
				'ciudad_id1' => 'CiudadId1',
				'fotos_id' => 'Fotos',
				'codigo_postal_id' => 'Código postal',
				'codigo_postal_id1' => 'Código Postal Id1',
				'tipo_asentamiento_id' => 'Tipo de colonia',
				'tipo_asentamiento_id1' => 'Tipo de colonia alternativa',
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

		//$criteria->with= array('tipo');
		//$criteria->together = true;
		$criteria->addSearchCondition('telefono_particular',$this->telefonos,true,'OR')
		->addSearchCondition('telefono_oficina',$this->telefonos,true,'OR')
		->addSearchCondition('telefono_casa',$this->telefonos,true,'OR')
		->addSearchCondition('telefonos',$this->telefonos,true,'OR');

		$criteria->addSearchCondition('correo_alternativo',$this->correos,true,'OR')
		->addSearchCondition('correos',$this->correos,true,'OR')
		->addSearchCondition('correo',$this->correos,true,'OR');

		//$criteria->addSearchCondition('telefono_oficina',$this->telefono_oficina,true,'OR');
		//$criteria->addSearchCondition('telefono_oficina',$this->telefono_particular,true,'OR')->compare('telefono_particular',$this->telefono_particular,true);
		$criteria->compare('id',$this->id);
		$criteria->compare('es_internacional',$this->es_internacional);
		$criteria->compare('es_institucion',$this->es_institucion);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('apellido',$this->apellido,true);
		$criteria->compare('institucion',$this->institucion,true);
		$criteria->compare('correo',$this->correo,true);
		$criteria->compare('correo_alternativo',$this->correo_alternativo,true);
		//$criteria->compare('correos',$this->correos,true);
		$criteria->compare('telefono_particular',$this->telefono_particular,true);
		$criteria->compare('telefono_oficina',$this->telefono_oficina,true);
		$criteria->compare('telefono_casa',$this->telefono_casa,true);
		//$criteria->compare('telefonos',$this->telefonos,true);
		$criteria->compare('puesto',$this->puesto,true);
		$criteria->compare('nombre_asistente',$this->nombre_asistente,true);
		$criteria->compare('apellido_asistente',$this->apellido_asistente,true);
		$criteria->compare('pagina',$this->pagina,true);
		$criteria->compare('direccion',$this->direccion,true);
		$criteria->compare('direccion_alternativa',$this->direccion_alternativa,true);
		$criteria->compare('asentamiento',$this->asentamiento,true);
		$criteria->compare('asentamiento_alternativo',$this->asentamiento_alternativo,true);
		$criteria->compare('municipio',$this->municipio,true);
		$criteria->compare('municipio_alternativo',$this->municipio_alternativo,true);
		$criteria->compare('ciudad',$this->ciudad,true);
		$criteria->compare('ciudad_alternativa',$this->ciudad_alternativa,true);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('estado_alternativo',$this->estado_alternativo,true);
		$criteria->compare('cp',$this->cp,true);
		$criteria->compare('cp_alternativo',$this->cp_alternativo,true);
		$criteria->compare('observaciones',$this->observaciones,true);
		$criteria->compare('veces_consulta',$this->veces_consulta,true);
		$criteria->compare('fec_alta',$this->fec_alta,true);
		$criteria->compare('fec_act',$this->fec_act,true);
		$criteria->compare('tipo_id',$this->tipo_id);
		$criteria->compare('usuarios_id',$this->usuarios_id);
		$criteria->compare('institucion_id',$this->institucion_id);
		$criteria->compare('sector_id',$this->sector_id);
		$criteria->compare('paises_id',$this->paises_id);
		$criteria->compare('paises_id1',$this->paises_id1);
		$criteria->compare('ciudad_id',$this->ciudad_id);
		$criteria->compare('ciudad_id1',$this->ciudad_id1);
		$criteria->compare('fotos_id',$this->fotos_id);
		$criteria->compare('codigo_postal_id',$this->codigo_postal_id);
		$criteria->compare('codigo_postal_id1',$this->codigo_postal_id1);
		$criteria->compare('tipo_asentamiento_id',$this->tipo_asentamiento_id);
		$criteria->compare('tipo_asentamiento_id1',$this->tipo_asentamiento_id1);

		return new CActiveDataProvider($this, array(
				'criteria'=>$criteria,
		));
	}
}