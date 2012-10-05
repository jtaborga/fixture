<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_usuario')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id_usuario), array('view', 'id'=>$data->id_usuario)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Nombre')); ?>:</b>
	<?php echo CHtml::encode($data->Nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Paterno')); ?>:</b>
	<?php echo CHtml::encode($data->Paterno); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Materno')); ?>:</b>
	<?php echo CHtml::encode($data->Materno); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('NombreCompleto')); ?>:</b>
	<?php echo CHtml::encode($data->NombreCompleto); ?>
	<br />

	<b><?php echo $data->getAttributeLabel('Telefono'); ?>:</b>
	<?php echo $data->Telefono; ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('Correo')); ?>:</b>
	<?php echo CHtml::encode($data->Correo); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('Ocupacion')); ?>:</b>
	<?php echo CHtml::encode($data->Ocupacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('CiudadOrigen')); ?>:</b>
	<?php echo CHtml::encode($data->CiudadOrigen); ?>
	<br />
	
	<b><?php echo CHtml::encode($data->getAttributeLabel('Foto')); ?>:</b>
	<?php echo '<img src="data:image/jpeg;base64,'.$data->Foto.'" alt="Texto alternativo" width="120" height="150" />'; ?>
	<!-- php echo CHtml::encode($data->Foto); -->
	<!-- php echo CHtml::image(Yii::app()->controller->createUrl('usuarios/image', array('id_usuario'=>$data->id_usuario))); -->
	<br />


</div>