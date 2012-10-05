
	<?php 
		$chaun = '';		
		if(Yii::app()->language == 'en')
			$chaun = $model->Nombre.' '.$model->Paterno.'\'s '.Yii::t('app', 'Profile').' | '.Yii::app()->name;
		else
			$chaun = Yii::t('app', 'Profile').' de '.$model->Nombre.' '.$model->Paterno.' | '.Yii::app()->name;
		$this->pageTitle=$chaun;
		
		echo '<div class="centrar">
			<div id="bannerprof">
				<ul class="ca-menu">
		    		<li>
		    			<a href="'.Yii::app()->request->baseUrl.'/index.php/usuarios/index/'.Yii::app()->user->id.'?lg='.Yii::app()->language.'">
							<span class="ca-icon">
								<img class="rounded" src="data:image/jpeg;base64,'.$model->Foto.'" alt="Foto Perfil" width="148" height="148" alt="" />
							</span>
		    			</a>
		    		</li>
	        	</ul>
	        </div>
		  </div>
		  ';
		  
		  if(strlen($model->BBPIN) > 5)
		  {
			echo "<script>
					$(document).ready(function() 
					{
						$('.qrcode').qrcode({
								width:      90, 
								height:     90, 
								typeNumber: 4,
								text: 'bbm:".$model->BBPIN."681090df".$model->BBPIN."' 
						});
					});
				</script>";
		  }else
		  {
			/*echo '<script>
					$(document).ready(function() 
					{
						$(".wrapper").removeClass("wrapper");
						$(".qrcode").removeClass("qrcode");
					});
				  </script>
				 ';*/
		  	echo "<script>
					$(document).ready(function() 
					{
						$('.qrcode').qrcode({
								width:      90, 
								height:     90, 
								typeNumber: 4,
								text: 'telf:+".$model->Telefono."' 
						});
					});
				</script>";
		  }
	?>

	
	<div class="socialicons">
		<a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/images/ui/ico_01.gif" width="37" height="32" alt="" /></a>
		<a href="#"><img src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/images/ui/ico_02.gif" width="37" height="32" alt="" /></a>		
	</div>
	
	<div class="information">
		<div class="centrar">
			<div class="name"><?php echo $model->NombreCompleto; ?></div>
			<div class="occupation"><?php echo $model->Ocupacion; ?></div>
			<div class="location"><?php echo $model->CiudadOrigen; ?></div>
			<div class="wrapper">
				<div class="qrcode"></div>
			</div>
			<br />
			</div>
		<div>
			<ul class="options">
				<li>
					<?php echo CHtml::link('Configuracion', array('update', 'id'=>$model->id_usuario), array('class'=>'icon icon_gear2', 'title'=>Yii::t('app', 'Update Users'))); ?>
				</li>
				<?php /*<li>
					<?php echo CHtml::link('&nbsp;', array('admin'), array('class'=>'icon icon_magnifying_glass', 'title'=>Yii::t('app', 'Manage Users'))); ?>
				</li>
				<li>
					<?php echo CHtml::link('&nbsp;', array('create'), array('class'=>'icon icon_user', 'title'=>Yii::t('app', 'Create Users'))); ?>
				</li>
				<li>
					<?php echo CHtml::link('&nbsp;', array('#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_usuario),Yii::t('app', 'confirm')=>Yii::t('app', 'Are you sure you want to delete this item?'))), array('class'=>'icon icon_skull', 'title'=>Yii::t('app', 'Delete Users'))); ?>
				</li>
				<li>
					<?php echo CHtml::link('&nbsp;', array('index'), array('class'=>'icon icon_group', 'title'=>Yii::t('app', 'List Users'))); ?>
				</li>*/
				?>
			</ul>
		</div>
		
		<div class="space"></div>
		<br /><br />
		<div id="rodear">
			<table>
				<tr>
					<td>
						<a href="<?php echo Yii::app()->baseUrl.'/amigos/index'; ?>" class="a-btn">
							<span class="a-btn-slide-text">Amigos</span>
							<img src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/images/ui/statistics.png" width="179" height="123" alt="Amigos" />
						</a>
					</td>
					<td>
						<a href="<?php echo Yii::app()->baseUrl.'/estadisticas/index'; ?>" class="a-btn">
							<span class="a-btn-slide-text">Estad&iacute;sticas</span>
							<img src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/images/ui/statistics.png" width="179" height="123" alt="Estadisticas" />
						</a>
					</td>
					<td>
						<a href="<?php echo Yii::app()->baseUrl.'/fotos/index'; ?>" class="a-btn">
							<span class="a-btn-slide-text">Fotos</span>
							<img src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/images/ui/statistics.png" width="179" height="123" alt="Fotos" />
						</a>
					</td>
				</tr>
				<tr>
					<td>
						<a href="<?php echo Yii::app()->baseUrl.'/eventos/index'; ?>" class="a-btn">
							<span class="a-btn-slide-text">Eventos</span>
							<img src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/images/ui/tips.png" width="179" height="123" alt="Eventos" />
						</a>
					</td>
					<td>
						<a href="<?php echo Yii::app()->baseUrl.'/victorias/index'; ?>" class="a-btn">
							<span class="a-btn-slide-text">Victorias</span>
							<img src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/images/ui/crown.png" width="179" height="123" alt="Victorias" />
						</a>
					</td>
					<td>
						<a href="<?php echo Yii::app()->baseUrl.'/apuestas/index'; ?>" class="a-btn">
							<span class="a-btn-slide-text">Apuestas</span>
							<img src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/images/ui/lists.png" width="179" height="123" alt="Apuestas" />
						</a>
					</td>
				</tr>
			</table>
		</div>
		<br />
		<br />
	</div>
	<br /><br /><br /><br />
<?php

/*echo '<div>';
$this->menu=array(
	array('label'=>Yii::t('app', 'List Users'), 'url'=>array('index')),
	array('label'=>Yii::t('app', 'Create Users'), 'url'=>array('create')),
	array('label'=>Yii::t('app', 'Update Users'), 'url'=>array('update', 'id'=>$model->id_usuario)),
	array('label'=>Yii::t('app', 'Delete Users'), 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id_usuario),Yii::t('app', 'confirm')=>Yii::t('app', 'Are you sure you want to delete this item?'))),
	array('label'=>Yii::t('app', 'Manage Users'), 'url'=>array('admin')),
);
echo '</div>';
*/
?>

<?php
/*
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id_usuario',
		'Nombre',
		'Paterno',
		'Materno',
		'NombreCompleto',
		'Telefono',
		'Correo',
		array(
		'name' => 'Foto',
		'header' => 'Foto',
		'value' => '<img src="data:image/jpeg;base64,'.$model->Foto.'" alt="Texto alternativo" width="120" height="150" />'
		),
	),
));
*/
?>
