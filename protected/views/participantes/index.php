<?php

/*$this->menu=array(
	array('label'=>Yii::t('app', 'Create Players'), 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Manage Players'), 'url'=>array('admin')),
);*/
?>

<div class="indicecontent white">
<h1 class="title centrar"><?php echo Yii::t('app', 'Players'); ?></h1>
<hr />
<br />
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
</div>
<br />
