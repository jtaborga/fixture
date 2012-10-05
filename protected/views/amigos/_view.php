<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_amigo')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_amigo), array('view', 'id'=>$data->id_amigo)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_usuario_origen')); ?>:</b>
	<?php echo CHtml::encode($data->id_usuario_origen); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_usuario_destino')); ?>:</b>
	<?php echo CHtml::encode($data->id_usuario_destino); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FechaRegistro')); ?>:</b>
	<?php echo CHtml::encode($data->FechaRegistro); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('FechaInicio')); ?>:</b>
	<?php echo CHtml::encode($data->FechaInicio); ?>
	<br />


</div>