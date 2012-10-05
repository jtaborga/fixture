

<!-- img class="fondo" src="<php echo Yii::app()->theme->baseUrl; >/assets/images/ui/metalist.jpg" alt="fondo" width="100%" height="90%" /-->
<div class="indicecontent">
<div class="title"><?php echo Yii::t('app', 'Create Results'); ?></div>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
</div>
<?php

	/*if(Yii::app()->user->name == 'admin')
	{
		$this->menu=array(
			array('label'=>Yii::t('app', 'List Results'), 'url'=>array('index')),
			array('label'=>Yii::t('app', 'Manage Results'), 'url'=>array('admin')),
		);
	}*/
?>