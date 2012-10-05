<?php 
$this->pageTitle=Yii::t('app', 'Bienvenidos a Fixture');
?>

<div class="indicecontent">
	<div class="centrar title">Eventos sin apostar</div>
	<hr />
	<br />
	<div class="evnts blanco">
		<?php foreach($eventos as $evento):?>
		<div><?php echo $evento->Nombre; ?></div>
		<div><?php echo ''.Participantes::model()->findByPk($evento->Participante1)->Nombre.' - '.
		''.Participantes::model()->findByPk($evento->Participante2)->Nombre; ?></div>
		<div><?php echo ' Costo:&nbsp;'.Costos::model()->findByPk($evento->id_costo)->costo.'&nbsp;'.Monedas::model()->findByPk(Costos::model()->findByPk($evento->id_costo)->id_moneda)->abreviatura; ?></div>
		<?php $fecha = new DateTime($evento->Fecha); ?>
		<div>Fecha: <?php echo date_format($fecha, 'd-m-y'); ?></div>
		<div>Hora: <?php echo date_format($fecha, 'H:i:s'); ?></div>
		<?php $fechaV = new DateTime($evento->FechaVencimiento); ?>
		<div class="rojo centrar">Podr&aacute;s apostar hasta el d&iacute;a 
			<?php echo date_format($fechaV, 'd-m-y').' a horas : '.date_format($fechaV, 'H:i:s'); ?>
		</div>
		<br />
		<div class="botoninicio">
			<div class="vinculowhite centrar">
				<?php echo CHtml::link(Yii::t('app', 'Bet'), array('/apuestas/create', 'evento'=>$evento->id_evento)); ?>
			</div>
		</div>
		<br />
		<?php endforeach;?>
		<?php 
			if(empty($eventos)){
			  	echo '<div>No hay eventos pendientes</div><br /><br />';
			  	echo '<div class="botonapuestas">
					  	<div class="vinculowhite centrar">'.
							CHtml::link(Yii::t('app', 'New Event'), array('/eventos/create')).
					 	'</div>
					  </div>';
			}else
			{
				
				echo '<hr />
					  <br />
					  <div class="botonapuestas">
					  	<div class="vinculowhite centrar">'.
							CHtml::link(Yii::t('app', 'New Event'), array('/eventos/create')).
					 	'</div>
					  </div>';
			}
		?>
	</div>
</div>

<?php /*
	<p>
		<php echo CHtml::link(Yii::t(app, Login), array(login), array(class=>a_demo_three, title=>Yii::t(app, Login))); ?>
	</p>
	*/
?>