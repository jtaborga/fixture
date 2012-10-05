<?php 
$this->pageTitle=Yii::app()->name.' :: '.Yii::t('app', 'Welcome to Fixture');
?>
<!--img class="fondo" src=<php echo Yii::app()->theme->baseUrl;>/assets/images/ui/metalist.jpg" alt="fondo" width="100%" height="90%" /-->
<div class="indicecontent">
	<div class="centrar title">Mis Eventos</div>
	<hr />
	<br />
	<div class="evnts blanco">
		<?php foreach($eventos as $evento):?>
		<div><?php echo $evento->Nombre; ?></div>
		<?php $fecha = new DateTime($evento->Fecha); ?>
		<div>Fecha: <?php echo date_format($fecha, 'd-m-y'); ?></div>
		<div>Hora: <?php echo date_format($fecha, 'H:i:s'); ?></div>
		<br />
		<div><?php echo CHtml::link(Yii::t('app', 'Create Result'), array('/resultados/create', 'evento'=>$evento->id_evento), array('class'=>'vinculowhite')); ?></div>
		<br />
		<div><?php echo CHtml::link(Yii::t('app', 'View User List'), array('/apuestas/invite', 'evento'=>$evento->id_evento), array('class'=>'vinculowhite')); ?></div>
		<br />
		<?php endforeach;?>
		<?php
			if(empty($eventos)){
			  	echo '<div>No hay eventos creados por ti.</div><br /><br />';
			  	echo '<div class="botonapuestas">
					  	<div class="vinculowhite centrar">'.
							CHtml::link(Yii::t('app', 'Create Events'), array('/eventos/create')).
					 	'</div>
					  </div>';
			}
		?>
		<?php
			if(!empty($eventos)){
			  	echo '<br /><br />';
			  	echo '<div class="botonapuestas">
					  	<div class="vinculowhite centrar">'.
							CHtml::link(Yii::t('app', 'Create Events'), array('/eventos/create')).
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