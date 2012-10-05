<?php

/*$this->menu=array(
	array('label'=>Yii::t('app', 'Create Results'), 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Manage Results'), 'url'=>array('admin')),
);*/
?>

<div class="indicecontent">
	<h1 class="title centrar"><?php echo Yii::t('app', 'Results'); ?></h1>
	
	<?php $this->widget('zii.widgets.CListView', array(
		'dataProvider'=>$dataProvider,
		'itemView'=>'_view',
	)); ?>
	<br /><br />
	<div class="vinculoswhite centrar">
		<?php echo CHtml::link('Contabilizar Apuestas', array('/resultados/contabilizar'), array('class'=>'vinculowhite')); ?>
		<?php echo CHtml::link(Yii::t('app', 'Create Results'), array('/resultados/create'), array('class'=>'vinculowhite')); ?>
	</div>
</div>
