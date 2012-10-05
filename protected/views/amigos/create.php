<?php
$this->breadcrumbs=array(
	'Amigoses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Amigos', 'url'=>array('index')),
	array('label'=>'Manage Amigos', 'url'=>array('admin')),
);
?>

<h1>Create Amigos</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>