<?php
$this->breadcrumbs=array(
	'Monedases'=>array('index'),
	$model->id_moneda=>array('view','id'=>$model->id_moneda),
	'Update',
);

$this->menu=array(
	array('label'=>'List Monedas', 'url'=>array('index')),
	array('label'=>'Create Monedas', 'url'=>array('create')),
	array('label'=>'View Monedas', 'url'=>array('view', 'id'=>$model->id_moneda)),
	array('label'=>'Manage Monedas', 'url'=>array('admin')),
);
?>

<h1>Update Monedas <?php echo $model->id_moneda; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>