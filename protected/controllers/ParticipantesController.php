<?php

class ParticipantesController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
	public $file_min;
	public $file_max;
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
				'users'=>array('admin', '@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('admin', '@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
			array('loadImage', //allow loading images
				'users' => array('@'),
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

	public function actionloadImage($id)
    {
        $model=$this->loadModel($id);
        $this->renderPartial('image', array(
            'model'=>$model
        ));
    }
	
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new participantes;
		date_default_timezone_set("America/La_Paz" );
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['participantes']))
		{
			$model->attributes=$_POST['participantes'];
			
			$model->FechaCreacion = date_format(new DateTime(), 'Y-m-d H:i:s');
			$model->id_usuarioC = Yii::app()->user->id;
			$model->FechaModificacion = date_format(new DateTime(), 'Y-m-d H:i:s');
			$model->id_usuarioM = Yii::app()->user->id;
			$file_min = CUploadedFile::getInstance($model,'foto_pequena');
			$file_max = CUploadedFile::getInstance($model,'foto_grande');
			
			if($file_min)
			{
				$model->foto_pequena = base64_encode(file_get_contents($file_min->getTempName()));
			}
			
			if($file_max)
			{
				$model->foto_grande = base64_encode(file_get_contents($file_max->getTempName()));
			}
			
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_participante));
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
		date_default_timezone_set("America/La_Paz" );
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['participantes']))
		{
			$model->attributes=$_POST['participantes'];
			$model->FechaModificacion = date_format(new DateTime(), 'Y-m-d H:i:s');
			$model->id_usuarioM = Yii::app()->user->id;
			
			$file_min = CUploadedFile::getInstance($model,'foto_pequena');
			$file_max = CUploadedFile::getInstance($model,'foto_grande');
			
			if($file_min)
			{
				$model->foto_pequena = base64_encode(file_get_contents($file_min->getTempName()));
			}
			
			if($file_max)
			{
				$model->foto_grande = base64_encode(file_get_contents($file_max->getTempName()));
			}
			
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_participante));
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
		$dataProvider=new CActiveDataProvider('participantes');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new participantes('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['participantes']))
			$model->attributes=$_GET['participantes'];

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
		$model=participantes::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='participantes-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
