<?php

class EventosController extends Controller
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
				'actions'=>array('admin','delete'),
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
		if(Yii::app()->user->isGuest)
		{
			$this->redirect(array('site/login'));
		}else
		{
			if(!Yii::app()->user->isGuest){
				$this->render('view',array(
					'model'=>$this->loadModel($id),
				));
			}
		}
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Eventos;
		$evnt = 0;
		
		date_default_timezone_set("America/La_Paz" );
		
		if(!empty($_GET['id'])){
			$evnt = $_GET['id'];
			$model->id_evento = $evnt;
		}
		
		$model->Estado = 1;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Eventos']))
		{
			$model->FechaCreacion = date_format(new DateTime(), 'Y-m-d H:i:s');
			$model->id_usuarioC = Yii::app()->user->id;
			$model->FechaModificacion = date_format(new DateTime(), 'Y-m-d H:i:s');
			$model->id_usuarioM = Yii::app()->user->id;
			
			
			$fec_act = $_POST['Eventos']['Fecha'];
			$horita = $_POST['Eventos']['Horas'];
			$minutito = $_POST['Eventos']['Minutos'];
			
			$fec_venc = $_POST['Eventos']['FechaVencimiento'];
			$horitaVence = $_POST['Eventos']['HorasVence'];
			$minutitoVence = $_POST['Eventos']['MinutosVence'];
			
			$tiempo = getdate(time()); 
			
			if(isset($horita))
			{
				if($horita < 0 OR $horita > 23)
					$horita = $tiempo['hours'];
			}
			
			if(isset($minutito))
			{
				if($minutito < 0 OR $minutito > 59)
					$minutito = $tiempo['minutes'];
			}
			
			if(isset($horitaVence))
			{
				if($horitaVence < 0 OR $horitaVence > 23)
					$horitaVence = $tiempo['hours'];
			}
			
			if(isset($minutitoVence))
			{
				if($minutitoVence < 0 OR $minutitoVence > 59)
					$minutitoVence = $tiempo['minutes'];
			}
			
			$fec_act .= ' '.$horita.':'.$minutito.':00';
			$fec_venc .= ' '.$horitaVence.':'.$minutitoVence.':00';
			
			$model->attributes=$_POST['Eventos'];
			
			$model->Fecha = date_format(new DateTime($fec_act), 'Y-m-d H:i:s');
			$model->FechaVencimiento = date_format(new DateTime($fec_venc), 'Y-m-d H:i:s');
			
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_evento));
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

		if(isset($_POST['Eventos']))
		{
			$model->attributes=$_POST['Eventos'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_evento));
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
		$criteria = new CDbCriteria();
		$criteria->select = '*';
		$criteria->condition = 'Estado = 1';
		$criteria->order = 'Fecha DESC';
		
		if(Yii::app()->user->isGuest)
			$this->render('index_resume', array('eventos'=>Eventos::model()->findAll($criteria)));
		else
		{
			if(Yii::app()->user->name == 'admin')
			{
				$dataProvider=new CActiveDataProvider('Eventos');
				$this->render('index',array(
					'dataProvider'=>$dataProvider,
				));
			}else
			{
				if(!Yii::app()->user->isGuest)
				{
					$criteria = new CDbCriteria();
					$criteria->select = '*';
					$criteria->condition = 'id_usuarioC = '. Yii::app()->user->id.
										   ' AND id_evento not in(select id_evento from resultados) ';
					$criteria->order = 'Fecha DESC';
					$this->render('index_viewer', array('eventos'=>Eventos::model()->findAll($criteria)));
				}
			}
		}
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Eventos('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Eventos']))
			$model->attributes=$_GET['Eventos'];

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
		$model=Eventos::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='eventos-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
