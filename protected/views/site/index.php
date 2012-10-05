<?php 
$this->pageTitle=Yii::t('app', 'Welcome to Fixture');
?>

<!--img class="fondo" src="<php echo Yii::app()->theme->baseUrl; >/assets/images/ui/metalist.jpg" alt="fondo" width="100%" height="100%" /-->
<div class="indicecontent">
	<div class="textogrande centrar gothicwhite"><?php echo Yii::app()->name; ?></div>
	<br />
	<br />
	<br />
	<div class="blanco">Versi&oacute;n Beta 0.2</div>
	<div class="blanco">Sistema de apuestas</div>
	<div class="blanco">&nbsp;</div>
	<br />
	<br />
	<br />
	<br />
	<div class="blanco">Desarrollado por Jorge Taborga</div>
	<br />
	<br />
	<div class="botonera">
		<div class="vinculowhite centrar">
			<a href="<?php echo CHtml::normalizeUrl(Yii::app()->request->baseUrl.'/index.php/site/login'); ?>">
				<?php echo Yii::t('app', 'Login'); ?>
			</a>
		</div>
		<?php 
		/*<div class="button-wrapper">
			<a href="<?php echo CHtml::normalizeUrl(Yii::app()->request->baseUrl.'/index.php/site/login'); ?>" class="a-btn">
				<span class="a-btn-text"><?php echo Yii::t('app', 'Login'); ?></span>
				<span class="a-btn-slide-text">Click</span>
				<span class="a-btn-icon-right"><span></span></span>
			</a>
		</div>*/
		?>
	</div>
</div>
<?php /*
	<p>
		<php echo CHtml::link(Yii::t(app, Login), array(login), array(class=>a_demo_three, title=>Yii::t(app, Login))); ?>
	</p>
	*/
?>