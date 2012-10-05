<?php 
$this->pageTitle=Yii::app()->name.' :: '.Yii::t('app', 'Generando el puntaje');
?>

<?php if($eventos !== null){?>

<img class="fondo" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/images/ui/metalist.jpg" alt="fondo" width="100%" height="90%" />
<div class="indicecontent">
<?php foreach($eventos as $evento):
		$apuestas = Apuestas::model()->findAll('id_evento = '.$evento->id_evento);
		$resultado = Resultados::model()->findAll('id_evento = '.$evento->id_evento);
		$victoria1 = 0;
		$victoria2 = 0;
		$empate = 0;
		
		if(!empty($resultado))
		{
			if($resultado[0]->Marcador1 == $resultado[0]->Marcador2)
				$empate = 1;
			if($resultado[0]->Marcador1 > $resultado[0]->Marcador2)
				$victoria1 = 1;
			if($resultado[0]->Marcador2 > $resultado[0]->Marcador1)
				$victoria2 = 1;
			
			foreach($apuestas as $apuesta):
				$puntos = 0;
				$empateVirtual = 0;
				$victoria1Virtual = 0;
				$victoria2Virtual = 0;	
			
				if($apuesta->Marcador1 == $apuesta->Marcador2)
					$empateVirtual = 1;
				if($apuesta->Marcador1 > $apuesta->Marcador2)
					$victoria1Virtual = 1;
				if($apuesta->Marcador2 > $apuesta->Marcador1)
					$victoria2Virtual = 1;
				
				if($apuesta->Marcador1 == $resultado[0]->Marcador1)
					$puntos = $puntos + 1;
				if($apuesta->Marcador2 == $resultado[0]->Marcador2)
					$puntos = $puntos + 1;
					
				if($victoria1Virtual > 0)
				{
					if($victoria1 > 0)
						$puntos = $puntos + 1;
				}
				
				if($victoria2Virtual > 0)
				{ 
					if($victoria2 > 0)
						$puntos = $puntos + 1;
				}
				
				if($empateVirtual == $empate)
					$puntos = $puntos + 1;
					
				if($apuesta->Marcador1 == $resultado[0]->Marcador1 AND $apuesta->Marcador2 == $resultado[0]->Marcador2)
					$puntos = 4;
					
				$modelo  = Apuestas::model()->findByPk($apuesta->id_apuesta);
				$modelo->puntos = $puntos;
				$modelo->save();
				
			endforeach;
		}
	  endforeach;
?>
	<div class="title">Se han contabilizado los datos</div>
</div>

<?php } ?>


