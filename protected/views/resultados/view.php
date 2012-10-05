<?php
/*
$this->menu=array(
	array('label'=>Yii::t('app', 'List Results'), 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Create Results'), 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Update Results'), 'url'=>array('update', 'id'=>$model->id_resultado)),
	array('label'=>Yii::t('app', 'Delete Results'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_resultado),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app', 'Manage Results'), 'url'=>array('admin')),
);*/
?>
<div class="indicecontent">
	<div class="centrar">
		<h1 class="title"><?php echo Yii::t('app', 'View Results').' '.$model->id_resultado; ?></h1>
		<b><?php /*echo CHtml::encode($model->getAttributeLabel('id_resultado')); ?>:</b>
		<?php echo CHtml::link(CHtml::encode($model->id_resultado), array('view', 'id'=>$model->id_resultado));*/ ?></b>
		<br />
		<br />
		<span class="vinculo"><?php echo 'Evento:&nbsp;&nbsp;'.Eventos::model()->findByPk($model->id_evento)->Nombre; ?></span>
		<br />
		<br />
		<?php echo '<img class="banderabig" src="data:image/jpeg;base64,'.Participantes::model()->findByPk(Eventos::model()->findByPk($model->id_evento)->Participante1)->foto_grande.'" alt="Foto Equipo 1" width="48" height="36" />'; ?>
		<span class="equipo"><?php echo Participantes::model()->findByPk(Eventos::model()->findByPk($model->id_evento)->Participante1)->Nombre; ?>:</span>
		<span class="resultado"><?php echo CHtml::encode($model->Marcador1); ?></span>
		<span>&nbsp;-&nbsp;</span>
		<span class="resultado"><?php echo CHtml::encode($model->Marcador2); ?></span>
		<span class="equipo"><?php echo Participantes::model()->findByPk(Eventos::model()->findByPk($model->id_evento)->Participante2)->Nombre; ?>:</span>
		<?php echo '<img class="banderabig" src="data:image/jpeg;base64,'.Participantes::model()->findByPk(Eventos::model()->findByPk($model->id_evento)->Participante2)->foto_grande.'" alt="Foto Equipo 1" width="48" height="36" />'; ?>
		<br /><br />
		<?php $fecha = new DateTime($model->FechaRegistro); ?>
		<span class="horafecha"><?php echo CHtml::encode($model->getAttributeLabel('FechaRegistro')); ?>:</span>
		<span class="horafecha"><?php echo date_format($fecha, 'd-m-Y'); ?></span>
		<br /><br /><br />
		<div class="row buttons">
			<a class="vinculowhite" href="<?php echo Yii::app()->baseUrl; ?>">Volver</a>
		</div>
	</div>
	<br />
	<br />
</div>
<br />
<br />

<?php /*$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_resultado',
		'id_evento',
		'Marcador1',
		'Marcador2',
		'FechaRegistro',
	),
));*/ ?>
