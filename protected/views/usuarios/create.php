<?php

/*
$this->menu=array(
	array('label'=>Yii::t('app', 'List Users'), 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Manage Users'), 'url'=>array('admin')),
);*/
?>

<div class="indicecontent">
	<h1 class="title"><?php echo Yii::t('app', 'Create Users'); ?> </h1>
	<hr />
	<br />
	<div class="roundcircle">
		<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
	</div>
</div>