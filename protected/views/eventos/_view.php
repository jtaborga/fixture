<div id="roundcircle">
<div class="view">
	<b class="negro"><?php echo CHtml::encode($data->getAttributeLabel('Nombre')); ?>:</b>
	<span class="blanco"><?php echo CHtml::encode($data->Nombre); ?></span>
	<br />
	
	<b class="negro"><?php echo CHtml::encode($data->getAttributeLabel('Participante1')); ?>:</b>
	<span class="blanco"><?php echo CHtml::encode(Participantes::model()->findByPk($data->Participante1)->Nombre); ?></span>
	<?php echo '<img class="banderamini" src="data:image/jpeg;base64,'.Participantes::model()->findByPk($data->Participante1)->foto_pequena.'" alt="Bandera" width="24" height="19" />'; ?>
	<span>&nbsp; - &nbsp;</span>
	<b class="negro"><?php echo CHtml::encode($data->getAttributeLabel('Participante2')); ?>:</b>
	<span class="blanco"><?php echo CHtml::encode(Participantes::model()->findByPk($data->Participante2)->Nombre); ?></span>
	<?php echo '<img class="banderamini" src="data:image/jpeg;base64,'.Participantes::model()->findByPk($data->Participante2)->foto_pequena.'" alt="Bandera" width="24" height="19" />'; ?>
	<br />
	
	<?php $mifecha = new DateTime($data->Fecha);?>
	<div class="horafecha">Fecha: <?php echo date_format($mifecha, 'd-m-y'); ?></div>
	<div class="horafecha">Hora: <?php echo date_format($mifecha, 'H:i:s'); ?></div>
	<br />
	<div class=""><?php echo CHtml::link('Ver Detalle', array('view', 'id'=>$data->id_evento), array('class'=>'vinculo')); ?></div>
	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Estado')); ?>:</b>
	<?php echo CHtml::encode(Eventos::model()->getEstado($data->Estado)); ?>
	<br />

	<b><?php echo $data->getAttributeLabel('FechaCreacion'); ?>:</b>
	<?php echo $data->FechaCreacion; ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_usuarioC')); ?>:</b>
	<?php echo CHtml::encode(Usuarios::model()->findByPk($data->id_usuarioC)->NombreCompleto); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FechaModificacion')); ?>:</b>
	<?php echo CHtml::encode($data->FechaModificacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_usuarioM')); ?>:</b>
	<?php echo CHtml::encode(Usuarios::model()->findByPk($data->id_usuarioM)->NombreCompleto); ?>
	<br />
	*/ ?>
</div>
</div>
<br />