<?php

class ResultadosController extends Controller
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
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete', 'contabilizar'),
				'users'=>array('admin'),
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
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}
	
	public function actionContabilizar()
	{
		$criteria = new CDbCriteria();
		$criteria->select = '*';
		$criteria->condition = 'id_evento in 
								(SELECT id_evento
								 FROM resultados)';
		$criteria->order = 'Fecha DESC';
		
		if(!Yii::app()->user->isGuest)
		{
			$this->render('contabilizar', array('eventos'=>Eventos::model()->findAll($criteria)));
		}
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$evnt = 0;
		$model=new Resultados;
		$criteria = new CDbCriteria();
		
		/*if(isset($_GET))
		{
			/*$evnt = $_GET['Eventos']['id_evento'];
			$criteria->select = '*';
			$criteria->condition = 'id_usuarioC = ' + Yii::app()->user->id;
			$criteria->order = 'id_resultado DESC';
		}else
		{*/
			$criteria->select = '*';
			$criteria->condition = 'id_usuarioC = ' + Yii::app()->user->id+
								   '';
			$criteria->order = 'id_resultado DESC';
		//}
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		if(!Yii::app()->user->isGuest)
		{
			if(isset($_POST['Resultados']))
			{
				$fechaHoy = new DateTime();
				$model->FechaRegistro = date_format($fechaHoy, 'Y-m-d H:i:s');
				$model->attributes=$_POST['Resultados'];
				
				if($model->save())
					$this->redirect(array('view','id'=>$model->id_resultado));
			}
	
			$this->render('create',array('model'=>$model));
		}
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

		if(isset($_POST['Resultados']))
		{
			$model->attributes=$_POST['Resultados'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_resultado));
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
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Resultados');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Resultados('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Resultados']))
			$model->attributes=$_GET['Resultados'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Resultados::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='resultados-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
