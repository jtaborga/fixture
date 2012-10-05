<?php 
$this->pageTitle=Yii::app()->name.' :: '.Yii::t('app', 'Welcome to Fixture');
?>

<!--img class="fondo" src="<php echo Yii::app()->theme->baseUrl; ?>/assets/images/ui/metalist.jpg" alt="fondo" width="100%" height="100%" /-->
<div class="indicecontent">
	<div class="centrar title">Eventos</div>
	<hr />
	<br />
	<div class="evnts blanco">
		<?php foreach($eventos as $evento):?>
		<div><?php echo $evento->Nombre; ?></div>
		<div><?php echo ''.Participantes::model()->findByPk($evento->Participante1)->Nombre.' - '.
		''.Participantes::model()->findByPk($evento->Participante2)->Nombre; ?></div>
		<?php $fecha = new DateTime($evento->Fecha); ?>
		<div>Fecha: <?php echo date_format($fecha, 'd-m-y'); ?></div>
		<div>Hora: <?php echo date_format($fecha, 'H:i:s'); ?></div>
		<br />
		<div class="botoninicio">
			<div class="vinculowhite">
				<?php echo CHtml::link(Yii::t('app', 'Bet'), array('/apuestas/create', 'evento'=>$evento->id_evento)); ?>
			</div>
		</div>
		<br />
		<?php endforeach;?>
		<?php 
			if(empty($eventos))
			  	echo '<div>No hay eventos pendientes</div>';
		?>
	</div>
</div>

<?php /*
	<p>
		<php echo CHtml::link(Yii::t(app, Login), array(login), array(class=>a_demo_three, title=>Yii::t(app, Login))); ?>
	</p>
	*/
?>