<?php
/**
 * Controller is the customized base controller class.
 * All controller classes for this application should extend from this base class.
 */
class Controller extends CController
{
	/**
	 * @var string the default layout for the controller view. Defaults to '//layouts/column1',
	 * meaning using a single column layout. See 'protected/views/layouts/column1.php'.
	 */
	public $layout='//layouts/column1';
	/**
	 * @var array context menu items. This property will be assigned to {@link CMenu::items}.
	 */
	public $menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	*/
	public $breadcrumbs=array();

	/**
	 *
	 * @return el campo fec_alta de cada tabla
	*/
	public static function fechaAlta()
	{
		return date("Y-m-d H:i:s");
	}

	public function dameInfoUsuario()
	{
		$results = Yii::app()->db->createCommand()
		->select('r.*')
		->from('usuarios u')
		->leftJoin('roles r', 'u.roles_id=r.id')
		->where('u.id='.Yii::app()->user->id_usuario)
		->queryRow();

		return $results;
	}

	/**
	 * Pone el Id de la sesion en el objeto persistente de yii (cookie)
	 * @param string $usuario el nombre
	 */
	public function setIdUsuario($usuario)
	{
		$model = Usuarios::model()->findByAttributes(array('usuario'=>$usuario));
		Yii::app()->user->setState('id_usuario', $model->id);
	}

	/**
	 *
	 * @return string retorna el id si esta activo, vacio de lo contrario
	 */
	public function verificaLogin()
	{
		if(isset(Yii::app()->user->id_usuario))
		{
			return Yii::app()->user->id_usuario;

		} else {
			return '';
		}
	}

	/**
	 * Da la ubicacion completa con el CP dado
	 * @param int $cp el codigo postal
	 * @return el array con la ubicacion completa
	 */
	public function ubicacion($cp)
	{
		$results = Yii::app()->db->createCommand()
		->select('c.id AS cp_id, a.id AS id_a, a.nombre AS nombre_a, asen.id AS id_asen, asen.nombre AS nombre_asen,
				m.id AS id_m, m.nombre AS nombre_m, cd.id AS id_cd, cd.nombre AS nombre_cd, e.id AS id_e, e.nombre AS nombre_e')
				->from('codigo_postal c')
				->leftJoin('asentamiento a', 'c.asentamiento_id=a.id')
				->leftJoin('tipo_asentamiento asen', 'a.tipo_asentamiento_id=asen.id')
				->leftJoin('municipio m', 'a.municipio_id=m.id')
				->leftJoin('ciudad cd', 'm.ciudad_id=cd.id')
				->leftJoin('estado e', 'm.estado_id=e.id')
				->where('c.codigo='.$cp)
				->queryAll();

		return $results;
	}

	/**
	 * Da la ubicacion completa con el id del CP dado
	 * @param int $cp_id el codigo postal
	 * @return el array con la ubicacion completa
	 */
	public function ubicacionInicio($cp_id)
	{
		$results = Yii::app()->db->createCommand()
		->select('c.id AS cp_id, a.id AS id_a, a.nombre AS nombre_a, asen.id AS id_asen, asen.nombre AS nombre_asen,
				m.id AS id_m, m.nombre AS nombre_m, cd.id AS id_cd, cd.nombre AS nombre_cd, e.id AS id_e, e.nombre AS nombre_e')
				->from('codigo_postal c')
				->leftJoin('asentamiento a', 'c.asentamiento_id=a.id')
				->leftJoin('tipo_asentamiento asen', 'a.tipo_asentamiento_id=asen.id')
				->leftJoin('municipio m', 'a.municipio_id=m.id')
				->leftJoin('ciudad cd', 'm.ciudad_id=cd.id')
				->leftJoin('estado e', 'm.estado_id=e.id')
				->where('c.id='.$cp_id)
				->queryRow();

		return $results;
	}

	/**
	 * Verifica si el registro tiene estado o no
	 * @param object clase Estado $data
	 * @return string el valor del estaod si es que existe o vacio
	 */
	public static function situacionEstado($data)
	{
		$estado = Estado::model()->findByPk($data);

		if ($estado != null) {
			return $estado->nombre;

		} else {
			return '';
		}
	}

	/**
	 * Devuelve las columnas de las tablas directorio, medios y documental
	 */
	public static function columnasTablas ()
	{
		$columnas=array('Columnas de directorio'=>array(), 'Columnas de medios'=>array(), 'Columnas de centro documental'=>array());

		$columnas['Columnas de directorio']=Directorio::model()->attributeLabels();
		unset($columnas['Columnas de directorio']['id'],$columnas['Columnas de directorio']['fec_alta'], $columnas['Columnas de directorio']['fec_act'], $columnas['Columnas de directorio']['usuarios_id'],
				$columnas['Columnas de directorio']['institucion_id'], $columnas['Columnas de directorio']['ciudad_id'], $columnas['Columnas de directorio']['ciudad_id1'],
				$columnas['Columnas de directorio']['fotos_id'], $columnas['Columnas de directorio']['codigo_postal_id'], $columnas['Columnas de directorio']['codigo_postal_id1']);

		$columnas['Columnas de medios']=Medios::model()->attributeLabels();
		unset($columnas['Columnas de medios']['id'],$columnas['Columnas de medios']['fec_alta'], $columnas['Columnas de medios']['fec_act'], $columnas['Columnas de medios']['usuarios_id']);

		$columnas['Columnas de centro documental']=Documental::model()->attributeLabels();
		unset($columnas['Columnas de centro documental']['id'],$columnas['Columnas de centro documental']['fec_alta'], $columnas['Columnas de centro documental']['fec_act'], $columnas['Columnas de centro documental']['usuarios_id']);

		return $columnas;
	}

}