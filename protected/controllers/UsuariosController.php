<?php

class UsuariosController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
	public $file;

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
				'actions'=>array('index'),
				'users'=>array('@'),
			),
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('view', 'index'),
				'roles'=>array('rol_usr_todos'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('update'),
				'roles'=>array('rol_usr_todos'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create'),
				'users'=>array('*'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete', 'update', 'create', 'index', 'view'),
				'users'=>array('admin'),
			),
			
			array('deny', // deny authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create'),
				'roles'=>array('rol_usr_todos'),
				'users'=>array('@'),
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
		if(empty(Yii::app()->user))
			throw new CHttpException(404);
			
		$oldId = Yii::app()->user->id;
		
		if($oldId == $id)
		{
			$this->render('view',array(
				'model'=>$this->loadModel($id),
			));
		}else
		{
			$this->redirect(array('usuarios/'.$oldId.'?'));
		}
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
		$model=new Usuarios;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		/*if(isset($_POST['Usuarios']))
		{
			$model->attributes=$_POST['Usuarios'];
			$uploadedFile = CUploadedFile::getInstance($model,'foto');
			
			if($model->save()){
				$model->foto = base64_encode(file_get_contents($uploadedFile->getTempName()));
				$this->redirect(array('view','id'=>$model->id_usuario));
			}
		} */
		
		if(isset($_POST['Usuarios']))
		{
			$model->attributes = $_POST['Usuarios'];
			$file = CUploadedFile::getInstance($model,'Foto');
			
			/*$auth = Yii::app()->authManager;
			
			$auth->createOperation('ver_usr_todos', 'Permite listar los usuarios');		
		
			$task = $auth->createTask('tarea_usr_todos', 'Permite listar los usuarios');
			$task->addChild('ver_usr_todos');
			
			$role = $auth->createRole('rol_usr_todos', 'Permite listar los usuarios');
			$role->addChild('tarea_usr_todos');
			
			$auth->assign('rol_usr_todos', $_POST['Usuarios']['id_usuario']);*/
			
			if($file)
			{
				//if(!empty($_FILES['Usuarios']['tmp_name']['foto']))
		        //{
		            /*$model->fileName = $file->name;
		            $model->fileType = $file->type;*/
		          	/*$fp = fopen($file->tempName, 'r');
		            $content = fread($fp, filesize($file->tempName));
		            fclose($fp);
		            $model->Foto = $content;*/
				$model->Foto = base64_encode(file_get_contents($file->getTempName()));
				
		        //}
			}
			
			$model->BBPIN = strtolower($model->BBPIN);
			$model->NombreCompleto = $model->Nombre.' '.$model->Paterno.' '.$model->Materno;
			$model->Password = $model->hashPassword($_POST['Usuarios']['Password'], $sesion=$model->generateSalt());
			$model->Sesion = $sesion;
			
			if($model->save()){
				$this->redirect(array('view','id'=>$model->id_usuario));
				/*$this->redirect(array('index'));*/
			}
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
		$oldRecord = $this->loadModel($id);
		
		if(empty(Yii::app()->user))
			throw new CHttpException(404);
			
		$oldId = Yii::app()->user->id;
		
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Usuarios']))
		{
			$model->attributes=$_POST['Usuarios'];
			
		 	if(!empty($_FILES['Usuarios']['tmp_name']['Foto']))
            {
                $file = CUploadedFile::getInstance($model,'Foto');
                /*$model->fileName = $file->name;
                $model->fileType = $file->type;*/
                /*$fp = fopen($file->tempName, 'r');
                $content = fread($fp, filesize($file->tempName));
                fclose($fp);
                $model->Foto = $content;*/
                
                $model->Foto = base64_encode(file_get_contents($file->getTempName()));
                
            }
            
			if(!isset($file))
   				$model->Foto = $oldRecord->Foto;

			$model->NombreCompleto = $model->Nombre.' '.$model->Paterno.' '.$model->Materno;
            $model->Password = $model->hashPassword($_POST['Usuarios']['Password'], $sesion=$model->generateSalt());
			$model->Sesion = $sesion;
			$model->BBPIN = strtolower($model->BBPIN);
            //$model->nombre = Yii::app()->user->name;
            
            if($model->save())
                $this->redirect(array('view','id'=>$model->id_usuario));
            
                
                
            /*$this->render('create',array(
	            'model'=>$model,
	            'types'=>Type::model()->findAll()
	        ));*/
	        
			/*$uploadedFile = CUploadedFile::getInstance($model,'foto');
			
			if($model->save())
			{
				$model->foto = base64_encode(file_get_contents($uploadedFile->getTempName()));
				$this->redirect(array('view','id'=>$model->id_usuario));
			}
			*/
		}

		if($oldId == $id)
		{
			$this->render('update',array(
				'model'=>$model,
			));
		}else
		{
			$model = $this->loadModel($oldId);
			$this->render('update', array(
				'model'=>$model,
			));
		}
		
		/*$this->render('update',array(
			'model'=>$model,
		));*/
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
		$auth = Yii::app()->authManager;
		
		/*
		$auth->createOperation('ver_usr_todos', 'Permite listar los usuarios');		
		
		$task = $auth->createTask('tarea_usr_todos', 'Permite listar los usuarios');
		$task->addChild('ver_usr_todos');
		
		$role = $auth->createRole('rol_usr_todos', 'Permite listar los usuarios');
		$role->addChild('tarea_usr_todos');
		
		$auth->assign('rol_usr_todos', Yii::app()->user->id);
		*/
		
		if(Yii::app()->authManager->checkAccess('ver_usr_todos', Yii::app()->user->id))
		{
			/*$dataProvider=new CActiveDataProvider('Usuarios');
			$this->render('index',array(
				'dataProvider'=>$dataProvider,
			));*/
			
			//$this->actionView(Yii::app()->user->id);
			$this->actionView(Yii::app()->user->id);
		}else
		{
			$this->actionView(Yii::app()->user->id);
		}
		
		
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Usuarios('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Usuarios']))
			$model->attributes=$_GET['Usuarios'];

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
		$model=Usuarios::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='usuarios-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
