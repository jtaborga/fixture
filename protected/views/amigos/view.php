<?php
$this->breadcrumbs=array(
	'Amigoses'=>array('index'),
	$model->id_amigo,
);

$this->menu=array(
	array('label'=>'List Amigos', 'url'=>array('index')),
	array('label'=>'Create Amigos', 'url'=>array('create')),
	array('label'=>'Update Amigos', 'url'=>array('update', 'id'=>$model->id_amigo)),
	array('label'=>'Delete Amigos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_amigo),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Amigos', 'url'=>array('admin')),
);
?>

<h1>View Amigos #<?php echo $model->id_amigo; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_amigo',
		'id_usuario_origen',
		'id_usuario_destino',
		'FechaRegistro',
		'FechaInicio',
	),
)); ?>
