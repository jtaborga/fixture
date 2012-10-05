<?php
$this->breadcrumbs=array(
	'Apuestases'=>array('index'),
	$model->id_apuesta=>array('view','id'=>$model->id_apuesta),
	'Update',
);

$this->menu=array(
	array('label'=>Yii::t('app', 'List Bets'), 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Create Bets'), 'url'=>array('create')),
	array('label'=>Yii::t('app', 'View Bets'), 'url'=>array('view', 'id'=>$model->id_apuesta)),
	array('label'=>Yii::t('app', 'Manage Bets'), 'url'=>array('admin')),
);
?>

<h1><?php Yii::t('app', 'Update Bets').' '.$model->id_apuesta; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>