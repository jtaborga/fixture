<?php
	$this->pageTitle = Yii::app()->name.' | '.Yii::t('app', 'Invite Friends');
	$contar = 0;
?>

<div class="indicecontent">
<div class="centrar title"><?php echo Yii::t('app', 'Friends'); ?></div>
<hr />
<br />
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
	<td class="botonera">
	<?php $id_evento = 0;
	
		if(isset($_GET['evento']))
		{
			$id_evento = $_GET['evento'];
		}
	?>
	<?php echo CHtml::link(Yii::t('app', 'Invite'), array('/apuestas/invite', 'evento'=>$id_evento, 'user'=>$resultado->id_usuario_destino), array('class'=>'vinculowhite')); ?>
	</td>
</tr>
<?php endforeach; }?>
</table>

<hr />
<br />
<?php echo CHtml::link(Yii::t('app', 'Volver'), array('/eventos/index'), array('class'=>'vinculowhite')); ?>
</div>

<br />