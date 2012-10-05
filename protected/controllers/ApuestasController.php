<?php

class ApuestasController extends Controller
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
				'actions'=>array('index'),
				'users'=>array('*'),
			),
			array('allow',  // allow users to perform 'index' and 'view' actions
				'actions'=>array('view', 'excel', 'see', 'invite'),
				'users'=>array('@'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create', 'index'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete', 'excel'),
				'users'=>array('admin', 'jtaborga'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}
	
	/**
	 * Generate Excel file write by request
	 */
	
	public function actionExcel()
	{
		$texto = '';
		
		if(Yii::app()->user->name == 'admin')
		{
			$model = Apuestas::model()->findAll('Estado = 1');
			
			/*foreach($model as $apuesta)
				$texto.= $apuesta->id_usuario.','.$apuesta->Marcador1.','.$apuesta->Marcador2;
			*/
			
			Yii::app()->request->sendFile('apuestas.xls', 
			$this->renderPartial('excel', array(
				'model'=>$model,
				), true)
			);
		}else
		{
			$mostrarApuestas = false;
			
			if(!Yii::app()->user->isGuest)
			{
				date_default_timezone_set("America/La_Paz" );
				$totalContEvs = 0;
				
				$pcriteria = new CDbCriteria();
				$pcriteria->select = 'id_evento, Nombre, Participante1, Participante2, Fecha, Estado, count(id_evento) id_usuarioC';
				$pcriteria->condition = 'Estado = 1
										and id_evento 
										in (select id_evento
										from apuestas
										where id_usuario = '.Yii::app()->user->id.') 
										and FechaVencimiento < \''.date_format(new DateTime(), 'Y-m-d H:i:s').'\'';
				
				$pcriteria->order = 'Fecha DESC';
				
				$myevento = Eventos::model()->findAll($pcriteria);
				
				if(count($myevento) > 0)
				{
					$contar = $myevento[0]->id_usuarioC;
					
					$ccriteria = new  CDbCriteria();
					$ccriteria->select = 'count(*) id_evento';
					$ccriteria->condition = 'Estado = 1';
					
					$totalevs = Eventos::model()->findAll($ccriteria);
					
					if(count($totalevs) > 0)
						$totalContEvs = $totalevs[0]->id_evento;
						
					if($contar == $totalContEvs)
						$mostrarApuestas = true;
				}
			}
			
			if($mostrarApuestas == false)
				$model = Apuestas::model()->findAll('Estado = 1 AND id_usuario = '.Yii::app()->user->id);
			else{
				$res = new CDbCriteria();
				$res->select = '*';
				$res->condition = 'id_evento in (
										SELECT id_evento
										FROM eventos
										WHERE estado = 1
										)';
										
				$model = Apuestas::model()->findAll($res);
			}
			
			Yii::app()->request->sendFile('apuestas.xls', 
			$this->renderPartial('excel', array(
				'model'=>$model,
				), true)
			);
		}
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
		$model=new Apuestas;
		$evnt = 0;
		$horita;
		$minutito;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		date_default_timezone_set("America/La_Paz" );
		$tiempo = getdate(time());
		
		if(!empty($_GET['evento'])){
			$evnt = $_GET['evento'];
			$model->id_evento = $evnt;
			$evnt = Eventos::model()->findByPk($evnt);
			$horita = date_format(new DateTime($evnt->Fecha), 'H');
			$minutito = date_format(new DateTime($evnt->Fecha), 'i');
		}
		
		$model->id_usuario = Yii::app()->user->id;
		
		$model->FechaRegistro = date_format(new DateTime(), 'Y-m-d H:i:s');
		$model->FechaLimite = $evnt->Fecha;
		$model->Estado = 1;
		
		if(isset($_POST['Apuestas']))
		{
			$model->id_usuarioC = Yii::app()->user->id;
			$model->FechaCreacion = date_format(new DateTime(), 'Y-m-d H:i:s');
			$model->id_usuarioM = Yii::app()->user->id;
			$model->FechaModificacion = date_format(new DateTime(), 'Y-m-d H:i:s');
			
			$model->attributes=$_POST['Apuestas'];
			
			if(strtotime($evnt->Fecha) > strtotime($model->FechaCreacion))
			{
				if($model->save())
					$this->redirect(array('view','id'=>$model->id_apuesta));
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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Apuestas']))
		{
			$model->attributes=$_POST['Apuestas'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id_apuesta));
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
		$auth = '';
		
		if(!empty($_GET['usuario']))
			$auth = $_GET['usuario'];
			
		if(Yii::app()->user->name == 'admin')
		{
			$dataProvider=new CActiveDataProvider('Apuestas');
			$this->render('index',array(
				'dataProvider'=>$dataProvider,
			));
		}else
		{			
			if(Yii::app()->user->isGuest){
				date_default_timezone_set("America/La_Paz" );
				$resCriteria = new CDbCriteria();
				$resCriteria->select = '*';
				$resCriteria->condition = 'id_evento in (
										SELECT id_evento
										FROM eventos
										WHERE estado = 1
										)';
				
				$criteria = new CDbCriteria();
				$criteria->select = '*';
				$criteria->condition = 'Estado = 1
										AND Fecha >= \''.date_format(new DateTime(), 'Y-m-d H:i:s').'\'';
									    
				$criteria->order = 'Fecha DESC';
		
				$this->render('index_resume', array('eventos'=>Eventos::model()->findAll($criteria), 'resultados' => Resultados::model()->findAll($resCriteria)));
				//$this->redirect('/site/login');
			}
			else{
				
				$criteria = new CDbCriteria();
				$criteria->select = '*';
				$criteria->condition = 'id_usuario = '.Yii::app()->user->id.
									   ' AND id_evento in (SELECT id_evento
														   FROM eventos
														   WHERE estado = 1)';
				$criteria->order = 'id_evento DESC';
				
				$resCriteria = new CDbCriteria();
				$resCriteria->select = '*';
				$resCriteria->condition = 'id_evento in (
										SELECT id_evento
										FROM eventos
										WHERE estado = 1
										)';
										
				$this->render('view_user', array('apuestas'=>Apuestas::model()->findAll($criteria), 'resultados' => Resultados::model()->findAll($resCriteria)));
				
			}
		}
	}

	
	public function actionSee()
	{
		$auth = '';
		$mostrarApuestas = false;
		date_default_timezone_set("America/La_Paz" );
		
		if(!empty($_GET['usuario']))
			$auth = $_GET['usuario'];
			
		if(Yii::app()->user->name == 'admin')
		{
			$dataProvider=new CActiveDataProvider('Apuestas');
			$this->render('index',array(
				'dataProvider'=>$dataProvider,
			));
		}else
		{			
			if(Yii::app()->user->isGuest){
				
				$resCriteria = new CDbCriteria();
				$resCriteria->select = '*';
				$resCriteria->condition = 'id_evento in (
										SELECT id_evento
										FROM eventos
										WHERE estado = 1
										)';
				
				$criteria = new CDbCriteria();
				$criteria->select = '*';
				$criteria->condition = 'Estado = 1
										AND Fecha >= \''.date_format(new DateTime(), 'Y-m-d H:i:s').'\'';
									    
				$criteria->order = 'Fecha DESC';
		
				$this->render('index_resume', array('eventos'=>Eventos::model()->findAll($criteria), 'resultados' => Resultados::model()->findAll($resCriteria)));
				//$this->redirect('/site/login');
			}
			else{
				
				$criteria = new CDbCriteria();
				$criteria->select = '*';
				$criteria->condition = 'id_usuario = '.Yii::app()->user->id.
									   ' AND id_evento in (SELECT id_evento
														   FROM eventos
														   WHERE estado = 1)';
				$criteria->order = 'id_evento DESC';
				
				$resCriteria = new CDbCriteria();
				$resCriteria->select = '*';
				$resCriteria->condition = 'id_evento in (
										SELECT id_evento
										FROM eventos
										WHERE estado = 1
										)';
										
				if(!Yii::app()->user->isGuest)
				{
					$totalContEvs = 0;
					
					$pcriteria = new CDbCriteria();
					$pcriteria->select = 'id_evento, Nombre, Participante1, Participante2, Fecha, Estado, count(id_evento) id_usuarioC';
					$pcriteria->condition = 'Estado = 1
											and id_evento 
											in (select id_evento
											from apuestas
											where id_usuario = '.Yii::app()->user->id.') 
											and FechaVencimiento < \''.date_format(new DateTime(), 'Y-m-d H:i:s').'\'';
					
					$pcriteria->order = 'Fecha DESC';
					
					$myevento = Eventos::model()->findAll($pcriteria);
					
					if(count($myevento) > 0)
					{
						$contar = $myevento[0]->id_usuarioC;
						
						$ccriteria = new  CDbCriteria();
						$ccriteria->select = 'count(*) id_evento';
						$ccriteria->condition = 'Estado = 1';
						
						$totalevs = Eventos::model()->findAll($ccriteria);
						
						if(count($totalevs) > 0)
							$totalContEvs = $totalevs[0]->id_evento;
							
						if($contar == $totalContEvs)
							$mostrarApuestas = true;
					}
				}
				
				if($mostrarApuestas == false)
					$this->render('view_user', array('apuestas'=>Apuestas::model()->findAll($criteria), 'resultados' => Resultados::model()->findAll($resCriteria)));
				else
					$this->render('index');
			}
		}	
	}
	
	
	public function actionInvite()
	{
		$auth = '';
		
		if(!empty($_GET['usuario']))
			$auth = $_GET['usuario'];
			
		if(Yii::app()->user->name == 'admin')
		{
			$dataProvider=new CActiveDataProvider('Amigos');
				$this->render('index',array(
					'dataProvider'=>$dataProvider,
			));
		}else
		{			
			if(Yii::app()->user->isGuest)
			{
			}
			else{
				if(!isset($_GET['user']))
				{
					$criteria = new CDbCriteria();
					$criteria->select = '*';
					$criteria->condition = 'id_usuario_origen = '.Yii::app()->user->id.
										   ' OR id_usuario_destino = '.Yii::app()->user->id;
					$criteria->order = 'id_usuario_destino DESC';
											
					$this->render('invite', array('resultados' => Amigos::model()->findAll($criteria)));
				}else
				{
					$modelo = new Invitaciones;
					date_default_timezone_set("America/La_Paz" );
					$tiempo = getdate(time());
					
					$modelo->id_usuario = Yii::app()->user->id;
					$modelo->id_grupo = 3;
					$modelo->FechaCreacion = date_format(new DateTime(), 'Y-m-d H:i:s');
					$modelo->Estado = 1;
					$modelo->NuevoUsr = $_GET['user'];
					
					if(isset($_POST['Invitaciones']))
					{
						$modelo->attributes=$_POST['Invitaciones'];
						if($modelo->save())
							$this->redirect(array('invite','evento'=>$_GET['evento']));
					}
					
					/*if(isset($_POST['Invitaciones']))
					{
						$model->attributes=$_POST['Invitaciones'];
						
						if($model->save())
							$this->redirect(array('invite','evento'=>$_GET['evento']));
					}*/
					
					$this->redirect(array('invite','evento'=>$_GET['evento']));
				}
			}
		}
	}
	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Apuestas('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Apuestas']))
			$model->attributes=$_GET['Apuestas'];

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
		$model=Apuestas::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='apuestas-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
