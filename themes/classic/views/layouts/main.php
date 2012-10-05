<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=<?php echo Yii::app()->charset;?>" />
	<meta name="language" content="<?php echo Yii::app()->language;?>" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/master.css" media="screen, projection" />
		
	<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/jquery.min.js"></script>
	<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/qrcode/jquery.qrcode.min.js"></script>	
	<script type="text/javascript" src="<?php echo Yii::app()->theme->baseUrl; ?>/assets/js/qrcode/qrcode.js"></script>
	
	<?php
	date_default_timezone_set('America/La_Paz');
	/*
		
	<!--[if lt IE 11]>
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/main.css" media="screen, projection" />
	<![endif]-->
	
	
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; /assets/css/master.css" media="screen, projection" />
	<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700,300,300italic' rel='stylesheet' type='text/css' />
	<!--[if lt IE 11]>
		<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl;/assets/css/main.css" media="screen, projection" />
	<![endif]-->
	<!-- link rel="stylesheet" type="text/css" href="<php echo Yii::app()->theme->baseUrl; >/css/print.css" media="print" /-->
	<!-- [if lt IE 8] -->
	<!--link rel="stylesheet" type="text/css" href="<php echo Yii::app()->theme->baseUrl; >assets/css/ie.css" media="screen, projection" /-->
	<!-- [endif]  -->
	
	<!-- link rel="stylesheet" type="text/css" href="<php echo Yii::app()->theme->baseUrl; >/css/main.css" /-->
	*/
	?>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/assets/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>
	<div class="topbar">
		<span id="logo">
			<a class="nolink" href="<?php echo Yii::app()->request->baseUrl;?>">
				<?php echo CHtml::encode(Yii::app()->name); ?>
			</a>
			<!--form class="absol" method="post">
				<input type="search" id="searchbox" method="post" name="buscar" placeholder="Buscar..."  />
			</form-->
		</span>
		<!--input placeholder="Buscar..." autocomplete="on" name="busqueda" type="search" id="searchbox" /-->
		<!-- span><a href="#" id="fblittle">&nbsp;</a></span-->
		<?php 
		$mostrarApuestas = false;
		
		if(!Yii::app()->user->isGuest)
		{
			date_default_timezone_set("America/La_Paz" );
			$totalContEvs = 0;
			
			$criteria = new CDbCriteria();
			$criteria->select = 'id_evento, Nombre, Participante1, Participante2, Fecha, Estado, count(id_evento) id_usuarioC';
			$criteria->condition = 'Estado = 1
									and id_evento 
									in (select id_evento
									from apuestas
									where id_usuario = '.Yii::app()->user->id.') 
									and FechaVencimiento < \''.date_format(new DateTime(), 'Y-m-d H:i:s').'\'';
			
			$criteria->order = 'Fecha DESC';
			
			$myevento = Eventos::model()->findAll($criteria);
			
			if(count($myevento) > 0)
			{
				$contar = $myevento[0]->id_usuarioC;
				
				$ccriteria = new  CDbCriteria();
				$ccriteria->select = 'count(*) id_evento';
				$ccriteria->condition = 'Estado = 1';
				
				$totalevs = Eventos::model()->findAll($ccriteria);
				
				if(count($totalevs) > 0)
					$totalContEvs = $totalevs[0]->id_evento;
					
				if($contar == $totalContEvs)
					$mostrarApuestas = true;
			}
		}
		
		?>
		
		<?php  
			$menuUsr = '/usuarios/index';
			$menuBets= 'Bets';
			
			if(!Yii::app()->user->isGuest)
				$menuBets = 'My Bets';
			
			if(Yii::app()->user->name == 'admin')
				$menuUsr = '/usuarios/index';

				$this->widget('zii.widgets.CMenu',array(
			'htmlOptions'=>array('class'=>'menu'),
			'items'=>array(
				array('label'=>Yii::t('app', 'Home'), 'url'=>array('/site/index')),
				array('label'=>Yii::t('app', 'My Profile'), 'url'=>array($menuUsr, 'user'=>''.Yii::app()->user->id), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>Yii::t('app', 'Mejores'), 'url'=>array('/mejores/index'), 'visible'=>!Yii::app()->user->isGuest),
				array('label'=>Yii::t('app', 'Events'), 'url'=>array('/eventos/index'), 'visible'=>Yii::app()->user->name == 'admin'),
				array('label'=>Yii::t('app', 'Results'), 'url'=>array('/resultados/index'), 'visible'=>Yii::app()->user->name == 'admin'),
				array('label'=>Yii::t('app', $menuBets), 'url'=>array('/apuestas/index')),
				array('label'=>Yii::t('app', 'All Bets'), 'url'=>array('/apuestas/see'), 'visible'=>$mostrarApuestas),
				array('label'=>Yii::t('app', 'Login'), 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>Yii::t('app', 'Logout').'('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div><!-- header -->
	
	<?php 
	/*<!--div id="mainmenu">
				array('label'=>Yii::t('app', 'Contact'), 'url'=>array('/site/contact'), 'visible'=>Yii::app()->user->name !== 'admin'),
	array('label'=>'Bets', 'url'=>array('/apuestas/index')),
	array('label'=>'Players', 'url'=>array('/participantes/index')),
					array('label'=>Yii::t('app', 'About'), 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>Yii::t('app', 'Contact'), 'url'=>array('/site/contact')),
	<php 
		$menuUsr = '/usuarios/index';
		
		if(Yii::app()->authManager->checkAccess('rol_usr_todos', Yii::app()->user->id))
			$menuUsr = '/usuarios/'.Yii::app()->user->id.'?';
	>
	
		<php $this->widget('zii.widgets.CMenu',array(
			'htmlOptions'=>array('class'=>'menu'),
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),
				array('label'=>'Contact', 'url'=>array('/site/contact')),
				array('label'=>'Users', 'url'=>array($menuUsr)),
				array('label'=>'Events', 'url'=>array('/eventos/index')),
				array('label'=>'Players', 'url'=>array('/participantes/index')),
				array('label'=>'Results', 'url'=>array('/resultados/index')),
				array('label'=>'Bets', 'url'=>array('/apuestas/index')),
				array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); >
	</div -->*/
	?>

	<?php echo $content; ?>

	
	<div class="footer_lower">
		&copy; <?php echo date('Y'); ?> Tour Labs Inc. <?php echo Yii::t('app', 'All Rights Reserved'); ?>.
	</div><!-- footer -->
	
</body>
</html>
