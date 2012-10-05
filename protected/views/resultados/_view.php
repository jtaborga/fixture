<div id="roundcircle">
	<div class="view">
	
		<b><?php echo CHtml::encode($data->getAttributeLabel('id_resultado')); ?>:</b>
		<?php echo CHtml::link(CHtml::encode($data->id_resultado), array('view', 'id'=>$data->id_resultado)); ?>
		<br />
		<br />
		<span class="vinculo"><?php echo Eventos::model()->findByPk($data->id_evento)->Nombre; ?>:</span>
		<br />
		<br />
		<?php echo '<img class="banderabig" src="data:image/jpeg;base64,'.Participantes::model()->findByPk(Eventos::model()->findByPk($data->id_evento)->Participante1)->foto_grande.'" alt="Foto Equipo 1" width="48" height="36" />'; ?>
		<span class="equipo"><?php echo Participantes::model()->findByPk(Eventos::model()->findByPk($data->id_evento)->Participante1)->Nombre; ?>:</span>
		<span class="resultado"><?php echo CHtml::encode($data->Marcador1); ?></span>
		<span>&nbsp;-&nbsp;</span>
		<span class="resultado"><?php echo CHtml::encode($data->Marcador2); ?></span>
		<span class="equipo"><?php echo Participantes::model()->findByPk(Eventos::model()->findByPk($data->id_evento)->Participante2)->Nombre; ?>:</span>
		<?php echo '<img class="banderabig" src="data:image/jpeg;base64,'.Participantes::model()->findByPk(Eventos::model()->findByPk($data->id_evento)->Participante2)->foto_grande.'" alt="Foto Equipo 1" width="48" height="36" />'; ?>
		<br /><br />
		<?php $fecha = new DateTime($data->FechaRegistro); ?>
		<span><?php echo CHtml::encode($data->getAttributeLabel('FechaRegistro')); ?>:</span>
		<span class="horafecha"><?php echo date_format($fecha, 'd-m-Y'); ?></span>
		<br />
	</div>
</div>
<br />
<br />