<?php
$this->breadcrumbs=array(
	'Costoses'=>array('index'),
	$model->id_costo=>array('view','id'=>$model->id_costo),
	'Update',
);

$this->menu=array(
	array('label'=>'List Costos', 'url'=>array('index')),
	array('label'=>'Create Costos', 'url'=>array('create')),
	array('label'=>'View Costos', 'url'=>array('view', 'id'=>$model->id_costo)),
	array('label'=>'Manage Costos', 'url'=>array('admin')),
);
?>

<h1>Update Costos <?php echo $model->id_costo; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>