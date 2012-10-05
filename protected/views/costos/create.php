<?php
$this->breadcrumbs=array(
	'Costoses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Costos', 'url'=>array('index')),
	array('label'=>'Manage Costos', 'url'=>array('admin')),
);
?>

<h1>Create Costos</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>