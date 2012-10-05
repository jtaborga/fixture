<?php

$this->pageTitle = Yii::app()->name.' - '.Yii::t('app', 'New Bet');
/*
if(Yii::app()->user->name == 'admin')
{
	$this->menu=array(
		array('label'=>Yii::t('app', 'List Bets'), 'url'=>array('index')),
		array('label'=>Yii::t('app', 'Manage Bets'), 'url'=>array('admin')),
	);
}*/
?>
<div class="indicecontent">
<h1 class="title"> <?php echo Yii::t('app', 'New Bet'); ?> </h1>
<br />
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

</div>