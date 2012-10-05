<?php 
$this->pageTitle=Yii::t('app', 'Login');
?>

<div id="container_buttons">
<div class="centrar century_text textogrande"><?php echo Yii::t('app', 'Login'); ?></div>
<br />
<div class="century_text"><?php echo Yii::t('app', 'Please fill out the following form with your login credentials:'); ?></div>

<div class="form">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'login-form',
		'enableClientValidation'=>false,
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
		),
	)); ?>

	<div class="century_text"><?php echo Yii::t('app', 'Fields with '); ?><span class="required">*</span><?php echo Yii::t('app', ' are required.'); ?></div>

	<div class="row">
		<?php echo $form->labelEx($model,'username', array('class' => 'century_text')); ?>
		<?php echo $form->textField($model,'username'); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password', array('class' => 'century_text')); ?>
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
		<?php /*
		<p class="hint">
			Hint: You may login with <tt>demo/demo</tt> or <tt>admin/admin</tt>.
		</p>
		*/
		?>
	</div>

	<div class="row rememberMe">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'rememberMe', array('class' => 'century_text')); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>

	<div class="row">
		<p>
		<?php echo CHtml::submitButton(Yii::t('app', 'Login'), array('class'=>'vinculowhite')); ?>
		</p>
	</div>
	<?php
	/*
	<div class="row">	
		
		<a class="blanco" href="<?php echo CHtml::normalizeUrl(Yii::app()->request->baseUrl.'/index.php/usuarios/create'); ?>">
			<?php echo Yii::t('app', 'Create Users'); ?>
		</a>
		<br />
		
		<a class="blanco" href="<?php echo CHtml::normalizeUrl(Yii::app()->request->baseUrl.'/index.php/usuarios/forgot'); ?>">
				<?php echo Yii::t('app', 'Recover Password'); ?>
		</a> 
		
	</div>
	*/
	?>

<?php $this->endWidget(); ?>
</div><!-- form -->