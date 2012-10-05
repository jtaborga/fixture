<?php
$this->breadcrumbs=array(
	'Amigoses'=>array('index'),
	$model->id_amigo=>array('view','id'=>$model->id_amigo),
	'Update',
);

$this->menu=array(
	array('label'=>'List Amigos', 'url'=>array('index')),
	array('label'=>'Create Amigos', 'url'=>array('create')),
	array('label'=>'View Amigos', 'url'=>array('view', 'id'=>$model->id_amigo)),
	array('label'=>'Manage Amigos', 'url'=>array('admin')),
);
?>

<h1>Update Amigos <?php echo $model->id_amigo; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>