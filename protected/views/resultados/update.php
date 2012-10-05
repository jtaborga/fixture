<?php

$this->menu=array(
	array('label'=>Yii::t('app', 'List Results'), 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Create Results'), 'url'=>array('create')),
	array('label'=>Yii::t('app', 'View Results'), 'url'=>array('view', 'id'=>$model->id_resultado)),
	array('label'=>Yii::t('app', 'Manage Results'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'Update Results').' '.$model->id_resultado; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>