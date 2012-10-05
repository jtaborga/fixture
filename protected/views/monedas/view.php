<?php
$this->breadcrumbs=array(
	'Monedases'=>array('index'),
	$model->id_moneda,
);

$this->menu=array(
	array('label'=>'List Monedas', 'url'=>array('index')),
	array('label'=>'Create Monedas', 'url'=>array('create')),
	array('label'=>'Update Monedas', 'url'=>array('update', 'id'=>$model->id_moneda)),
	array('label'=>'Delete Monedas', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_moneda),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Monedas', 'url'=>array('admin')),
);
?>

<h1>View Monedas #<?php echo $model->id_moneda; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_moneda',
		'nombre',
		'abreviatura',
		'id_pais',
	),
)); ?>
