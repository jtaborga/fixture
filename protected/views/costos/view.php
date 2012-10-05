<?php
/*$this->breadcrumbs=array(
	'Costoses'=>array('index'),
	$model->id_costo,
);*/

$this->menu=array(
	array('label'=>'List Costos', 'url'=>array('index')),
	array('label'=>'Create Costos', 'url'=>array('create')),
	array('label'=>'Update Costos', 'url'=>array('update', 'id'=>$model->id_costo)),
	array('label'=>'Delete Costos', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_costo),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Costos', 'url'=>array('admin')),
);
?>

<h1>View Costos #<?php echo $model->id_costo; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_costo',
		'costo',
		'id_moneda',
	),
)); ?>
