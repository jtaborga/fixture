<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_apuesta'); ?>
		<?php echo $form->textField($model,'id_apuesta'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_usuario'); ?>
		<?php echo $form->textField($model,'id_usuario'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_evento'); ?>
		<?php echo $form->textField($model,'id_evento'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Marcador1'); ?>
		<?php echo $form->textField($model,'Marcador1'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Marcador2'); ?>
		<?php echo $form->textField($model,'Marcador2'); ?>
	</div>

	<?php /*
	<div class="row">
		<?php echo $form->label($model,'FechaRegistro'); ?>
		<?php echo $form->textField($model,'FechaRegistro'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FechaLimite'); ?>
		<?php echo $form->textField($model,'FechaLimite'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Estado'); ?>
		<?php echo $form->textField($model,'Estado',array('size'=>1,'maxlength'=>1)); ?>
	</div>
	
	<div class="row">
		<?php echo $form->label($model,'FechaCreacion'); ?>
		<?php echo $form->textField($model,'FechaCreacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_usuarioC'); ?>
		<?php echo $form->textField($model,'id_usuarioC'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FechaModificacion'); ?>
		<?php echo $form->textField($model,'FechaModificacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_usuarioM'); ?>
		<?php echo $form->textField($model,'id_usuarioM'); ?>
	</div>*/
	?>

	<div class="row buttons">
		<?php echo CHtml::submitButton(Yii::t('app', 'Search')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->