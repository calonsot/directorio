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
						'actions'=>array('index','view','create','update','admin','delete', 'imprimelista'),
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
		$model=$this->loadModel($id);
		$model->veces_consulta++;

		if($model->saveAttributes(array('veces_consulta'))) {
			$this->render('view',array(
					'model'=>$model,
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
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Listas']))
		{
			$model->attributes=$_POST['Listas'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
				'model'=>$model,
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
		$dataProvider=new CActiveDataProvider('Listas',array (
				'criteria' => array ('condition' => 'usuarios_id='.Yii::app()->user->id_usuario, 'order'=>'veces_consulta DESC')));
		$this->render('index',array(
				'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Listas('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Listas']))
			$model->attributes=$_GET['Listas'];

		$this->render('admin',array(
				'model'=>$model,
		));
	}

	/**
	 * Arroja al browser el archivo
	 * @param integer $id el identificador de la lista
	 * @throws CHttpException
	 */
	public function actionImprimeLista ($id)
	{
		$lista=Listas::model()->findByPk($id);

		if ($lista != null) {
			$fileName = "\"".$lista->nombre.".csv\"";

			header('Content-Description: File Transfer');
			header('Content-Type: application/octet-stream');
			header('Content-Disposition: attachment; filename=' . $fileName);
			header('Content-Transfer-Encoding: binary');
			header('Expires: 0');
			header('Cache-Control: must-revalidate, post-check=0, pre-check=0');

			$this->ponDatosContactos($lista);

		} else {
			throw new CHttpException(404,'Esa pagina no existe.');
		}
	}

	/**
	 *
	 * @param Lista $model
	 * @return string de los datos de los contactos
	 */
	public function ponDatosContactos($model, $vista=null)
	{
		Yii::import('ext.csv.ECSVExport');
		$cadena=array();
		$cadena_final=array();
		$formato_mail=false;
		$contactos=explode(',', $model->cadena);
		$atributos=explode(',', $model->atributos);
		$contador=0;
		
		foreach ($contactos as $id)
		{
			$model_cont=Directorio::model()->findByPk($id);

			if ($model_cont != null)
			{
				$correos=$this::dameLosCorreos($model_cont->correo, $model_cont->correo_alternativo, $model_cont->correos);

				if ($model->formatos_id == 3 || $model->formatos_id == 4)
				{
					if ($correos!='')
					{
						if ($model_cont->es_institucion == 1)
						{
							foreach ($correos as $c)
							{
								$cadena[$c]="\"".$model_cont->institucion."\" ".$c;
							}

							$formato_mail=true;

						} else {

							foreach ($correos as $c)
							{
								$cadena[$c]="\"".$model_cont->nombre." ".$model_cont->apellido."\" ".$c;
							}

							$formato_mail=true;
						}
					}

				} else {

					foreach ($atributos as $a)
					{
						$cadena[$a]=$model_cont->$a;
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

			if ($vista===null) {
				echo $csv->toCSV();
			} else
				$csv->toCSV($model->nombre.".csv");

		} else {
			$csv = new ECSVExport($cadena_final,true, true, '|', ' ');

			if ($vista===null)
				echo $csv->toCSV();
			else
				$csv->toCSV($model->nombre.".csv");
		}
	}

	/**
	 *
	 * @param $string $correo
	 * @param $string $correo_alt
	 * @param $string $correos
	 * @return multitype: array de los correos totales o null si no encontro nada
	 */
	private static function dameLosCorreos ($correo, $correo_alt, $correos)
	{
		$correos_totales='';

		if ($correo != '' && $correo != null)
			$correos_totales.=$correo.",";
		if ($correo_alt != '' && $correo_alt != null)
			$correos_totales.=$correo_alt.",";
		if ($correos != '' && $correos != null)
		{
			$correos_separados=explode(',', $correos);

			foreach ($correos_separados as $c)
			{
				if ($c != '' && $c != null)
					$correos_totales.=$c.",";
			}
		}

		$correos_finales=explode(',', $correos_totales);

		foreach ($correos_finales as $key=>$val)
		{
			if ($val == '' || $val == null)
				unset($correos_finales[$key]);
		}

		if (count($correos_finales) == 0)
		{
			$correos_finales='';
		}

		return $correos_finales;
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
