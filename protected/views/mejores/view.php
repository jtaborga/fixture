<?php $this->pageTitle = Yii::app()->name.' | '.Yii::t('app', 'Mejores'); ?>

<!-- img class="fondo" src="<php echo Yii::app()->theme->baseUrl; ?>/assets/images/ui/metalist.jpg" alt="fondo" width="100%" height="90%" /-->
<div class="indicecontent">
	<div class="title centrar"><?php echo Yii::t('app', 'Results'); ?></div>
	<hr />
	<br />
	<div class="evnts blanco">
		
		<table class="centrar">
			<caption class="vinculowhite">Resultados Oficiales</caption>
			<tr>
				<th class="datos" scope="col">Equipo 1</th>
				<th class="datos" scope="col">Resultado 1</th>
				<th class="datos" scope="col">Equipo 2</th>
				<th class="datos" scope="col">Resultado 2</th>
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
	<br /><br />
	<div class="title centrar"><?php echo Yii::t('app', 'Los Mejores'); ?></div>
	<hr />
	<br />
	<table class="centrar">
		<caption class="vinculowhite">Mejores Puntuaciones en <?php echo !empty($apuestas) ? $apuestas[0]->id_evento.' Partidos' : '';?></caption>
		
		<tr class="vinculo">
			<th>Posici&oacute;n</th>
			<th>Usuario</th>
			<th>Puntos</th>
		</tr>
		
		<?php if(count($apuestas) == 0){?>
			<tr class="blanco">
				<th colspan="3">No existen apuestas.</th>
			</tr>
		<?php }?>
		
		<?php
		$numero = 1; $ultPuntaje = 0;
		$apuestasJuego = 0;
		
		//if(!empty($apuestas))
			//$apuestasJuego = $apuestas->eventos;
		
		foreach($apuestas as $apuesta):
			
			if($ultPuntaje == 0)
				$ultPuntaje = $apuesta->puntos;
			
			if($apuesta->puntos == $ultPuntaje){
				$ultPuntaje = $apuesta->puntos;
			}else
			{
				$numero = $numero + 1;
				$ultPuntaje = $apuesta->puntos;
			}
			
			$apuestasJuego = $apuesta->id_evento;
		?>
		
		<tr class="blanco">
			<td class="mayus"><?php echo $numero; ?></td>
			<td class="mayus"><?php echo Usuarios::model()->findByPk($apuesta->id_usuario)->NombreCompleto; ?></td>
			<td class="mayus"><?php echo $apuesta->puntos; ?></td>
		</tr>
		
		<?php endforeach; ?>
	</table>
</div>