<?php

/*$this->menu=array(
	array('label'=>Yii::t('app', 'List Events'), 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Manage Events'), 'url'=>array('admin')),
);*/

?>

<div class="indicecontent">
<div class="centrar title"><?php echo Yii::t('app', 'Create Events'); ?></div>
<br />
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>