<?php 
	
	$res = new CDbCriteria();
	$res->select = '*';
	$res->condition = 'id_evento in (
							SELECT id_evento
							FROM eventos
							WHERE estado = 1
							)';
							
	$resultados = Resultados::model()->findAll($res);

?>

<div class="indicecontent">
	<div class="title centrar" style="text-align:center;background:#000;color:#fff;border:1px;"><?php echo Yii::t('app', 'Results'); ?></div>
	<div class="evnts blanco">
		<table class="centrar">
			<caption style="text-align:center;background:#000;color:#fff;border:1px;">Resultados Oficiales</caption>
			<tr>
				<th class="datos" style="text-align:center;background:#000;color:#fff;" scope="col">Equipo 1</th>
				<th class="datos" style="text-align:center;background:#000;color:#fff;" scope="col">Resultado 1</th>
				<th class="datos" style="text-align:center;background:#000;color:#fff;" scope="col">Equipo 2</th>
				<th class="datos" style="text-align:center;background:#000;color:#fff;" scope="col">Resultado 2</th>
			</tr>
			
			<?php if(count($resultados) == 0){?>
			<tr>
				<th colspan="4">No se han registrado los resultados de los partidos.</th>
			</tr>
			<?php }?>
			
			<?php 
			foreach($resultados as $resultado):
			?>
			
			<tr>
				<td class="datos"><?php echo Participantes::model()->findByPk(Eventos::model()->findByPk($resultado->id_evento)->Participante1)->Nombre; ?></td>
				<td class="datos centrartexto"><?php echo $resultado->Marcador1; ?></td>
				<td class="datos"><?php echo Participantes::model()->findByPk(Eventos::model()->findByPk($resultado->id_evento)->Participante2)->Nombre; ?></td>
				<td class="datos centrartexto"><?php echo $resultado->Marcador2; ?></td>
			</tr>
			
			<?php endforeach; ?>
		</table>
	</div>
	<br />
	<br />
	<div style="text-align:center;background:#000000;color:#ffffff;"><?php echo Yii::t('app', 'Bets'); ?></div>
	<div class="evnts blanco">
		<?php $total = 0; ?>
		<table class="centrar">
		<caption class="vinculowhite">Apuestas Activas</caption>
			<tr>
				<th class="datos" style="text-align:center;background:#000;color:#fff;" scope="col">Usuario</th>
				<th class="datos" style="text-align:center;background:#000;color:#fff;" scope="col">Equipo 1</th>
				<th class="datos" style="text-align:center;background:#000;color:#fff;" scope="col">Resultado 1</th>
				<th class="datos" style="text-align:center;background:#000;color:#fff;" scope="col">Equipo 2</th>
				<th class="datos" style="text-align:center;background:#000;color:#fff;" scope="col">Resultado 2</th>
				<th class="datos" style="text-align:center;background:#000;color:#fff;" scope="col">Puntos</th>
			</tr>
		<?php if(count($model) == 0){?>
			<tr>
				<th colspan="5">No existen apuestas.</th>
			</tr>
		<?php }?>
		<?php foreach($model as $apuesta):?>
			<tr>
				<td class="datos"><?php echo Usuarios::model()->findByPk($apuesta->id_usuario)->NombreUsuario; ?></td>
				<td class="datos"><?php echo Participantes::model()->findByPk(Eventos::model()->findByPk($apuesta->id_evento)->Participante1)->Nombre; ?></td>
				<td class="datos centrartexto"><?php echo $apuesta->Marcador1; ?></td>
				<td class="datos"><?php echo Participantes::model()->findByPk(Eventos::model()->findByPk($apuesta->id_evento)->Participante2)->Nombre; ?></td>
				<td class="datos centrartexto"><?php echo $apuesta->Marcador2; ?></td>
				<td class="datos centrartexto"><?php echo $apuesta->puntos; ?></td>
			</tr>
			<?php $total = $total + $apuesta->puntos; ?>
		<?php endforeach;?>
		</table>
		<br />
		<br />
		<?php /*<table class="centrar">
			<caption class="vinculowhite"><?php echo Yii::t('app', 'Results'); ?></caption>
			<tr>
				<th class="datos" scope="col">&nbsp;</th>
				<th class="datos" scope="col">&nbsp;</th>
				<th class="datos" scope="col">&nbsp;</th>
				<th class="datos" scope="col">&nbsp;</th>
				<th class="datos" scope="col">Total</th>
			</tr>
			<tr>
				<td class="datos">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td class="datos centrartexto">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td class="datos">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td class="datos centrartexto">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
				<td class="datos centrartexto"><?php echo $total; ?></td>
			</tr>
		</table>
		<br /><br />
		*/
		?>
	</div>
</div>


<?php /*	if($model !== null){ ?>
		<table>
			<caption><?php echo Yii::t('app', 'Bets'); ?></caption>
			
			<?php foreach($model as $apuesta){ ?>
				  <tr style="background:#000;">
					<td style="color:#fff;">Usuario</td>
					<td style="color:#fff;"><?php echo Participantes::model()->findByPk(Eventos::model()->findByPk($apuesta->id_evento)->Participante1)->Nombre; ?></td>
					<td style="color:#fff;"><?php echo Participantes::model()->findByPk(Eventos::model()->findByPk($apuesta->id_evento)->Participante2)->Nombre; ?></td>
				  </tr>
				  <tr>
					<td><?php echo Usuarios::model()->findByPk($apuesta->id_usuario)->NombreUsuario; ?></td>
					<td><?php echo $apuesta->Marcador1; ?></td>
					<td><?php echo $apuesta->Marcador2; ?></td>
				  </tr>
			<?php }?>
			
		</table>
<?php } */?>