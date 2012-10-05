<?php

$this->menu=array(
	array('label'=>Yii::t('app', 'List Bets'), 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Create Bets'), 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('apuestas-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<br /><br /><br />
<div id="roundcircle">
<h1><?php echo Yii::t('app', 'Manage Bets'); ?></h1>

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
	'id'=>'apuestas-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id_apuesta',
		array(
		'name' => 'id_usuario',
		'header' => 'Usuario',
		'value' => 'Usuarios::model()->findByPk($data->id_usuario)->NombreCompleto'
		),
		array(
		'name' => 'id_evento',
		'header' => 'Evento',
		'value' => 'Eventos::model()->findByPk($data->id_evento)->Nombre'
		),
		array(
		'name' => 'Marcador1',
		'header' => 'Marcador Participante 1'
		),
		array(
		'name' => 'Marcador2',
		'header' => 'Marcador Participante 2'
		),
		'FechaRegistro',
		/*
		'FechaLimite',
		'Estado',
		'FechaCreacion',
		'id_usuarioC',
		'FechaModificacion',
		'id_usuarioM',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
</div>
