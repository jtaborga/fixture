<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_resultado'); ?>
		<?php echo $form->textField($model,'id_resultado'); ?>
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

	<div class="row">
		<?php echo $form->label($model,'FechaRegistro'); ?>
		<?php echo $form->textField($model,'FechaRegistro'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->