<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_moneda')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_moneda), array('view', 'id'=>$data->id_moneda)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
	<?php echo CHtml::encode($data->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('abreviatura')); ?>:</b>
	<?php echo CHtml::encode($data->abreviatura); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_pais')); ?>:</b>
	<?php echo CHtml::encode($data->id_pais); ?>
	<br />


</div>