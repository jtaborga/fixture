<?php
/*
$this->menu=array(
	array('label'=>Yii::t('app', Yii::t('app', 'List Players')), 'url'=>array('index')),
	array('label'=>Yii::t('app', Yii::t('app', 'Manage Players')), 'url'=>array('admin')),
);*/
?>

<div class="indicecontent">
<h1 class="title centrar"><?php echo Yii::t('app', 'Create Players'); ?></h1>
<hr />
<br />
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>