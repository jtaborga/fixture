<?php 

class EstadisticasController extends Controller{
	
	public function actionIndex(){
		
		$criteria = new CDbCriteria();
		$criteria->select = '*';
		$criteria->condition = 'id_usuario = '.Yii::app()->user->id;
		$criteria->order = 'id_evento DESC';
		
		if(Yii::app()->user->isGuest)
			$this->render('index');
		else
			$this->render('view', array('apuestas'=>Apuestas::model()->findAll($criteria)));
	}
}

?>