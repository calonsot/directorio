<?php

class DirectorioController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
				'accessControl', // perform access control for CRUD operations
				'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(

				array('allow', // allow admin user to perform 'admin' and 'delete' actions
						'actions'=>array('index','view','create','update', 'admin','delete','damemunicipios', 'dameasentamientos', 'damecodigospostales', 'dameciudades',
								'dameubicacion', 'dametipoasentamientos', 'dameciudad', 'ajaxupdate', 'exporta', 'validacorreos, importacontactos'),
						'users'=>array('@'),
				),
				array('deny',  // deny all users
						'users'=>array('*'),
				),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$model=$this->loadModel($id);
		$model->veces_consulta++;

		$model_m=Medios::model()->findByPk($id);
		$model_c=Documental::model()->findByPk($id);

		if($model->saveAttributes(array('veces_consulta'))) {
			$this->render('view',array(
					'model'=>$model, 'model_m'=>$model_m, 'model_c'=>$model_c,
			));

		} else {
			throw new Exception("Lo sentimos no se pudo hacer la opracion",500);
		}
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Directorio;
		$model_m=new Medios();
		$model_c=new Documental();
		$model_f=new Fotos();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Directorio']))
		{
			$model->attributes=$_POST['Directorio'];
			$model->fec_alta=self::fechaAlta();
			$model->usuarios_id=Yii::app()->user->id_usuario;

			//parte de la foto
			$model_f->attributes=$_POST['Fotos'];
			$archivo=CUploadedFile::getInstance($model_f, 'nombre');

			if ($archivo != null)
			{
				if (!file_exists(dirname(__FILE__).'/../../imagenes/contactos/'.$model->usuarios_id))
				{
					mkdir(dirname(__FILE__).'/../../imagenes/contactos/'.$model->usuarios_id);
				}

				if (file_exists(dirname(__FILE__).'/../../imagenes/contactos/'.$model->usuarios_id))
				{
					$fecha=date("Y-m-d_H-i-s");
					$identificador=$fecha.'_';
					$model_f->fec_alta=self::fechaAlta();
					$model_f->nombre=$archivo->getName();
					$model_f->formato=$archivo->getType();
					$model_f->peso=$archivo->getSize();
					$model_f->cadena=$identificador;
					$ruta=dirname(__FILE__).'/../../imagenes/contactos/'.$model->usuarios_id.'/'.$identificador.$archivo;
					$model_f->ruta='../../imagenes/contactos/'.$model->usuarios_id.'/'.$identificador.$archivo;

					if ($model_f->save())
					{
						$archivo->saveAs($ruta);
						$model->fotos_id=$model_f->id;
					}
				}
			}

			if($model->save()) {
				//parte de medios
				$model_m->attributes=$_POST['Medios'];
				$model_m->fec_alta=self::fechaAlta();
				$model_m->usuarios_id=Yii::app()->user->id_usuario;
				$model_m->id=$model->id;

				if($model_m->save()) {
					//parte de centro documental
					$model_c->attributes=$_POST['Documental'];
					$model_c->fec_alta=self::fechaAlta();
					$model_c->usuarios_id=Yii::app()->user->id_usuario;
					$model_c->id=$model->id;

					if($model_c->save())
						$this->redirect(array('view','id'=>$model->id));
				}
			}
		}

		$this->render('create',array(
				'model'=>$model, 'model_m'=>$model_m, 'model_c'=>$model_c, 'model_f'=>$model_f,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
		$model_m=Medios::model()->findByPk($id);
		$model_c=Documental::model()->findByPk($id);
		$model_foto=Fotos::model()->findByPk($model->fotos_id);

		if ($model_foto == null)
		{
			$model_f=new Fotos();
		} else {
			$model_f=Fotos::model()->findByPk($model->fotos_id);
		}

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Directorio']))
		{
			$model->attributes=$_POST['Directorio'];

			$model_f->attributes=$_POST['Fotos'];
			$archivo=CUploadedFile::getInstance($model_f, 'nombre');

			if ($archivo != null)
			{
				if (!file_exists(dirname(__FILE__).'/../../imagenes/contactos/'.$model->usuarios_id))
				{
					mkdir(dirname(__FILE__).'/../../imagenes/contactos/'.$model->usuarios_id);
				}

				if (file_exists(dirname(__FILE__).'/../../imagenes/contactos/'.$model->usuarios_id))
				{
					$fecha=date("Y-m-d_H-i-s");
					$identificador=$fecha.'_';
					$model_f->fec_alta=self::fechaAlta();
					$model_f->nombre=$archivo->getName();
					$model_f->formato=$archivo->getType();
					$model_f->peso=$archivo->getSize();
					$model_f->cadena=$identificador;
					$ruta=dirname(__FILE__).'/../../imagenes/contactos/'.$model->usuarios_id.'/'.$identificador.$archivo;
					$model_f->ruta='../../imagenes/contactos/'.$model->usuarios_id.'/'.$identificador.$archivo;

					if ($model_f->save())
					{
						$archivo->saveAs($ruta);
						$model->fotos_id=$model_f->id;
					}
				}
			}

			if($model->save())
			{
				$model_m->attributes=$_POST['Medios'];

				if($model_m->save())
				{
					$model_c->attributes=$_POST['Documental'];

					if($model_c->save())
						$this->redirect(array('view','id'=>$model->id));
				}
			}
		}

		$this->render('update',array(
				'model'=>$model, 'model_m'=>$model_m, 'model_c'=>$model_c, 'model_f'=>$model_f,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		//$this->setIdUsuario(Yii::app()->user->id);
		//$dataProvider=new CActiveDataProvider('Directorio',array (
		//'criteria' => array ('condition' => 'usuarios_id='.Yii::app()->user->id_usuario, 'order'=>'veces_consulta DESC')));
		$dataProvider=new CActiveDataProvider('Directorio', array(
				'criteria' => array ('order'=>'veces_consulta DESC'),
		));
		$this->render('index',array(
				'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Directorio('search');
		$model->unsetAttributes();  // clear any default values

		if(isset($_GET['Directorio']))
			$model->attributes=$_GET['Directorio'];

		$this->render('admin',array(
				'model'=>$model,
		));
	}

	/**
	 * Imprime los municipios de la base con ajax
	 */
	public function actionDameUbicacion()
	{
		$cp = (int) $_POST['cp'];
		$results = $this->ubicacion($cp);

		if($results != null)
		{
			$ciudad = '0';
			$tipo_asentamiento='0';
			$estado = $results[0]['id_e'];
			$municipio = CHtml::tag('option',
					array('value'=>$results[0]['id_m']),CHtml::encode($results[0]['nombre_m']),true)."#-#".$results[0]['nombre_m'];

			if ($results[0]['id_cd'] != null)
			{
				$ciudad = CHtml::tag('option',
						array('value'=>$results[0]['id_cd']),CHtml::encode($results[0]['nombre_cd']),true)."#-#".$results[0]['nombre_cd'];
			}

			if(count($results) === 1)
			{
				$asentamiento = CHtml::tag('option',
						array('value'=>$results[0]['id_e']),CHtml::encode($results[0]['nombre_a']),true)."#-#1#-#".$results[0]['nombre_a'];

				$tipo_asentamiento = CHtml::tag('option',
						array('value'=>$results[0]['id_asen']),CHtml::encode($results[0]['nombre_asen']),true);

				echo $estado."-|-".$municipio."-|-".$asentamiento."-|-".$tipo_asentamiento."-|-".$ciudad."-|-1";

			} else {

				$asentamiento = CHtml::tag('option',
						array('value'=>""),CHtml::encode('---Selecciona la colonia (hay mas de una con ese CP)---'),true);

				foreach($results as $subresults)
				{
					foreach ($subresults as $value => $subcategory)
					{
						if ($value == 'id_a')
						{
							$asentamiento.= "<option value=\"".$subcategory."\">";
						}

						if ($value == 'nombre_a')
						{
							$asentamiento.= $subcategory."</option>";
						}
					}
				}

				echo $estado."-|-".$municipio."-|-".$asentamiento."#-#0-|-".$tipo_asentamiento."-|-".$ciudad."-|-n";
			}

		} else {
			echo "0";
		}
	}



	/**
	 * Imprime los municipios de la base con ajax
	 */
	public function actionDameCiudades()
	{
		$estado_id = (int) $_POST['estado'];
		$data=Ciudad::model()->findAll(array('condition'=>'estado_id='.$estado_id, 'order'=>'nombre ASC'));
		$data=CHtml::listData($data,'id','nombre');

		echo CHtml::tag('option',
				array('value'=>""),CHtml::encode('---Selecciona una ciudad---'),true);

		foreach($data as $value=>$subcategory)  {
			echo CHtml::tag('option',
					array('value'=>$value),CHtml::encode($subcategory),true);

		}

		echo "entra";
	}

	/**
	 * Imprime los municipios de la base con ajax
	 */
	public function actionDameMunicipios()
	{
		$estado_id = (int) $_POST['Directorio']['estado'];
		$data=Municipio::model()->findAll(array('condition'=>'estado_id='.$estado_id, 'order'=>'nombre ASC'));
		$data=CHtml::listData($data,'id','nombre');

		echo CHtml::tag('option',
				array('value'=>""),CHtml::encode('---Selecciona municipio---'),true);

		foreach($data as $value=>$subcategory)  {
			echo CHtml::tag('option',
					array('value'=>$value),CHtml::encode($subcategory),true);
		}
	}

	/**
	 * Selecciona la ciudad dependiendo del municipio
	 */
	public function actionDameCiudad()
	{
		$municipio = (int) $_POST['municipio'];
		$datos_municipio=Municipio::model()->findByPk($municipio);

		if ($datos_municipio->ciudad_id != null && $datos_municipio->ciudad_id != '')
		{
			echo $datos_municipio->ciudad_id;

		} else {
			echo '0';
		}
	}

	/**
	 * Imprime los asentamientos de la base con ajax
	 */
	public function actionDameAsentamientos()
	{
		$municipio_id = (int) $_POST['municipio_lista'];
		$data=Asentamiento::model()->findAll(array('condition'=>'municipio_id='.$municipio_id, 'order'=>'nombre ASC'));
		$data=CHtml::listData($data,'id','nombre');

		echo CHtml::tag('option',
				array('value'=>""),CHtml::encode('---Selecciona una colonia---'),true);

		foreach($data as $value=>$subcategory)  {
			echo CHtml::tag('option',
					array('value'=>$value),CHtml::encode($subcategory),true);
		}
	}

	/**
	 * Imprime los tipos de asentamientos de la base con ajax
	 */
	public function actionDameTipoAsentamientos()
	{
		$data=TipoAsentamiento::model()->findAll(array('order'=>'nombre ASC'));
		$data=CHtml::listData($data,'id','nombre');

		$cadena= CHtml::tag('option',
				array('value'=>""),CHtml::encode('---Selecciona una colonia---'),true);

		if ($_POST['asentamiento_lista'] != 'simple')
		{
			$asentamiento = (int) $_POST['asentamiento_lista'];
			$datos_asentamiento=Asentamiento::model()->findByPk($asentamiento);
			$cp = CodigoPostal::model()->findByAttributes(array('asentamiento_id'=>$asentamiento));
			$tipo_asentamiento_id=$datos_asentamiento->tipo_asentamiento_id;

			foreach($data as $value=>$subcategory)  {

				if ($value == $tipo_asentamiento_id) {

					$cadena.= CHtml::tag('option',
							array('value'=>$value, 'selected'=>'selected'),CHtml::encode($subcategory),true);
				} else {

					$cadena.= CHtml::tag('option',
							array('value'=>$value),CHtml::encode($subcategory),true);
				}
			}

			$cadena.="-|-".$cp->codigo;

		} else {
			foreach($data as $value=>$subcategory)  {
				$cadena.= CHtml::tag('option',
						array('value'=>$value),CHtml::encode($subcategory),true);
			}
		}

		echo $cadena;
	}

	/**
	 * Imprime los codigos postales con ajax
	 */
	public function actionDameCodigosPostales($asentamiento_id)
	{
		$model = CodigoPostal::model()->findByAttributes(array('asentamiento_id'=>$asentamiento_id));
		echo CHtml::encode($model->codigo);
	}

	/**
	 * Borra todos los registros seleccionados
	 * @throws Exception ecepcion si no lo pudo borrar
	 */
	public function actionAjaxupdate()
	{
		$act = $_GET['act'];
		$autoIdAll = $_POST['casillas'];

		if(count($autoIdAll)>0)
		{
			foreach($autoIdAll as $autoId)
			{
				$model=$this->loadModel($autoId);
				if($act=='doDelete')
					$model->delete();
				if($model->save())
					echo 'ok';
				else
					throw new Exception("",500);

			}
		}
	}

	/**
	 * Borra todos los registros seleccionados
	 * @throws Exception ecepcion si no lo pudo borrar
	 */
	public function actionExporta()
	{
		$autoIdAll = $_POST['casillas'];

		if(count($autoIdAll)>0)
		{
			$exporta=Listas::model()->findByAttributes(array('usuarios_id'=>Yii::app()->user->id_usuario, 'esta_activa'=>1));

			if ($exporta != null)
			{
				foreach($autoIdAll as $autoId)
				{
					$model=$this->loadModel($autoId);
					$exporta->cadena.=$model->id.",";

					if($exporta->saveAttributes(array('cadena')))
						echo 'ok';

					else
						throw new Exception("Lo sentimos no se pudo hacer la opracion",500);

				}
			}
		}
	}
	
	public function actionImportaContactos () 
	{
		
	}

	/**
	 * Valida los correos para no meter repetidos
	 */
	public function actionValidaCorreos ()
	{
		if (isset($_POST['correo']))
		{
			$correo="correo='".$_POST['correo']."' OR correo_alternativo='".$_POST['correo']."'";
		}

		if (isset($_POST['correo_alternativo']))
		{
			$correo="correo='".$_POST['correo_alternativo']."' OR correo_alternativo='".$_POST['correo_alternativo']."'";
		}

		$criteria = new CDbCriteria;
		$criteria->condition=$correo;

		$model=Directorio::model()->find($criteria);

		if ($model!=null)
			echo $model->id;
		else
			echo '0';
	}

	/**
	 *
	 * @param String $estado
	 * @return el nombre del estado o null
	 */
	public static function validaEstado ($estado)
	{
		$model=Estado::model()->findByPk($estado);

		if ($model!=null)
		{
			return $model->nombre;

		} else {
			return null;
		}
	}

	/**
	 *
	 * @param String $tipo_a el tipo de asentamiento
	 * @return el nombre del tipo de asentamiento o null
	 */
	public static function validaTipoAsentamiento ($tipo_a)
	{
		$model=TipoAsentamiento::model()->findByPk($tipo_a);

		if ($model!=null)
		{
			return $model->nombre;

		} else {
			return null;
		}
	}

	/**
	 *
	 * @param String $pais el id del pais
	 * @return el nombre del pais o null
	 */
	public static function validaPais ($pais)
	{
		$model=Paises::model()->findByPk($pais);

		if ($model!=null)
		{
			return $model->nombre;

		} else {
			return 'México';
		}
	}

	/**
	 *
	 * @param integer $foto el idebtificador de la foto
	 * @return string la foto a desplegar
	 */
	public static function validaFoto ($foto)
	{
		$model=Fotos::model()->findByPk($foto);

		if ($model!=null)
		{
			return CHtml::image($model->ruta, $model->nombre, array('width'=>'70px', 'height'=>'70px'));

		} else {
			return CHtml::image('../../imagenes/aplicacion/blank-profile.jpg', 'sin foto de perfil', array('width'=>'70px', 'height'=>'70px'));
		}
	}

	/**
	 *
	 * @throws CHttpException
	 * @return Ambigous <multitype:multitype:string, multitype:multitype:string  multitype:string multitype:string   unknown string multitype:string multitype:  multitype:string Ambigous <multitype:, multitype:unknown mixed , mixed, multitype:unknown , string, unknown>  >
	 */
	public function despliegaColumnas ()
	{
		$roles_id=Usuarios::model()->findByPk(Yii::app()->user->id_usuario)->roles_id;
		$rol=Roles::model()->findByPk($roles_id);

		if($rol != null)
		{
			$columnas=$this::atributosBase($rol->atributos_base);
			return $columnas;

		} else {
			throw new CHttpException(404,'La acción que solicitaste no existe.');
		}
	}

	/**
	 *
	 * @param Object $atr los atributos base del usuario
	 * @return multitype:multitype:string  multitype:string multitype:string   unknown string multitype:string multitype:  multitype:string Ambigous <multitype:, multitype:unknown mixed , mixed, multitype:unknown , string, unknown>
	 */
	public static function atributosBase ($atr)
	{
		$atributo=explode(',', $atr);
		$atributos=array();
		$contador=2;
		$atributos[0]=array(
				'id'=>'casillas',
				'class'=>'CCheckBoxColumn',
				'selectableRows' => '50',
		);

		$atributos[1]=array(
				'class'=>'CButtonColumn',
		);

		foreach ($atributo as $at)
		{
			$a=trim($at);

			switch ($a)
			{
				case 'fotos_id':

					$atributos[$contador]=array(
					'header'=>'Foto',
					'type'=>'raw',
					'value'=>'DirectorioController::validaFoto($data->fotos_id)',
					);
					break;

				case 'es_internacional':

					$atributos[$contador]=array(
					'name'=>$a,
					'header'=>'¿Int?',
					'filter'=>array('1'=>'Sí','0'=>'No'),
					'value'=>'($data->es_internacional=="1")?("Sí"):("No")',
					);
					break;

				case 'es_institucion':

					$atributos[$contador]=array(
					'name'=>$a,
					'header'=>'¿Int?',
					'filter'=>array('1'=>'Sí','0'=>'No'),
					'value'=>'($data->es_internacional=="1")?("Sí"):("No")',
					);
					break;

				case 'nombre':
					$atributos[$contador]=$a;
					break;

				case 'apellido':
					$atributos[$contador]=$a;
					break;

				case 'institucion':
					$atributos[$contador]=$a;
					break;

				case 'correo':
					$atributos[$contador]=$a;
					break;

				case 'correo_alternativo':
					$atributos[$contador]=$a;
					break;

				case 'correos':
					$atributos[$contador]=$a;
					break;

				case 'telefono_particular':
					$atributos[$contador]=$a;
					break;

				case 'telefono_oficina':
					$atributos[$contador]=$a;
					break;

				case 'telefono_casa':
					$atributos[$contador]=$a;
					break;

				case 'telefonos':
					$atributos[$contador]=$a;
					break;

				case 'grupo':
					$atributos[$contador]=array(
					'name'=>$a,
					'value'=>'$data->medios->'.$a,
					);
					break;

				case 'medio':
					$atributos[$contador]=array(
					'name'=>$a,
					'value'=>'$data->medios->'.$a,
					);
					break;

				case 'tipo_medio':
					$atributos[$contador]=array(
					'name'=>$a,
					'value'=>'$data->medios->'.$a,
					);
					break;

				case 'perfil_medio':
					$atributos[$contador]=array(
					'name'=>$a,
					'value'=>'$data->medios->'.$a,
					);
					break;

				case 'programa':
					$atributos[$contador]=array(
					'name'=>$a,
					'value'=>'$data->medios->'.$a,
					);
					break;

				case 'seccion':
					$atributos[$contador]=array(
					'name'=>$a,
					'value'=>'$data->medios->'.$a,
					);
					break;

				case 'suplemento':
					$atributos[$contador]=array(
					'name'=>$a,
					'value'=>'$data->medios->'.$a,
					);
					break;

				case 'columna':
					$atributos[$contador]=array(
					'name'=>$a,
					'value'=>'$data->medios->'.$a,
					);
					break;

				case 'grado_academico':
					$atributos[$contador]=array(
					'name'=>$a,
					'value'=>'$data->documental->'.$a,
					);
					break;
						
				case 'sigla_institucion':
					$atributos[$contador]=array(
					'name'=>$a,
					'value'=>'$data->documental->'.$a,
					);
					break;

				case 'sigla_dependencia':
					$atributos[$contador]=array(
					'name'=>$a,
					'value'=>'$data->documental->'.$a,
					);
					break;
						
				case 'dependencia':
					$atributos[$contador]=array(
					'name'=>$a,
					'value'=>'$data->documental->'.$a,
					);
					break;

				case 'subdependencia':
					$atributos[$contador]=array(
					'name'=>$a,
					'value'=>'$data->documental->'.$a,
					);
					break;
						
				case 'actividad':
					$atributos[$contador]=array(
					'name'=>$a,
					'value'=>'$data->documental->'.$a,
					);
					break;

				case 'estado':
					$atributos[$contador]=array(
					'name'=>$a,
					'filter'=>CHtml::listData(Estado::model()->findAll(), 'id', 'nombre'),
					'value'=>'DirectorioController::validaEstado($data->estado)',
					);
					break;

				case 'tipo_id':
					$atributos[$contador]=array(
					'name'=>$a,
					'filter'=>CHtml::listData(Tipo::model()->findAll(array('order'=>'nombre ASC')), 'id', 'nombre'),
					'value'=>'Tipo::model()->findByPk($data->tipo_id)->nombre',
					);
					break;

				case 'usuarios_id':
					$atributos[$contador]=array(
					'name'=>$a,
					'filter'=>CHtml::listData(Usuarios::model()->findAll(), 'id', 'usuario'),
					'value'=>'Usuarios::model()->findByPk($data->usuarios_id)->usuario',
					);
					break;
			}

			$contador++;
		}

		return $atributos;
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Directorio the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Directorio::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'La pagina que solicitaste no existe.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Directorio $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='directorio-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
