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
								'dameubicacion', 'dameubicacioninicio', 'dametipoasentamientos', 'dameciudad', 'dameestado', 'dameestadoalternativo', 'ajaxupdate', 'exporta', 'exporta_todos', 'validacorreos', 'importacontactos'),
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
		$datos=$this->dameInfoUsuario();

		if ($datos['super_usuario']==1 || $datos['admin']==1)
		{
			$model=$this->loadModel($id);
			$model->veces_consulta++;

			$model_m=Medios::model()->findByPk($id);
			$model_c=Documental::model()->findByPk($id);

			$tipos=DirectorioController::dameTipos($id);

			if($model->save()) {
				$this->render('view',array(
						'model'=>$model, 'model_m'=>$model_m, 'model_c'=>$model_c, 'tipos'=>$tipos,
				));

			} else {
				throw new Exception("Lo sentimos no se pudo hacer la opracion",500);
			}

		} else {
			throw new CHttpException(NULL,'Aun no has sido dado de alta en el sistema para consultar, porfavor intentalo más tarde en lo que el sistema te valida.');
		}
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		//$this->layout='//layouts/column1';
		$datos=$this->dameInfoUsuario();

		if ($datos['super_usuario']==1 || $datos['admin']==1)
		{
			$model=new Directorio;
			$model_m=new Medios();
			$model_c=new Documental();
			$model_f=new Fotos();
			$model_nuevo_td=new TiposDirectorio();
			$tablas=explode(",", trim($datos['tablas_adicionales']));

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
						mkdir(dirname(__FILE__).'/../../imagenes/contactos/'.$model->usuarios_id);

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
					if ($datos['super_usuario']==1 || in_array("medios", $tablas))
					{
						//parte de medios
						$model_m->attributes=$_POST['Medios'];
						$model_m->fec_alta=self::fechaAlta();
						$model_m->usuarios_id=Yii::app()->user->id_usuario;
						$model_m->id=$model->id;

						//parte de biodiversitas vacio
						$model_c->fec_alta=self::fechaAlta();
						$model_c->usuarios_id=Yii::app()->user->id_usuario;
						$model_c->id=$model->id;
							
						if (!$model_m->save() || !$model_c->save()) //salva la parte de medios y biodiversitas
							throw new CHttpException(NULL,'La acción de medios no se pudo completar, favor de intentarlo más tarde.');

					} elseif ($datos['super_usuario']==1 || in_array("biodiversitas", $tablas))
					{
						//parte de centro documental
						$model_c->attributes=$_POST['Documental'];
						$model_c->fec_alta=self::fechaAlta();
						$model_c->usuarios_id=Yii::app()->user->id_usuario;
						$model_c->id=$model->id;

						//parte de medios vacio
						$model_m->fec_alta=self::fechaAlta();
						$model_m->usuarios_id=Yii::app()->user->id_usuario;
						$model_m->id=$model->id;

						if ($datos['super_usuario']==1 || Yii::app()->user->id_usuario==5)
							$model_c->es_valido=1;

						if (!$model_c->save() || !$model_m->save()) //salva la parte de medios
							throw new CHttpException(NULL,'La acción de biodiversitas no se pudo completar, favor de intentarlo más tarde.');
							
					} else
					{
						//parte de medios vacio
						$model_m->fec_alta=self::fechaAlta();
						$model_m->usuarios_id=Yii::app()->user->id_usuario;
						$model_m->id=$model->id;

						//parte de biodiversitas vacio
						$model_c->fec_alta=self::fechaAlta();
						$model_c->usuarios_id=Yii::app()->user->id_usuario;
						$model_c->id=$model->id;
							
						if (!$model_m->save() || !$model_c->save()) //salva la parte de medios y biodiversitas
							throw new CHttpException(NULL,'La acción de medios no se pudo completar, favor de intentarlo más tarde.');
					}

					//parte de tipos_directorio
					$model_nuevo_td->attributes=$_POST['TiposDirectorio'];
					$model_nuevo_td->fec_alta=self::fechaAlta();
					$model_nuevo_td->directorio_id=$model->id;

					if($model_nuevo_td->save())
						$this->redirect(array('view','id'=>$model->id));
				}
			}

			$this->render('create',array(
					'model'=>$model, 'model_m'=>$model_m, 'model_c'=>$model_c, 'model_f'=>$model_f,
					'model_nuevo_td'=>$model_nuevo_td, 'datos'=>$datos,
			));

		} else {
			throw new CHttpException(NULL,'Aun no has sido dado de alta en el sistema para consultar, porfavor intentalo más tarde en lo que el sistema te valida.');
		}
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$datos=$this->dameInfoUsuario();

		if ($datos['super_usuario']==1 || $datos['admin']==1)
		{
			$model=$this->loadModel($id);
			$model_m=Medios::model()->findByPk($id);
			$model_c=Documental::model()->findByPk($id);
			$model_foto=Fotos::model()->findByPk($model->fotos_id);
			$model_td=TiposDirectorio::model()->findAllByAttributes(array('directorio_id'=>$id)); //contiene arreglo de tipos
			$model_nuevo_td=new TiposDirectorio();
			$guardar=0;
			$tablas=explode(",", trim($datos['tablas_adicionales']));

			$tipos=count($model_td);

			if ($model_foto == null)
				$model_f=new Fotos();

			else
				$model_f=Fotos::model()->findByPk($model->fotos_id);


			// Uncomment the following line if AJAX validation is needed
			// $this->performAjaxValidation($model);

			if (isset($_POST['Directorio']))
			{
				$model->attributes=$_POST['Directorio'];
				$model->fec_act=self::fechaAlta();

				$model_f->attributes=$_POST['Fotos'];

				if (isset($_POST['foto_vacia']) && $_POST['foto_vacia'] == '0')
				{
					$fecha=date("Y-m-d_H-i-s");
					$identificador=$fecha.'_';
					$model_f->ruta='../../imagenes/contactos/'.$model->usuarios_id.'/'.$identificador.'blank-profile.jpg';
					$model_f->saveAttributes(array('ruta'));

				} else {

					$archivo=CUploadedFile::getInstance($model_f, 'nombre');

					if ($archivo != null)
					{
						if (!file_exists(dirname(__FILE__).'/../../imagenes/contactos/'.$model->usuarios_id))
							mkdir(dirname(__FILE__).'/../../imagenes/contactos/'.$model->usuarios_id);


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
				}

				if (isset($_POST['estado_manual']) && $_POST['estado_manual'] != '')
					$model->estado=$_POST['estado_manual'];


				if (isset($_POST['estado_manual_alternativo']) && $_POST['estado_manual_alternativo'] != '')
					$model->estado_alternativo=$_POST['estado_manual_alternativo'];


				if ($model->save()) //salve el directorio
				{
					if ($datos['super_usuario']==1 || in_array("medios", $tablas))
					{
						$model_m->attributes=$_POST['Medios'];

						if (!$model_m->save()) //salva la parte de medios
							throw new CHttpException(NULL,'La acción de medios no se pudo completar, favor de intentarlo más tarde.');
					}

					if ($datos['super_usuario']==1 || in_array("biodiversitas", $tablas))
					{
						$model_c->attributes=$_POST['Documental'];

						if (!$model_c->save()) //salva la parte de centro documental
							throw new CHttpException(NULL,'La acción biodiversitas no se pudo completar, favor de intentarlo más tarde.');
					}

					if ($tipos > 1) //parte de tipos (muchos)
					{
						for ($i=0;$i<$tipos;$i++)
						{
							$model_td[$i]->attributes=$_POST['TiposDirectorio'][$i+1];

							if ($model_td[$i]->save())
								$guardar+=1;
						}

						if ($guardar==$tipos)
						{
							$model_nuevo_td->attributes=$_POST['TiposDirectorio'];

							if ($model_nuevo_td->tipo_id != 1)
							{
								$model_nuevo_td->directorio_id=$model->id;
								$model_nuevo_td->fec_alta=self::fechaAlta();

								if ($model_nuevo_td->save())
									$this->redirect(array('view','id'=>$model->id));

							} else {
								$this->redirect(array('view','id'=>$model->id));
							}
						}

					} else {   //una sola clasificacion

						$model_td[0]->attributes=$_POST['TiposDirectorio'][1];

						if ($model_td[0]->tipo_id != 1)    //si es diferente del default
						{
							$model_nuevo_td->attributes=$_POST['TiposDirectorio'];

							if (isset($model_nuevo_td->tipo_id))
							{
								if ($model_nuevo_td->tipo_id != 1)
								{
									$model_nuevo_td->directorio_id=$model->id;
									$model_nuevo_td->fec_alta=self::fechaAlta();

									if ($model_nuevo_td->save() && $model_td[0]->save())
										$this->redirect(array('view','id'=>$model->id));

								} else {           //no salva nada
									$this->redirect(array('view','id'=>$model->id));
								}

							} else {              //salva solo el primero

								if ($model_td[0]->saveAttributes(array('tipo_id')))
									$this->redirect(array('view','id'=>$model->id));
							}

						} else {                  //si es el default
							if ($model_td[0]->save())
								$this->redirect(array('view','id'=>$model->id));
						}
					}
				}
			}

			$this->render('update',array(
					'model'=>$model, 'model_m'=>$model_m, 'model_c'=>$model_c, 'model_f'=>$model_f,
					'model_td'=>$model_td, 'model_nuevo_td'=>$model_nuevo_td, 'datos'=>$datos,
			));

		} else {
			throw new CHttpException(NULL,'Aun no has sido dado de alta en el sistema para consultar, porfavor intentalo más tarde en lo que el sistema te valida.');
		}
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$datos=$this->dameInfoUsuario();

		if ($datos['super_usuario']==1 || $datos['admin']==1)
		{
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));

		} else {
			throw new CHttpException(NULL,'Aun no has sido dado de alta en el sistema para consultar, porfavor intentalo más tarde en lo que el sistema te valida.');
		}
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$datos=$this->dameInfoUsuario();

		if ($datos['super_usuario']==1 || $datos['admin']==1)
		{
			$dataProvider=new CActiveDataProvider('Directorio', array(
					'criteria' => array ('order'=>'veces_consulta DESC'),
			));
			$this->render('index',array(
					'dataProvider'=>$dataProvider,
			));

		} else {
			throw new CHttpException(NULL,'Aun no has sido dado de alta en el sistema para consultar, porfavor intentalo más tarde en lo que el sistema te valida.');
		}
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$datos=$this->dameInfoUsuario();

		if ($datos['super_usuario']==1 || $datos['admin']==1)
		{
			$model=new Directorio('search');
			//$model->unsetAttributes();  // clear any default values

			if(isset($_GET['Directorio']))
			{
				$model->attributes=$_GET['Directorio'];
				if (isset($_GET['exporta_todos']))
				{
					echo $this->exporta_todos($model->search()->criteria);
					exit;
				}
			}
				
			//parte de limpiar el estado del cgridview
			if (intval(Yii::app()->request->getParam('clearFilters'))==1)
				EButtonColumnWithClearFilters::clearFilters($this,$model);

			$this->render('admin',array(
					'model'=>$model,
			));

		} else {
			throw new CHttpException(NULL,'Aun no has sido dado de alta en el sistema para consultar, porfavor intentalo más tarde en lo que el sistema te valida.');
		}
	}

	/**
	 * Imprime toda la ubicacion dado un CP
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
						array('value'=>$results[0]['id_a']),CHtml::encode($results[0]['nombre_a']),true)."#-#".$results[0]['nombre_a'];

				$tipo_asentamiento = CHtml::tag('option',
						array('value'=>$results[0]['id_asen']),CHtml::encode($results[0]['nombre_asen']),true);

				echo $estado."-|-".$municipio."-|-".$asentamiento."-|-".$tipo_asentamiento."-|-".$ciudad."-|-".$results[0]['cp_id']."-|-1";

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

				echo $estado."-|-".$municipio."-|-".$asentamiento."-|-".$tipo_asentamiento."-|-".$ciudad;
			}

		} else {
			echo "0";
		}
	}

	/**
	 * Imprime toda la informacion dado el id del CP
	 */
	public function actionDameUbicacionInicio()
	{
		$cp_id = (int) $_POST['cp_id'];
		$results = $this->ubicacionInicio($cp_id);

		if($results != null)
		{
			$ciudad = '0';
			$estado = $results['id_e'];
			$municipio = CHtml::tag('option',
					array('value'=>$results['id_m']),CHtml::encode($results['nombre_m']),true);

			if ($results['id_cd'] != null)
			{
				$ciudad = CHtml::tag('option',
						array('value'=>$results['id_cd']),CHtml::encode($results['nombre_cd']),true);
			}

			$asentamiento = CHtml::tag('option',
					array('value'=>$results['id_a']),CHtml::encode($results['nombre_a']),true);

			$tipo_asentamiento = CHtml::tag('option',
					array('value'=>$results['id_asen']),CHtml::encode($results['nombre_asen']),true);

			echo $estado."-|-".$municipio."-|-".$asentamiento."-|-".$tipo_asentamiento."-|-".$ciudad;

		} else {
			echo "0";
		}
	}

	/**
	 * Da el nombre del estado
	 */
	public function actionDameEstado ()
	{
		$id = (int) $_POST['id'];
		$estado=Directorio::model()->findByPk($id)->estado;

		if ($estado != '' && $estado != null)
			echo $estado;
		else
			echo '0';
	}

	/**
	 * Da el nombre del estado alternativo
	 */
	public function actionDameEstadoAlternativo ()
	{
		$id = (int) $_POST['id'];
		$estado=Directorio::model()->findByPk($id)->estado_alternativo;

		if ($estado != '' && $estado != null)
			echo $estado;
		else
			echo '0';
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
		$estado_id = (int) $_POST['estado'];

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

		$results = Yii::app()->db->createCommand()
		->select('c.id, c.nombre')
		->from('municipio m')
		->leftJoin('ciudad c', 'm.ciudad_id=c.id')
		->where('m.id='.$municipio)
		->queryRow();

		if ($results['id'] != null && $results['id'] != '')
		{
			echo CHtml::tag('option',
					array('value'=>$results['id']),CHtml::encode($results['nombre']),true)."-|-".$results['nombre'];

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
		$municipio=Municipio::model()->findByPk($municipio_id);
		$data=Asentamiento::model()->findAll(array('condition'=>'municipio_id='.$municipio_id, 'order'=>'nombre ASC'));
		$data=CHtml::listData($data,'id','nombre');

		$cadena=CHtml::tag('option',
				array('value'=>""),CHtml::encode('---Selecciona una colonia---'),true);

		foreach($data as $value=>$subcategory)  {
			$cadena.=CHtml::tag('option',
					array('value'=>$value),CHtml::encode($subcategory),true);
		}

		echo $cadena.='-|-'.$municipio->nombre;
	}

	/**
	 * Imprime los tipos de asentamientos de la base con ajax
	 */
	public function actionDameTipoAsentamientos()
	{
		$data=TipoAsentamiento::model()->findAll(array('order'=>'nombre ASC'));
		$data=CHtml::listData($data,'id','nombre');
		$cadena='';

		if ($_POST['asentamiento_lista'] != 'simple')
		{
			$asentamiento = (int) $_POST['asentamiento_lista'];

			$results = Yii::app()->db->createCommand()
			->select('c.codigo AS codigo, c.id AS cp_id, a.id AS id_a, a.nombre AS nombre_a, asen.id AS id_asen, asen.nombre AS nombre_asen')
			->from('codigo_postal c')
			->leftJoin('asentamiento a', 'c.asentamiento_id=a.id')
			->leftJoin('tipo_asentamiento asen', 'a.tipo_asentamiento_id=asen.id')
			->where('c.asentamiento_id='.$asentamiento)
			->queryRow();

			$cadena.= CHtml::tag('option',
					array('value'=>$results['id_asen']),CHtml::encode($results['nombre_asen']),true);

			$cadena.="-|-".$results['codigo']."-|-".$results['nombre_a']."-|-".$results['cp_id'];

		} else {
			$cadena.= CHtml::tag('option',
					array('value'=>""),CHtml::encode('---Selecciona una colonia---'),true);

			foreach ($data as $value=>$subcategory) {
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
	 */
	public function actionAjaxupdate()
	{
		$autoIdAll = $_POST['casillas'];

		if(count($autoIdAll)>0)
		{
			foreach($autoIdAll as $autoId)
			{
				$model=$this->loadModel($autoId);
				if ($model->delete())
					echo 'Los contactos fueron eliminados satisfactoriamente.';
				//if($model->save())
					//echo 'ok';
				else
					echo 'Hubo un error al eliminar los contactos, por favor intentalo de nuevo.';
			}
		} else 
			echo 'Para eliminar algún contacto debes seleccionar al menos uno.';
	}

	/**
	 * Exporta los registros seleccionados
	 */
	public function actionExporta()
	{
		$autoIdAll = $_POST['casillas'];

		if(count($autoIdAll)>0)
		{
			$lista=Listas::model()->findByAttributes(array('usuarios_id'=>Yii::app()->user->id_usuario, 'esta_activa'=>1));

			if ($lista != null)
			{
				foreach($autoIdAll as $autoId)
				{
					$lista->cadena.=$autoId.', ';
				}
				if($lista->saveAttributes(array('cadena')))
					echo 'Los contactos fueron exportados satisfactoriamente.';
				else
					echo 'Hubo un error al exportar los contactos, por favor intentalo de nuevo.';
			} else
				echo "Aún no tienes alguna lista activa, por favor ve a la pestaña de \"Listas\" y activa o crea una nueva.";
		} else
			echo 'Para exportar los contactos debes seleccionar al menos uno.';
	}

	/**
	 * Exporta todos los registros seleccionados
	 */
	private function exporta_todos($criteria)
	{
		if (!empty($criteria->condition)) {
			$ids=Directorio::model()->findAll($criteria);
			if(count($ids)>0)
			{
				$lista=Listas::model()->findByAttributes(array('usuarios_id'=>Yii::app()->user->id_usuario, 'esta_activa'=>1));
				if ($lista != null)
				{
					foreach($ids as $id)
					{
						$lista->cadena.=$id['id'].", ";
					}
					if($lista->saveAttributes(array('cadena')))
						return 'Los contactos fueron exportados satisfactoriamente.';
					else
						return 'Hubo un error al exportar los contactos, por favor intentalo de nuevo.';
				} else
					return "Aún no tienes alguna lista activa, por favor ve a la pestaña de \"Listas\" y activa o crea una nueva.";
			} else
				return 'Por favor realiza una búsqueda donde al menos despliegue contacto.';
		}
		else
			return  'Por favor para exportar todos los contactos por lo menos realiza un filtro, son demasiados para exportar.';
	}

	/**
	 * Valida los correos para no meter repetidos
	 */
	public function actionValidaCorreos ()
	{
		if (isset($_POST['correo']) && isset($_POST['id']))
		{
			$correo="(correo='".$_POST['correo']."' OR correo_alternativo='".$_POST['correo']."') AND id != ".$_POST['id'];
		}

		if (isset($_POST['correo_alternativo']) && isset($_POST['id']))
		{
			$correo="(correo='".$_POST['correo_alternativo']."' OR correo_alternativo='".$_POST['correo_alternativo']."') AND id != ".$_POST['id'];
		}

		if (isset($_POST['correo']) && !isset($_POST['id']))
		{
			$correo="(correo='".$_POST['correo']."' OR correo_alternativo='".$_POST['correo']."')";
		}

		if (isset($_POST['correo_alternativo']) && !isset($_POST['id']))
		{
			$correo="(correo='".$_POST['correo_alternativo']."' OR correo_alternativo='".$_POST['correo_alternativo']."')";
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
			if (strpos($model->ruta, 'blank-profile.jpg') === false)
			{
				return CHtml::image($model->ruta, $model->nombre, array('height'=>'70px'));
					
			} else {
				return CHtml::image(Yii::app()->request->baseUrl.'/imagenes/aplicacion/blank-profile.jpg', 'sin foto de perfil', array('height'=>'70px'));
			}

		} else {
			return CHtml::image(Yii::app()->request->baseUrl.'/imagenes/aplicacion/blank-profile.jpg', 'sin foto de perfil', array('height'=>'70px'));
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
			$columnas=$this->atributosBase($rol->atributos_base);
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
	private function atributosBase ($atr)
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
				'class'=>'EButtonColumnWithClearFilters',
				//'clearVisible'=>false,
				//'onClick_BeforeClear'=>'alert('this js fragment executes before clear');',
				//'onClick_AfterClear'=>'alert('this js fragment executes after clear');',
				//'clearHtmlOptions'=>array('class'=>'custom-clear'),
				'imageUrl'=>Yii::app()->request->baseUrl.'/imagenes/aplicacion/delete.png',
				//'url'=>'Yii::app()->controller->createUrl(Yii::app()->controller->action->ID,array("clearFilters"=>1))',
				'label'=>'Limpia la búsqueda',
		);

		foreach ($atributo as $at)
		{
			$a=trim($at);

			switch ($a)
			{
				case 'id':

					$atributos[$contador]=array(
					'name'=>$a,
					'header'=>'ID',
					);
					break;

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
					'header'=>'¿Inter?',
					'filter'=>array('1'=>'Sí','0'=>'No'),
					'value'=>'($data->es_internacional=="1")?("Sí"):("No")',
					);
					break;

				case 'sector_id':

					$atributos[$contador]=array(
					'name'=>$a,
					'filter'=>CHtml::listData(Sector::model()->findAll(array('order'=>'nombre ASC')), 'id', 'nombre'),
					'value'=>'Sector::model()->findByPk($data->sector_id)->nombre',
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

				case 'grado_academico':
					$atributos[$contador]=array(
					'name'=>$a,
					'value'=>'$data->'.$a,
					);
					break;

				case 'vip':
					$atributos[$contador]=array(
					'name'=>$a,
					);
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

				case 'fec_act':
					$atributos[$contador]=$a;
					break;

				case 'fec_alta':
					$atributos[$contador]=$a;
					break;

				case 'grupos_id':
					$atributos[$contador]=array(
					'name'=>$a,
					'filter'=>CHtml::listData(Grupos::model()->findAll(array('order'=>'nombre ASC')), 'id', 'nombre'),
					'value'=>'Grupos::model()->findByPk($data->medios->'.$a.')->nombre',
					);
					break;

				case 'medio':
					$atributos[$contador]=array(
					'name'=>$a,
					'value'=>'$data->medios->'.$a,
					);
					break;

				case 'tipo_medios_id':
					$atributos[$contador]=array(
					'name'=>$a,
					'filter'=>CHtml::listData(TipoMedios::model()->findAll(array('order'=>'nombre ASC')), 'id', 'nombre'),
					'value'=>'TipoMedios::model()->findByPk($data->medios->'.$a.')->nombre',
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

				case 'es_valido':
					$atributos[$contador]=array(
					'name'=>$a,
					'filter'=>array('1'=>'Sí','0'=>'No'),
					'value'=>'($data->documental->es_valido=="1")?("Sí"):("No")',
					);
					break;

				case 'confirmo':
					$atributos[$contador]=array(
					'name'=>$a,
					'filter'=>array('1'=>'Sí','0'=>'No'),
					'value'=>'($data->documental->confirmo=="1")?("Sí"):("No")',
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

				case 'nombre_asistente':
					$atributos[$contador]=$a;
					break;

				case 'apellido_asistente':
					$atributos[$contador]=$a;
					break;

				case 'estado':
					$atributos[$contador]=array(
					'name'=>$a,
					'filter'=>CHtml::listData(Estado::model()->findAll(array('order'=>'nombre ASC')), 'id', 'nombre'),
					'value'=>'DirectorioController::validaEstado($data->estado)',
					);
					break;

				case 'tipo':
					$atributos[$contador]=array(
					'name'=>$a,
					'type'=>'raw',
					'filter'=>CHtml::listData(Tipo::model()->findAll(array('order'=>'nombre ASC')), 'id', 'nombre'),
					'value'=>'DirectorioController::dameTipos($data->id)',
					);
					break;

				case 'paises_id':
					$atributos[$contador]=array(
					'name'=>$a,
					'filter'=>CHtml::listData(Paises::model()->findAll(array('order'=>'nombre ASC')), 'id', 'nombre'),
					'value'=>'DirectorioController::validaPais($data->paises_id)',
					);
					break;

				case 'usuarios_id':
					$atributos[$contador]=array(
					'name'=>$a,
					'filter'=>CHtml::listData(Usuarios::model()->findAll(array('order'=>'nombre ASC')), 'id', 'usuario'),
					'value'=>'Usuarios::model()->findByPk($data->usuarios_id)->usuario',
					);
					break;

				case 'observaciones':
					$atributos[$contador]=array(
					'name'=>$a,
					);
					break;

			}

			$contador++;
		}

		return $atributos;
	}

	/**
	 *
	 * @param integer $id del directorio
	 * @return string $cadena los nombres de los tipos relacionados
	 */
	public static function dameTipos ($id)
	{
		$cadena="<ul>";

		$results = Yii::app()->db->createCommand()
		->select('t.nombre')
		->from('tipos_directorio td')
		->leftJoin('tipo t', 'td.tipo_id=t.id')
		->where('td.directorio_id='.$id)
		->order('t.nombre')
		->queryAll();

		foreach ($results as $r) {
			$cadena.="<li>".$r['nombre']."</li>";
		}

		return $cadena.="</ul>";
	}

	public static function personaoInstitucion ($model)
	{
		if (trim($model->nombre) != "" || trim($model->apellido) != "")
			return $model->nombre.' '.$model->apellido;

		elseif (trim($model->institucion) != "")
		return $model->institucion;
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
