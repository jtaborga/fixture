<div id="roundcircle">
<div class="view">

	<b class="negro"><?php echo $data->getAttributeLabel('Nombre'); ?>:</b>
	<span class="blanco"><?php echo '&nbsp; '.CHtml::decode($data->Nombre); ?></span>
	
	<?php echo '<img class="banderamini" src="data:image/jpeg;base64,'.$data->foto_pequena.'" alt="Bandera" width="24" height="19" />'; ?>
	<br /><br />
	<div><?php echo CHtml::link('Ver Detalle', array('view', 'id'=>$data->id_participante), array('class'=>'vinculo')); ?></div>
	<?php /*<b><?php echo CHtml::encode($data->getAttributeLabel('FechaCreacion')); ?>:</b>
	<?php echo CHtml::encode($data->FechaCreacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_usuarioC')); ?>:</b>
	<?php echo CHtml::encode(Usuarios::model()->findByPk($data->id_usuarioC)->NombreCompleto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FechaModificacion')); ?>:</b>
	<?php echo CHtml::encode($data->FechaModificacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_usuarioM')); ?>:</b>
	<?php echo CHtml::encode(Usuarios::model()->findByPk($data->id_usuarioM)->NombreCompleto); ?>
	<br />*/
	?>

</div>
</div>
<br />