<div class="view">
	<b><?php echo CHtml::encode($data->getAttributeLabel('id_apuesta')); ?>:</b>
	<?php echo CHtml::encode($data->id_apuesta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_usuario')); ?>:</b>
	<?php echo CHtml::encode(Usuarios::model()->findByPk($data->id_usuario)->NombreCompleto); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('id_evento')); ?>:</b>
	<?php echo CHtml::encode(Eventos::model()->findByPk($data->id_evento)->Nombre); ?>
	*/?>
	
	<br />
	Pron&oacute;stico del evento:
	<hr />
	<?php CHtml::encode(Eventos::model()->findByPk($data->id_evento)->Nombre); ?>
	<b><?php echo CHtml::encode(Participantes::model()->findByPk(Eventos::model()->findByPk($data->id_evento)->Participante1)->Nombre); ?> :</b>
	<?php echo CHtml::encode($data->Marcador1); ?>
	
	<span> - </span>

	<b><?php echo CHtml::encode(Participantes::model()->findByPk(Eventos::model()->findByPk($data->id_evento)->Participante2)->Nombre); ?>:</b>
	<?php echo CHtml::encode($data->Marcador2); ?>
	<br /><br />
	<?php echo CHtml::link('Ver Detalles', array('view', 'id'=>$data->id_apuesta)); ?>
	
	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('Estado')); ?>:</b>
	<?php echo CHtml::encode(Eventos::model()->getEstado($data->Estado)); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('FechaRegistro')); ?>:</b>
	<?php echo CHtml::encode($data->FechaRegistro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FechaLimite')); ?>:</b>
	<?php echo CHtml::encode($data->FechaLimite); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('FechaCreacion')); ?>:</b>
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