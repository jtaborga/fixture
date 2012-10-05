<?php

$this->menu=array(
	array('label'=>Yii::t('app', 'List Players'), 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Create Players'), 'url'=>array('create')),
	array('label'=>Yii::t('app', 'View Players'), 'url'=>array('view', 'id'=>$model->id_participante)),
	array('label'=>Yii::t('app', 'Manage Players'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'Update Players').': '.$model->Nombre; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>