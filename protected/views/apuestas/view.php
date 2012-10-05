<?php

if(Yii::app()->user->name == 'admin')
{
	$this->menu=array(
		array('label'=>Yii::t('app', 'List Bets'), 'url'=>array('index')),
		array('label'=>Yii::t('app', 'Create Bets'), 'url'=>array('create')),
		array('label'=>Yii::t('app', 'Update Bets'), 'url'=>array('update', 'id'=>$model->id_apuesta)),
		array('label'=>Yii::t('app', 'Delete Bets'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_apuesta),'confirm'=>'Are you sure you want to delete this item?')),
		array('label'=>Yii::t('app', 'Manage Bets'), 'url'=>array('admin')),
	);
}

?>
<img class="fondo" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/images/ui/metalist.jpg" alt="fondo" width="100%" height="100%" />
<div class="indicecontent" id="princ">
<h1 class="title"><?php echo Yii::t('app', 'Have been created the bet '); ?> # <?php echo $model->id_apuesta; ?></h1>
<div class="title"><?php echo Yii::t('app', 'Thanks for make a bet!'); ?></div>
<br />
<br />
<div class="botonapuestas">
	<div class="vinculowhite centrar">
		<?php echo CHtml::link('Seguir Apostando', array('/site/index')); ?>
	</div>
</div>
<br />
<br />
<div class="botonapuestas">
	<div class="vinculowhite centrar">
		<?php echo CHtml::link('Ver Mis Apuestas', array('/apuestas/index')); ?>
	</div>
</div>
<br />
<div onload="update_qrcodetext('www.google.com')" id="qrcode"></div>
</div>
 <?php 
	/*
	$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		/*'id_apuesta',
		
		array(
		'name' => 'id_evento',
		'header' => 'Evento',
		'value' => Eventos::model()->findByPk($model->id_evento)->Nombre
		),
		array(
		'name' => 'Marcador1',
		'header' => 'Participantes::model()->findByPk(Eventos::model()->findByPk($model->id_evento)->Participante1)->Nombre',
		'value' => $model->Marcador1
		),
		array(
		'name' => 'Marcador2',
		'header' => 'Participantes::model()->findByPk(Eventos::model()->findByPk($model->id_evento)->Participante2)->Nombre',
		'value' => $model->Marcador2
		),
		array(
		'name' => 'id_usuario',
		'header' => 'Usuario',
		'value' => Usuarios::model()->findByPk($model->id_usuario)->NombreCompleto
		),
		'FechaRegistro',
		'FechaLimite',
		'Estado',
		'FechaCreacion',
		'id_usuarioC',
		'FechaModificacion',
		'id_usuarioM',
	),
));
*/
 ?>
