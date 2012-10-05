<?php

/*$this->menu=array(
	array('label'=>Yii::t('app', 'List Events'), 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Create Events'), 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Update Events'), 'url'=>array('update', 'id'=>$model->id_evento)),
	array('label'=>Yii::t('app', 'Delete Events'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_evento),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app', 'Manage Events'), 'url'=>array('admin')),
);*/
?>
<div class="indicecontent">
	<div class="centrar title"><?php echo Yii::t('app', 'View Events'); ?> #<?php echo $model->id_evento; ?></div>
	<hr />
	<br />
	<div id="roundcircle">
		<div class="centrar title"><?php echo $model->Nombre;?></div>
		<hr />
		<?php echo '<img class="banderabig" src="data:image/jpeg;base64,'.participantes::model()->findByPk($model->Participante1)->foto_grande.'" alt="Foto Equipo 1" width="48" height="36" />'; ?>
		<span class="equipo"><?php echo participantes::model()->findByPk($model->Participante1)->Nombre; ?></span>
		<span class="resultado"><?php echo resultados::model()->find('id_evento', $model->id_evento)->Marcador1; ?></span>
		<span>&nbsp;-&nbsp;</span>
		<span class="resultado"><?php echo resultados::model()->find('id_evento', $model->id_evento)->Marcador2; ?></span>
		<span class="equipo"><?php echo participantes::model()->findByPk($model->Participante2)->Nombre; ?></span>
		<?php echo '<img class="banderabig" src="data:image/jpeg;base64,'.participantes::model()->findByPk($model->Participante2)->foto_grande.'" alt="Foto Equipo 1" width="48" height="36" />'; ?>
		<br /><br />
		<?php $mifecha = new DateTime($model->Fecha);?>
		<div class="horafecha">Fecha: <?php echo date_format($mifecha, 'd-m-y'); ?></div>
		<div class="horafecha">Hora: <?php echo date_format($mifecha, 'H:i:s'); ?></div>
		<br />
		<div><?php echo CHtml::link(Yii::t('app', 'Invite Friends'), array('/apuestas/invite', 'evento'=>$model->id_evento), array('class'=>'vinculowhite')); ?></div>
		<br />
	</div>
</div>
<?php /*$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_evento',
		'Nombre',
		'Participante1',
		'Participante2',
		'Fecha',
		'Estado',
		'FechaCreacion',
		'id_usuarioC',
		'FechaModificacion',
		'id_usuarioM',
	),
)); */ ?>
