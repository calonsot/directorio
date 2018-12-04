<?php

/**
 * This is the model class for table "directorio".
 *
 * The followings are the available columns in table 'directorio':
 * @property integer $id
 * @property integer $es_internacional
 * @property integer $es_internacional_alternativo
 * @property integer $vip
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
 * @property string $grado_academico
 * @property string $puesto
 * @property string $adscripcion
 * @property string $nombre_asistente
 * @property string $apellido_asistente
 * @property string $pagina
 * @property string $red_social
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
 * @property integer $domicilio_alt_principal;
 * @property string $fec_alta
 * @property string $fec_act
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
     *
     * @var string es el alias del contacto(nombre o institucion)
     */
    public $alias;

    /**
     *
     * @var string saca todos los correos
     */
    public $correos_totales;

    /**
     *
     * @var string saca todos los telefonos
     */
    public $telefonos_totales;

    /**
     *
     * @var integer el tipo de clasificacion
     */
    public $tipo;

    /**
     *
     * @var string (PARTE DE MEDIOS)
     */
    public $grupos_id;
    public $medio;
    public $tipo_medios_id;
    public $perfil_medio;
    public $programa;
    public $ecos;

    /**
     *
     * @var string (PARTE DE CENTRO DUCUMENTAL)
     */
    public $es_valido;
    public $confirmo;
    public $sigla_institucion;
    public $sigla_dependencia;
    public $dependencia;
    public $subdependencia;
    public $actividad;


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

        return array(
            //array('usuarios_id', 'required'),
            array('id, es_internacional, es_internacional_alternativo, vip, cp, cp_alternativo, domicilio_alt_principal, usuarios_id, institucion_id, sector_id, paises_id, paises_id1, ciudad_id, ciudad_id1, fotos_id, codigo_postal_id, codigo_postal_id1, tipo_asentamiento_id, tipo_asentamiento_id1', 'numerical', 'integerOnly'=>true),
            array('nombre, apellido, institucion, correo, correo_alternativo, telefono_particular, telefono_oficina, telefono_casa, grado_academico, puesto, adscripcion, nombre_asistente, apellido_asistente, pagina, red_social, direccion, direccion_alternativa, asentamiento, asentamiento_alternativo, municipio, municipio_alternativo, ciudad, ciudad_alternativa, estado, estado_alternativo', 'length', 'max'=>255),
            array('veces_consulta', 'length', 'max'=>20),
            array('correos, telefonos, observaciones', 'safe'),
            //valida el campo para mail
            //array('correo, correo_alternativo', 'email'),
            //set empty values to null
            array('nombre, apellido, institucion, correo, correo_alternativo, correos, telefono_particular, telefono_oficina, telefono_casa, telefonos, puesto, adscripcion, nombre_asistente, apellido_asistente, pagina, red_social, direccion, direccion_alternativa, asentamiento, asentamiento_alternativo, municipio, municipio_alternativo, ciudad, ciudad_alternativa, estado, estado_alternativo, observaciones', 'default', 'setOnEmpty'=>true, 'value'=>null),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, es_internacional, es_internacional_alternativo, nombre, apellido, institucion, correo, correo_alternativo, correos, telefono_particular, telefono_oficina, telefono_casa, telefonos, puesto, adscripcion, nombre_asistente, apellido_asistente, pagina, red_social, direccion, direccion_alternativa, asentamiento, asentamiento_alternativo, municipio, municipio_alternativo, ciudad, ciudad_alternativa, estado, estado_alternativo, cp, cp_alternativo, observaciones, veces_consulta, domicilio_alt_principal, fec_alta, fec_act, usuarios_id, institucion_id, sector_id, paises_id, paises_id1, ciudad_id, ciudad_id1, fotos_id, codigo_postal_id, codigo_postal_id1, tipo_asentamiento_id, tipo_asentamiento_id1,
				alias, telefonos_totales, correos_totales, tipo,
				grupos_id, medio, tipo_medios_id, perfil_medio, programa, ecos,
				es_valido, confirmo, sigla_institucion, sigla_dependencia, dependencia, subdependencia, actividad',
                'safe', 'on'=>'search'),
        );
    }

    /**
     * (non-PHPdoc)
     * @see CModel::behaviors()
     */
    public function behaviors() {
        return array(
            'ERememberFiltersBehavior' => array(
                'class' => 'application.components.ERememberFiltersBehavior',
                'defaults'=>array(),           /* optional line */
                'defaultStickOnClear'=>false   /* optional line */
            ),
        );
    }

    /**
     * (non-PHPdoc)
     * @see CActiveRecord::beforeSave()
     */
    public function beforeSave()
    {
        if(trim($this->institucion) != '' || trim($this->nombre != '') || trim($this->apellido != ''))
        {

            if ($this->correo != '' || $this->correo_alternativo != '' || trim($this->correos) != ''
                || trim($this->telefono_particular) != '' || trim($this->telefono_oficina) != ''
                || trim($this->telefono_casa) != '' || trim($this->telefonos) != '')
            {
                $criteria = new CDbCriteria;

                if (trim($this->correo) != '')
                {
                    if ($this->isNewRecord)
                        $correo="correo='".$this->correo."' OR correo_alternativo='".$this->correo."'";

                    else
                        $correo="(correo='".$this->correo."' OR correo_alternativo='".$this->correo."') AND id != ".$this->id;

                    $criteria->condition=$correo;
                    $model=Directorio::model()->find($criteria);

                    if ($model != null)
                        return false;
                }

                if (trim($this->correo_alternativo) != '')
                {
                    if ($this->isNewRecord)
                        $correo_alternativo="correo='".$this->correo_alternativo."' OR correo_alternativo='".$this->correo_alternativo."'";

                    else
                        $correo_alternativo="(correo='".$this->correo_alternativo."' OR correo_alternativo='".$this->correo_alternativo."') AND id != ".$this->id;

                    $criteria->condition=$correo_alternativo;
                    $model=Directorio::model()->find($criteria);

                    if ($model != null)
                        return false;
                }

                return parent::beforeSave();

            } else {
                return false;
            }

        } else {
            return false;
        }
    }

    /**
     * (non-PHPdoc)
     * @see CActiveRecord::beforeDelete()
     */
    public function beforeDelete(){

        $medios=Medios::model()->findByPk($this->id);
        $documental=Documental::model()->findByPk($this->id);

        $tipos=TiposDirectorio::model()->findAllByAttributes(array('directorio_id'=>$this->id));
        $num_tipos=count($tipos);
        $tipos_borrados=TiposDirectorio::model()->deleteAllByAttributes(array('directorio_id'=>$this->id));

        if ($medios->delete() && $documental->delete() && $num_tipos==$tipos_borrados)
            return parent::beforeDelete();

        else
            return false;
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
            'usuarios' => array(self::BELONGS_TO, 'Usuarios', 'usuarios_id'),
            'paises' => array(self::BELONGS_TO, 'Paises', 'paises_id'),
            'ciudad' => array(self::BELONGS_TO, 'Ciudad', 'ciudad_id'),
            'codigoPostal' => array(self::BELONGS_TO, 'CodigoPostal', 'codigo_postal_id'),
            'tipos' => array(self::HAS_MANY, 'TiposDirectorio', 'directorio_id'),
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
            'es_internacional_alternativo' => '¿Es internacional? (alternativo)',
            'vip' => 'Grado VIP',
            'nombre' => 'Nombre(s)',
            'apellido' => 'Apellido(s)',
            'institucion' => 'Nombre de la institución',
            'correo' => 'Correo',
            'correo_alternativo' => 'Correo alternativo',
            'correos' => 'Muchos correos',
            'telefono_particular' => 'Telefóno particular (celular)',
            'telefono_oficina' => 'Telefóno oficina',
            'telefono_casa' => 'Telefóno casa',
            'telefonos' => 'Muchos telefónos',
            'grado_academico' => 'Grado académico',
            'puesto' => 'Puesto del contacto',
            'adscripcion' => 'Adscripción',
            'nombre_asistente' => 'Nombre(s) del asistente',
            'apellido_asistente' => 'Apellido(s) del asistente',
            'pagina' => 'Página web',
            'red_social' => 'Redes sociales',
            'direccion' => 'Calle y número',
            'direccion_alternativa' => 'Calle y número alternativo',
            'asentamiento' => 'Colonia',
            'asentamiento_alternativo' => 'Colonia alternativa',
            'municipio' => 'Delegación / Municipio',
            'municipio_alternativo' => 'Delegación / Municipio alternativo',
            'ciudad' => 'Ciudad',
            'ciudad_alternativa' => 'Ciudad alternativa',
            'estado' => 'Estado',
            'estado_alternativo' => 'Estado alternativo',
            'cp' => 'Código postal',
            'cp_alternativo' => 'Código postal alternativo',
            'observaciones' => 'Observaciones',
            'veces_consulta' => 'Número de veces consultado',
            'domicilio_alt_principal' => '¿Es el domiclio alternativo para envío Biodiversitas?',
            'fec_alta' => 'Fecha de creación',
            'fec_act' => 'Fecha de la última actualización',
            'tipo' => 'Área(s)',
            'usuarios_id' => 'Dueño',
            'institucion_id' => 'Institución',
            'sector_id' => 'Sector',
            'paises_id' => 'País',
            'paises_id1' => 'País alternativo',
            'ciudad_id' => 'Ciudad',
            'ciudad_id1' => 'Ciudad alternativa',
            'fotos_id' => 'Fotos',
            'codigo_postal_id' => 'Código postal',
            'codigo_postal_id1' => 'Código postal alternativo',
            'tipo_asentamiento_id' => 'Tipo de colonia',
            'tipo_asentamiento_id1' => 'Tipo de colonia alternativa',
            //parte de medios
            'grupos_id' => 'Grupo específico',
            'medio' => 'Medio',
            'tipo_medios_id' => 'Tipo de medio',
            'perfil_medio' => 'Perfil del medio',
            'programa' => 'Programa',
            'ecos' => '¿Suscrito a Ecos?',
            //parte de documental
            'es_valido' => '¿Es válido para envío biodiversitas?',
            'confirmo' => '¿Confirmó datos para biodiversitas?',
            'sigla_institucion' => 'Sigla institución',
            'sigla_dependencia' => 'Sigla dependencia',
            'dependencia' => 'Dependencia',
            'subdependencia' => 'Subdependencia',
            'actividad' => 'Actividad',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search($todo=true)
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria=new CDbCriteria;

        if (!$todo)
            $criteria->select=array('t.id');

        $criteria->with= array('medios', 'documental', 'tipos');
        $criteria->together = true;

        $criteria->addSearchCondition('nombre',$this->alias,true,'OR')
            ->addSearchCondition('apellido',$this->alias,true,'OR')
            ->addSearchCondition('institucion',$this->alias,true,'OR');

        $criteria->addSearchCondition('telefono_particular',$this->telefonos_totales,true,'OR')
            ->addSearchCondition('telefono_oficina',$this->telefonos_totales,true,'OR')
            ->addSearchCondition('telefono_casa',$this->telefonos_totales,true,'OR')
            ->addSearchCondition('telefonos',$this->telefonos_totales,true,'OR');

        $criteria->addSearchCondition('correo_alternativo',$this->correos_totales,true,'OR')
            ->addSearchCondition('correos',$this->correos_totales,true,'OR')
            ->addSearchCondition('correo',$this->correos_totales,true,'OR');

        $criteria->compare('t.id',$this->id);
        $criteria->compare('es_internacional',$this->es_internacional);
        $criteria->compare('es_internacional_alternativo',$this->es_internacional_alternativo);
        $criteria->compare('vip',$this->vip);
        $criteria->compare('t.nombre',$this->nombre,true);
        $criteria->compare('t.apellido',$this->apellido,true);
        $criteria->compare('institucion',$this->institucion,true);
        $criteria->compare('correo',$this->correo,true);
        $criteria->compare('correo_alternativo',$this->correo_alternativo,true);
        $criteria->compare('correos',$this->correos,true);
        $criteria->compare('telefono_particular',$this->telefono_particular,true);
        $criteria->compare('telefono_oficina',$this->telefono_oficina,true);
        $criteria->compare('telefono_casa',$this->telefono_casa,true);
        $criteria->compare('telefonos',$this->telefonos,true);
        $criteria->compare('grado_academico',$this->grado_academico,true);
        $criteria->compare('puesto',$this->puesto,true);
        $criteria->compare('adscripcion',$this->adscripcion,true);
        $criteria->compare('nombre_asistente',$this->nombre_asistente,true);
        $criteria->compare('apellido_asistente',$this->apellido_asistente,true);
        $criteria->compare('pagina',$this->pagina,true);
        $criteria->compare('red_social',$this->red_social,true);
        $criteria->compare('direccion',$this->direccion,true);
        $criteria->compare('direccion_alternativa',$this->direccion_alternativa,true);
        $criteria->compare('asentamiento',$this->asentamiento,true);
        $criteria->compare('asentamiento_alternativo',$this->asentamiento_alternativo,true);
        $criteria->compare('municipio',$this->municipio,true);
        $criteria->compare('municipio_alternativo',$this->municipio_alternativo,true);
        $criteria->compare('ciudad',$this->ciudad,true);
        $criteria->compare('ciudad_alternativa',$this->ciudad_alternativa,true);
        $criteria->compare('estado',$this->estado);
        $criteria->compare('estado_alternativo',$this->estado_alternativo,true);
        $criteria->compare('cp',$this->cp,true);
        $criteria->compare('cp_alternativo',$this->cp_alternativo,true);
        $criteria->compare('observaciones',$this->observaciones,true);
        $criteria->compare('veces_consulta',$this->veces_consulta,true);
        $criteria->compare('t.fec_alta',$this->fec_alta,true);
        $criteria->compare('t.fec_act',$this->fec_act,true);
        $criteria->compare('t.usuarios_id',$this->usuarios_id);
        $criteria->compare('institucion_id',$this->institucion_id);
        $criteria->compare('sector_id',$this->sector_id);
        $criteria->compare('paises_id',$this->paises_id);
        $criteria->compare('paises_id1',$this->paises_id1);
        $criteria->compare('ciudad_id',$this->ciudad_id);
        $criteria->compare('ciudad_id1',$this->ciudad_id1);
        $criteria->compare('codigo_postal_id',$this->codigo_postal_id);
        $criteria->compare('codigo_postal_id1',$this->codigo_postal_id1);
        $criteria->compare('tipo_asentamiento_id',$this->tipo_asentamiento_id);
        $criteria->compare('tipo_asentamiento_id1',$this->tipo_asentamiento_id1);
        $criteria->compare('tipos.tipo_id', $this->tipo);
        //parte de medios
        $criteria->compare('medios.grupos_id', $this->grupos_id);
        $criteria->compare('medios.medio', $this->medio, true);
        $criteria->compare('medios.tipo_medios_id', $this->tipo_medios_id);
        $criteria->compare('medios.perfil_medio', $this->perfil_medio, true);
        $criteria->compare('medios.programa', $this->programa, true);
        $criteria->compare('medios.ecos', $this->ecos);
        //parte de documental
        $criteria->compare('documental.es_valido', $this->es_valido);
        $criteria->compare('documental.confirmo', $this->confirmo);
        $criteria->compare('documental.sigla_institucion', $this->sigla_institucion, true);
        $criteria->compare('documental.sigla_dependencia', $this->sigla_dependencia, true);
        $criteria->compare('documental.dependencia', $this->dependencia, true);
        $criteria->compare('documental.subdependencia', $this->subdependencia, true);
        $criteria->compare('documental.actividad', $this->actividad, true);

        $criteria->order = 't.id DESC';

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria, 'pagination'=>array('pageSize'=>50),
        ));
    }
}