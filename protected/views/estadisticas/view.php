<?php
	$this->pageTitle = Yii::app()->name.' - '.Yii::t('app', 'View Statistics'); 
?>
<div class="indicecontent">
	<div class="centrar title"><?php echo Yii::t('app', 'View Statistics');?></div>
	<div class="evnts blanco">
		<?php 	
				$total = 0; 
				$contApuesta = 0;
				$aciertos = 0;
				$desaciertos = 0;
				$porcAciertos = 0;
				$porcDesaciertos = 0;
		?>
		<?php foreach($apuestas as $apuesta):?>
		
		<?php 
			$total = $total + $apuesta->puntos;
			$contApuesta = $contApuesta + 1;
			
			if($apuesta->puntos == 4)
				$aciertos = $aciertos + 1;
			else
				$desaciertos = $desaciertos + 1;
		?>
		
		<br />
		<br />
		<?php endforeach;?>
		<?php if($contApuesta > 0) {?>
		<?php $porcAciertos = ($aciertos * 100) / $contApuesta; $porcDesaciertos = ($desaciertos * 100) / $contApuesta; ?>
		<div class="main centrar">
			<span class="button-label">Tama&ntilde;o:</span>
                <input type="radio" name="resize-graph" id="graph-small" /><label for="graph-small">Corto</label>
                <input type="radio" name="resize-graph" id="graph-normal" checked="checked" /><label for="graph-normal">Normal</label>
                <input type="radio" name="resize-graph" id="graph-large" /><label for="graph-large">Largo</label>   

			<span class="button-label">Color:</span>
                <input type="radio" name="paint-graph" id="graph-blue" checked="checked" /><label for="graph-blue">Blue</label>
                <input type="radio" name="paint-graph" id="graph-green" /><label for="graph-green">Green</label>
                <input type="radio" name="paint-graph" id="graph-rainbow" /><label for="graph-rainbow">Rainbow</label>

			<span class="button-label">Vista:</span>
			<input type="radio" name="fill-graph" id="f-product1" checked="checked" /><label for="f-product1">Versi&oacute;n 1</label>

			<ul class="graph-container">
				<li>
					<span>Aciertos<?php echo '('.$aciertos.')'; ?></span>
					<div class="bar-wrapper">
						<div class="bar-container">
							<div class="bar-background"></div>
							<div class="bar-inner" style="<?php echo 'height:'.$porcAciertos.'%; bottom: 0;'; ?>"><?php echo $aciertos; ?></div>
							<div class="bar-foreground"></div>
						</div>
					</div>
				</li>
				<li>
					<span>Desaciertos<?php echo '('.$desaciertos.')'; ?></span>
					<div class="bar-wrapper">
						<div class="bar-container">
							<div class="bar-background"></div>
							<div class="bar-inner" style="<?php echo 'height:'.$porcDesaciertos.'%; bottom: 0;'; ?>"><?php echo $desaciertos; ?></div>
							<div class="bar-foreground"></div>
						</div>
					</div>
				</li>
				<li>
					<ul class="graph-marker-container">
						<li style="bottom:25%;"><span>25%</span></li>
						<li style="bottom:50%;"><span>50%</span></li>
						<li style="bottom:75%;"><span>75%</span></li>
						<li style="bottom:100%;"><span>100%</span></li>
					</ul>
				</li>
			</ul>
        </div>
		<?php } else{ ?>
		<div class="main centrar">
			<hr />
			<br />
			<div class="title">No tienes apuestas disponibles</div>
		</div>
		<?php } ?>
	</div>
</div>
<br /><br /><br />