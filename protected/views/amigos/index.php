<?php
/*$this->breadcrumbs=array(
	'Amigoses',
);

$this->menu=array(
	array('label'=>'Create Amigos', 'url'=>array('create')),
	array('label'=>'Manage Amigos', 'url'=>array('admin')),
);*/
?>

<?php
	$this->pageTitle = Yii::app()->name.' | '.Yii::t('app', 'Friends');
	$contar = 0;
?>

<div class="indicecontent">
<div class="centrar title"><?php echo Yii::t('app', 'Friends'); ?></div>
<hr />
<br />
<?php /*$this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
));*/ ?>

<?php if(count($resultados) == 0){?>
			<div class="events blanco">
				Todavía no tienes ning&uacute;n amigo.
			</div>
<?php } else {?>

<table class="centrar">
<caption class="vinculowhite"><?php echo Yii::t('app', 'Total Friends').' ('.count($resultados).')' ?></caption>
<?php 
	foreach($resultados as $resultado):
	$contar += 1;
?>
<tr>
	<td>&nbsp;</td>
</tr>
<tr>
	<td class="frameborder"><?php echo '<img src="data:image/jpeg;base64,'.Usuarios::model()->findByPk($resultado->id_usuario_destino)->Foto.'" alt="Foto" width="86" height="108" />'; ?></td>
	<td class="white"><?php echo Usuarios::model()->findByPk($resultado->id_usuario_destino)->NombreCompleto;?></td>
	<td class="botonera"><a class="vinculowhite" href="#">Invitar</a></td>
</tr>
<?php endforeach; }?>
</table>

</div>

<br />
