<?php

$this->menu=array(
	array('label'=>Yii::t('app', 'List Events'), 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Create Events'), 'url'=>array('create')),
	array('label'=>Yii::t('app', 'View Events'), 'url'=>array('view', 'id'=>$model->id_evento)),
	array('label'=>Yii::t('app', 'Manage Events'), 'url'=>array('admin')),
);
?>

<h1><?php echo Yii::t('app', 'Update Events').' '.$model->id_evento; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>