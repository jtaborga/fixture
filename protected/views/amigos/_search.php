<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_amigo'); ?>
		<?php echo $form->textField($model,'id_amigo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_usuario_origen'); ?>
		<?php echo $form->textField($model,'id_usuario_origen'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_usuario_destino'); ?>
		<?php echo $form->textField($model,'id_usuario_destino'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FechaRegistro'); ?>
		<?php echo $form->textField($model,'FechaRegistro'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'FechaInicio'); ?>
		<?php echo $form->textField($model,'FechaInicio'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->