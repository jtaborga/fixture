<?php
/*$this->breadcrumbs=array(
	'Costoses',
);*/

$this->pageTitle = Yii::app()->name.' - '.Yii::t('app', 'Bet Prices'); 

$this->menu=array(
	array('label'=>'Create Prices', 'url'=>array('create')),
	array('label'=>'Manage Prices', 'url'=>array('admin')),
);
?>

<div class="indicecontent">

<div class="centrar title"><?php echo Yii::t('app', 'Price'); ?></div>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

</div>

