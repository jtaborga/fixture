<?php

$this->menu=array(
	array('label'=>Yii::t('app', 'List Events'), 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Create Events'), 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('eventos-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('app', 'Manage Events'); ?></h1>

<p>
<?php echo Yii::t('app', 'You may optionally enter a comparison operator&nbsp;'); ?>(<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
<?php echo Yii::t('app', '&nbsp;or&nbsp;'); ?><b>=</b>)<?php echo Yii::t('app', 'at the beginning of each of your search values to specify how the comparison should be done.'); ?>
</p>

<?php echo CHtml::link(Yii::t('app', 'Advanced Search'),'#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'eventos-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_evento',
		'Nombre',
		array(
		'name' => 'Participante1',
		'header' => 'Participante 1',
		'value' => 'participantes::model()->findByPk($data->Participante1)->Nombre',
		),
		array(
		'name' => 'Participante2',
		'header' => 'Participante 2',
		'value' => 'participantes::model()->findByPk($data->Participante2)->Nombre',
		),
		'Fecha',
		array(
		'name' => 'Estado',
		'header' => 'Estado',
		'value' => 'Eventos::model()->getEstado($data->Estado)',
		),
		'FechaCreacion',
		/*
		'id_usuarioC',
		'FechaModificacion',
		'id_usuarioM',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
