<?php
	$this->pageTitle = Yii::app()->name.' | '.Yii::t('app', 'My Bets'); 
?>

<!--img class="fondo" src="<php echo Yii::app()->theme->baseUrl; ?>/assets/images/ui/metalist.jpg" alt="fondo" width="100%" height="90%" /-->
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
	<br />
	<br />
	<div class="centrar title"><?php echo Yii::t('app', 'My Bets'); ?></div>
	<hr />
	<br />
	<div class="evnts blanco">
		<?php $total = 0; ?>
		<table class="centrar">
		<caption class="vinculowhite">Apuestas Activas</caption>
			<tr>
				<th class="datos" scope="col">Equipo 1</th>
				<th class="datos" scope="col">Resultado 1</th>
				<th class="datos" scope="col">Equipo 2</th>
				<th class="datos" scope="col">Resultado 2</th>
				<th class="datos" scope="col">Puntos</th>
			</tr>
		<?php if(count($apuestas) == 0){?>
			<tr>
				<th colspan="5">No existen apuestas.</th>
			</tr>
		<?php }?>
		<?php foreach($apuestas as $apuesta):?>
			<tr>
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
		<table class="centrar">
			<caption class="vinculowhite total"><?php echo Yii::t('app', 'Results'); ?></caption>
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
		<div class="vinculoswhite centrar">
			<?php 
				if(count($resultados) > 0){
					echo '<hr />
						  <br />';
					echo CHtml::link('Descargar apuestas activas', array('/apuestas/excel'), array('class'=>'vinculowhite')); 
				}				
			?>
		</div>
	</div>
</div>