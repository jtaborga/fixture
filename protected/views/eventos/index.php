<?php
/*
$this->menu=array(
	array('label'=>Yii::t('app', 'Create Events'), 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Manage Events'), 'url'=>array('admin')),
);*/
?>
<div class="indicecontent">
<h1 class="title centrar"><?php echo Yii::t('app', 'Events'); ?></h1>
<br />
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
</div>
