<?php

class ListasController extends Controller
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

				array('allow', // allow authenticated user to perform 'create' and 'update' actions
						'actions'=>array('index','view','create','update','admin','delete', 'imprimelista', 'activa', 'exportaword'),
						'users'=>array('@','admin'),
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

			if($model->save()) {
				$this->render('view',array(
						'model'=>$model,
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
		$datos=$this->dameInfoUsuario();

		if ($datos['super_usuario']==1 || $datos['admin']==1)
		{
			$model=new Listas;
			$model->fec_alta=self::fechaAlta();
			$model->usuarios_id=Yii::app()->user->id_usuario;

			$columnas=$this->columnasTablas();

			// Uncomment the following line if AJAX validation is needed
			// $this->performAjaxValidation($model);

			if(isset($_POST['Listas']))
			{
				$model->attributes=$_POST['Listas'];
				if($model->save())
					$this->redirect(array('view','id'=>$model->id));
			}

			$this->render('create',array(
					'model'=>$model, 'columnas'=>$columnas,
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

			// Uncomment the following line if AJAX validation is needed
			// $this->performAjaxValidation($model);

			if(isset($_POST['Listas']))
			{
				$model->attributes=$_POST['Listas'];
				$model->fec_act=self::fechaAlta();

				if($model->save())
					$this->redirect(array('view','id'=>$model->id));
			}

			$this->render('update',array(
					'model'=>$model,
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
			$dataProvider=new CActiveDataProvider('Listas',array (
					'criteria' => array ('condition' => 'usuarios_id='.Yii::app()->user->id_usuario, 'order'=>'veces_consulta DESC')));
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
			$model=new Listas('search');
			$model->unsetAttributes();  // clear any default values
			if(isset($_GET['Listas']))
				$model->attributes=$_GET['Listas'];

			$this->render('admin',array(
					'model'=>$model,
			));

		} else {
			throw new CHttpException(NULL,'Aun no has sido dado de alta en el sistema para consultar, porfavor intentalo más tarde en lo que el sistema te valida.');
		}
	}

	/**
	 * Arroja al browser el archivo
	 * @param integer $id el identificador de la lista
	 * @throws CHttpException
	 */
	public function actionImprimeLista ($id)
	{
		$lista=Listas::model()->findByPk($id);

		if ($lista != null)
		{
			header('Content-Encoding: UTF-8');

			if ((int) $lista->formatos_id % 2)
			{
				header('Content-type: text/txt; charset=UTF-8');
				$fileName = "\"".$lista->nombre.".csv\"";
					
			} else {
				header('Content-type: text/csv; charset=UTF-8');
				$fileName = "\"".$lista->nombre.".txt\"";
			}

			header('Content-Disposition: attachment; filename=' . $fileName);
			header('Expires: 0');
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');

			echo "\xEF\xBB\xBF";
			$this->ponDatosContactos($lista);

		} else {
			throw new CHttpException(404,'Esa pagina no existe.');
		}
	}

	public function actionExportaWord ()
	{
		header("Content-type: application/vnd.ms-word");
		header("Content-Disposition: attachment;Filename=document_name.docx");

		echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=Windows-1252\">";
		echo "<b>My first document</b>";
	}

	/**
	 *
	 * @param Lista $model
	 * @return string de los datos de los contactos
	 */
	public function ponDatosContactos($model, $vista=null)
	{
		Yii::import('ext.csv.ECSVExport');
		$cadena_encabezado=array();
		$cadena=array();
		$cadena_final=array();
		$formato_mail=false;
		$contactos=explode(',', $model->cadena);
		$atributos=explode(',', $model->atributos);
		$contador=1;

		foreach ($atributos as $a)
		{
			$cadena_encabezado[$a."-attr"]=$a;
		}

		$cadena_final[0]=$cadena_encabezado;

		foreach ($contactos as $id)
		{
			$model_cont=Directorio::model()->findByPk($id);
			$model_cont_medios=Medios::model()->findByPk($id);
			$model_cont_documental=Documental::model()->findByPk($id);

			if ($model_cont != null)
			{
				$correos=$this->dameLosCorreos($model_cont->correo, $model_cont->correo_alternativo, $model_cont->correos);

				if ($model->formatos_id == 3 || $model->formatos_id == 4 || $model->formatos_id == 5 || $model->formatos_id == 6)
				{
					if ($correos!='')
					{
						if($model->formatos_id == 5 || $model->formatos_id == 6)
						{
							foreach ($correos as $c)
								array_push($cadena, $c);

							$formato_mail=true;

						} else {

							if (trim($model_cont->nombre) != '' || trim($model_cont->apellido) != '')
							{
								foreach ($correos as $c)
									//$cadena[$c]="\"".$model_cont->nombre." ".$model_cont->apellido."\" - ".$c;
									array_push($cadena, $model_cont->nombre." ".$model_cont->apellido." - ".$c);
									
								$formato_mail=true;
									
							} else {
									
								foreach ($correos as $c)
									//$cadena[$c]="\"".$model_cont->institucion."\" - ".$c;
									array_push($cadena, $model_cont->institucion." - ".$c);

								$formato_mail=true;
							}

							//$cadena_final[$contador]=$cadena;
							//$contador++;
						}
					}

				} else {

					foreach ($atributos as $att)
					{
						$a=trim($att);

						if ($a=='grupos_id' || $a=='medio' || $a=='tipo_medios_id' || $a=='perfil_medio' || $a=='programa')
						{
							if ($a=='grupos_id')
								$cadena[$a]=Grupos::model()->findByPk($model_cont_medios->{trim($a)})->nombre;

							elseif ($a=='tipo_medios_id')
							$cadena[$a]=TipoMedios::model()->findByPk($model_cont_medios->{trim($a)})->nombre;

							else
								$cadena[$a]=$model_cont_medios->{trim($a)};

						} elseif ($a=='es_valido' || $a=='sigla_institucion' || $a=='sigla_dependencia'
								|| $a=='dependencia' || $a=='subdependencia' || $a=='actividad')
						{
							$cadena[$a]=$model_cont_documental->{trim($a)};

						} else {
							if ($a=='sector_id')
								$cadena[$a]=Sector::model()->findByPk($model_cont->{trim($a)})->nombre;

							else
								$cadena[$a]=$model_cont->{trim($a)};
						}
					}

					$cadena_final[$contador]=$cadena;
					$contador++;
				}

			} else { //ids que los borraron y aun estan en la lista

			}
		}

		if ($formato_mail)//formato a exportar
		{
			$csv = new ECSVExport(array($cadena),true, false, null, ' ');

			if ($vista===null)
				echo str_replace(',', "\n", $csv->toCSV());

			else
				//$csv->toCSV($model->nombre.".csv"); //manda directo al CSV
				return $this->imprimeListaWeb($csv->toCSV(), true);

		} else {
			$csv = new ECSVExport($cadena_final,true, false, '|', ' ');

			if ($vista===null)
				echo $csv->toCSV();

			else
				//$csv->toCSV($model->nombre.".csv");
				return $this->imprimeListaWeb($csv->toCSV());
		}
	}

	/**
	 *
	 * @param String $datos cadena de toda la lista
	 * @return string la cadena con formato de web
	 */
	public function imprimeListaWeb ($datos, $soloCorreos=null)
	{
		if ($soloCorreos)
			$dat=split(",",$datos);

		else
			$dat=split("\n",str_replace('|', '*', $datos));

		$cadena='<ol>';

		foreach ($dat as $d)
		{
			if ($d !== '')
				$cadena.='<li>'.$d.'</li>';
		}

		return $cadena.='</ol>';
	}

	/**
	 *
	 * @param $string $correo
	 * @param $string $correo_alt
	 * @param $string $correos
	 * @return multitype: array de los correos totales o null si no encontro nada
	 */
	private function dameLosCorreos ($correo, $correo_alt, $correos)
	{
		$correos_totales='';

		if ($correo != '' && $correo != null)
			$correos_totales.=$correo.',';
		if ($correo_alt != '' && $correo_alt != null)
			$correos_totales.=$correo_alt.',';
		if ($correos != '' && $correos != null)
		{
			$correos_separados=explode(',', $correos);

			foreach ($correos_separados as $c)
			{
				if ($c != '' && $c != null)
					$correos_totales.=$c.',';
			}
		}

		$correos_finales=explode(',', $correos_totales);

		foreach ($correos_finales as $key=>$val)
		{
			if ($val == '' || $val == null)
				unset($correos_finales[$key]);
		}

		if (count($correos_finales) == 0)
			$correos_finales='';


		return $correos_finales;
	}

	/**
	 * Borra todos los registros seleccionados
	 * @throws Exception ecepcion si no lo pudo borrar
	 */
	public function actionActiva()
	{
		$id=$_GET['id'];
		$lista=Listas::model()->findByPk($id);
		$lista->esta_activa=1;
		$activas=Listas::model()->findAllByAttributes(array('esta_activa'=>1, 'usuarios_id'=>Yii::app()->user->id_usuario));

		foreach ($activas as $act)
		{
			$act->esta_activa=0;
			$act->saveAttributes(array('esta_activa'));
		}

		if($lista->saveAttributes(array('esta_activa')))
			echo 'ok';

		else
			throw new Exception("Lo sentimos no se pudo hacer la opracion",500);
	}

	public function cambiaBoton($data)
	{
		if (!$data->esta_activa)
			return CHtml::ajaxSubmitButton('Activar',array('listas/activa','id'=>$data->id),
					array('success'=>'reloadGrid'));

		else
		 return CHtml::ajaxSubmitButton('Activar',array('listas/activa','id'=>$data->id),
		 		array('success'=>'reloadGrid'), array('disabled'=>'disabled'));

	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Listas the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Listas::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'Esa pagina no existe.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Listas $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='listas-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
