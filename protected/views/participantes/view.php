<?php
/*
$this->menu=array(
	array('label'=>Yii::t('app', 'List Players'), 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Create Players'), 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Update Players'), 'url'=>array('update', 'id'=>$model->id_participante)),
	array('label'=>Yii::t('app', 'Delete Players'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_participante),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>Yii::t('app', 'Manage Players'), 'url'=>array('admin')),
);*/
?>
<div class="indicecontent">
	<h1 class="title centrar"><?php echo Yii::t('app', 'View Players').' # '.$model->id_participante; ?></h1>
	<?php echo '<img class="banderabig" src="data:image/jpeg;base64,'.$model->foto_grande.'" alt="Foto Equipo 1" width="48" height="36" />'; ?>
	<span class="equipo"><?php echo $model->Nombre; ?></span>
</div>
<?php /*$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_participante',
		'Nombre',
		'FechaCreacion',
		array(
		'name' => 'id_usuarioC',
		'header' => 'Usuario Creador',
		'value' => Usuarios::model()->findByPk($model->id_usuarioC)->NombreCompleto
		),
		'FechaModificacion',
		array(
		'name' => 'id_usuarioM',
		'header' => 'Usuario Creador',
		'value' => Usuarios::model()->findByPk($model->id_usuarioM)->NombreCompleto
		),
	),
)); */?>
