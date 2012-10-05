<?php
/*
$this->menu=array(
	array('label'=>Yii::t('app', 'List Users'), 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Create Users'), 'url'=>array('create')),
	array('label'=>Yii::t('app', 'View Users'), 'url'=>array('view', 'id'=>$model->id_usuario)),
	array('label'=>Yii::t('app', 'Manage Users'), 'url'=>array('admin')),
);*/
?>
<br />
<div class="indicecontent">
<div class="centrar title"><?php echo Yii::t('app', 'Update Users').' '.Yii::t('app', 'User')?></div>
<br />
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

</div>