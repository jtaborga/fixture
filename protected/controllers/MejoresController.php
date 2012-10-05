<?php 

class MejoresController extends Controller{
	
	public function actionIndex(){
		
		$criteria = new CDbCriteria();
		$criteria->select = 'id_usuario, SUM(puntos) puntos, count(id_evento) id_evento';
		$criteria->condition = 'id_evento in (
								SELECT id_evento
								FROM eventos
								WHERE estado = 1
								)';
		$criteria->group  = 'id_usuario';
		$criteria->order = 'SUM(puntos) DESC';
		
		$resCriteria = new CDbCriteria();
		$resCriteria->select = '*';
		$resCriteria->condition = 'id_evento in (
								SELECT id_evento
								FROM eventos
								WHERE estado = 1
								)';
		
		if(Yii::app()->user->isGuest)
			$this->render('index');
		else
			$this->render('view', array('apuestas'=>Apuestas::model()->findAll($criteria), 'resultados'=>Resultados::model()->findAll($resCriteria)));
	}
}

?>