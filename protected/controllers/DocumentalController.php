<?php

class DocumentalController extends Controller
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
				//array('allow',  // allow all users to perform 'index' and 'view' actions
				//'actions'=>array('index','view'),
				//'users'=>array('*'),
				//),
				array('allow', // allow authenticated user to perform 'create' and 'update' actions
						'actions'=>array('estadisticas'),
						'users'=>array('@'),
				),
				//array('allow', // allow admin user to perform 'admin' and 'delete' actions
		//	'actions'=>array('admin','delete'),
		//	'users'=>array('admin'),
		//),
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
		$this->render('view',array(
				'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Documental;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Documental']))
		{
			$model->attributes=$_POST['Documental'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
				'model'=>$model,
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

		if(isset($_POST['Documental']))
		{
			$model->attributes=$_POST['Documental'];
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
		$dataProvider=new CActiveDataProvider('Documental');
		$this->render('index',array(
				'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Documental('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Documental']))
			$model->attributes=$_GET['Documental'];

		$this->render('admin',array(
				'model'=>$model,
		));
	}

	/**
	 * Estadisticas para la parte de biodiversitas
	 */
	public function actionEstadisticas()
	{
		$this->layout='//layouts/column1';
		
		$datosSectores=$this->querySectores();
		$datosPaises=$this->queryPaises();
		$datosEstados=$this->queryEstados();

		$resultadosSectores=$datosSectores['resultados'];
		$resultadosPaises=$datosPaises['resultados'];
		$deMexico=$datosPaises['deMexico'];
		$resultadosEstados=$datosEstados['resultados'];

		$sinClasificarSectores=$datosSectores['sinClasificar'];
		$sinClasificarPaises=$datosPaises['sinClasificar'];
		$sinClasificarEstados=$datosEstados['sinClasificar'];
		
		$sinClasificarSectoresIds=$datosSectores['sinClasificarIds'];
		$sinClasificarPaisesIds=$datosPaises['sinClasificarIds'];
		$sinClasificarEstadosIds=$datosEstados['sinClasificarIds'];

		$valoresGraficaSector=$this->valoresGraficaSector($resultadosSectores);
		$valoresGraficaPais=$this->valoresGraficaPais($resultadosPaises);
		$valoresGraficaEstado=$this->valoresGraficaEstado($resultadosEstados);

		$this->render('estadisticas',array(
				'resultadosSectores'=>$resultadosSectores, 'sinClasificarSectores'=>$sinClasificarSectores['personas'],
				'valoresGraficaSector'=>$valoresGraficaSector, 'sinClasificarSectoresIds'=>$sinClasificarSectoresIds,
				'resultadosPaises'=>$resultadosPaises, 'sinClasificarPaises'=>$sinClasificarPaises['personas'],
				'valoresGraficaPais'=>$valoresGraficaPais, 'deMexico'=>$deMexico['personas'], 'sinClasificarPaisesIds'=>$sinClasificarPaisesIds,
				'resultadosEstados'=>$resultadosEstados, 'sinClasificarEstados'=>$sinClasificarEstados['personas'],
				'valoresGraficaEstado'=>$valoresGraficaEstado, 'sinClasificarEstadosIds'=>$sinClasificarEstadosIds,
		));
	}

	/**
	 *
	 * @return array, objetos del query
	 */
	private function querySectores ()
	{
		$resultados=Yii::app()->db->createCommand()
		->select('count(*) AS personas, sector_id AS sector')
		->from('directorio d')
		->leftJoin('documental doc', 'doc.id=d.id')
		->leftJoin('tipos_directorio td', 'td.directorio_id=d.id')
		->where('doc.es_valido=1 AND td.tipo_id=6')
		->group('sector_id')
		->order('sector_id')
		->queryAll();

		$sinClasificar=Yii::app()->db->createCommand()
		->select('count(*) AS personas')
		->from('directorio d')
		->leftJoin('documental doc', 'doc.id=d.id')
		->leftJoin('tipos_directorio td', 'td.directorio_id=d.id')
		->where('doc.es_valido=1 AND td.tipo_id=1')
		->queryRow();
		
		$sinClasificarIds=Yii::app()->db->createCommand()
		->select('d.id')
		->from('directorio d')
		->leftJoin('documental doc', 'doc.id=d.id')
		->leftJoin('tipos_directorio td', 'td.directorio_id=d.id')
		->where('doc.es_valido=1 AND td.tipo_id=1')
		->queryAll();

		return array('resultados'=>$resultados, 'sinClasificar'=>$sinClasificar, 'sinClasificarIds'=>$sinClasificarIds,);
	}

	/**
	 *
	 * @return array, objetos del query
	 */
	private function queryPaises ()
	{
		$resultados=Yii::app()->db->createCommand()
		->select('count(d.paises_id) AS personas, paises_id AS pais')
		->from('directorio d')
		->leftJoin('documental doc', 'doc.id=d.id')
		->leftJoin('tipos_directorio td', 'td.directorio_id=d.id')
		->where('doc.es_valido=1 AND td.tipo_id=6 AND d.es_internacional=1 AND 
				((d.paises_id IS NOT NULL AND domicilio_alt_principal=0) OR (d.paises_id1 IS NOT NULL AND domicilio_alt_principal=1))')
		->group('d.paises_id')
		->queryAll();
		
		$deMexico=Yii::app()->db->createCommand()
		->select('count(*) AS personas')
		->from('directorio d')
		->leftJoin('documental doc', 'doc.id=d.id')
		->leftJoin('tipos_directorio td', 'td.directorio_id=d.id')
		->where('doc.es_valido=1 AND td.tipo_id=6 AND d.es_internacional=0')
		->queryRow();

		$sinClasificar=Yii::app()->db->createCommand()
		->select('count(*) AS personas')
		->from('directorio d')
		->leftJoin('documental doc', 'doc.id=d.id')
		->leftJoin('tipos_directorio td', 'td.directorio_id=d.id')
		->where('doc.es_valido=1 AND td.tipo_id=6 AND d.es_internacional=1 AND 
				((d.paises_id IS NULL AND domicilio_alt_principal=0) OR (d.paises_id1 IS NULL AND domicilio_alt_principal=1))')
		->queryRow();
		
		$sinClasificarIds=Yii::app()->db->createCommand()
		->select('d.id')
		->from('directorio d')
		->leftJoin('documental doc', 'doc.id=d.id')
		->leftJoin('tipos_directorio td', 'td.directorio_id=d.id')
		->where('doc.es_valido=1 AND td.tipo_id=6 AND d.es_internacional=1 AND
				((d.paises_id IS NULL AND domicilio_alt_principal=0) OR (d.paises_id1 IS NULL AND domicilio_alt_principal=1))')
		->queryAll();

		return array('resultados'=>$resultados, 'deMexico'=>$deMexico, 'sinClasificar'=>$sinClasificar, 'sinClasificarIds'=>$sinClasificarIds,);
	}
	
	/**
	 *
	 * @return array, objetos del query
	 */
	private function queryEstados ()
	{
		$resultados=Yii::app()->db->createCommand()
		->select('count(d.estado) AS personas, estado AS estado')
		->from('directorio d')
		->leftJoin('documental doc', 'doc.id=d.id')
		->leftJoin('tipos_directorio td', 'td.directorio_id=d.id')
		->where('doc.es_valido=1 AND td.tipo_id=6 AND d.es_internacional=0 AND 
				((d.estado IS NOT NULL AND domicilio_alt_principal=0) OR (d.estado_alternativo IS NOT NULL AND domicilio_alt_principal=1))')
		->group('CONVERT(d.estado, UNSIGNED)')
		->queryAll();
	
		$deMexico=Yii::app()->db->createCommand()
		->select('count(*) AS personas')
		->from('directorio d')
		->leftJoin('documental doc', 'doc.id=d.id')
		->leftJoin('tipos_directorio td', 'td.directorio_id=d.id')
		->where('doc.es_valido=1 AND td.tipo_id=6 AND d.es_internacional=0')
		->queryRow();
	
		$sinClasificar=Yii::app()->db->createCommand()
		->select('count(*) AS personas')
		->from('directorio d')
		->leftJoin('documental doc', 'doc.id=d.id')
		->leftJoin('tipos_directorio td', 'td.directorio_id=d.id')
		->where('doc.es_valido=1 AND td.tipo_id=6 AND d.es_internacional=0 AND
				((d.estado IS NULL AND domicilio_alt_principal=0) OR (d.estado_alternativo IS NULL AND domicilio_alt_principal=1))')
		->queryRow();
		
		$sinClasificarIds=Yii::app()->db->createCommand()
		->select('d.id')
		->from('directorio d')
		->leftJoin('documental doc', 'doc.id=d.id')
		->leftJoin('tipos_directorio td', 'td.directorio_id=d.id')
		->where('doc.es_valido=1 AND td.tipo_id=6 AND d.es_internacional=0 AND
				((d.estado IS NULL AND domicilio_alt_principal=0) OR (d.estado_alternativo IS NULL AND domicilio_alt_principal=1))')
		->queryAll();
	
		return array('resultados'=>$resultados, 'deMexico'=>$deMexico, 'sinClasificar'=>$sinClasificar, 'sinClasificarIds'=>$sinClasificarIds,);
	}

	/**
	 *
	 * @param query $valores
	 * @return array para valores de la serie
	 */
	private function valoresGraficaSector ($valores)
	{
		$valor=array();

		foreach ($valores as $v)
		{
			array_push($valor, array(Sector::model()->findByPk((int) $v['sector'])->nombre, (int) $v['personas']));
		}

		return $valor;
	}
	
	/**
	 *
	 * @param query $valores
	 * @return array para valores de la serie
	 */
	private function valoresGraficaPais ($valores)
	{
		$valor=array();
	
		foreach ($valores as $v)
		{
			array_push($valor, array(Paises::model()->findByPk((int) $v['pais'])->nombre, (int) $v['personas']));
		}
	
		return $valor;
	}
	
	/**
	 *
	 * @param query $valores
	 * @return array para valores de la serie
	 */
	private function valoresGraficaEstado ($valores)
	{
		$valor=array();
	
		foreach ($valores as $v)
		{
			array_push($valor, array(Estado::model()->findByPk((int) $v['estado'])->nombre, (int) $v['personas']));
		}
	
		return $valor;
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Documental the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Documental::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'La página solicitada no existe.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Documental $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='documental-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
