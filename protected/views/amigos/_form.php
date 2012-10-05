<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'amigos-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_amigo'); ?>
		<?php echo $form->textField($model,'id_amigo'); ?>
		<?php echo $form->error($model,'id_amigo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_usuario_origen'); ?>
		<?php echo $form->textField($model,'id_usuario_origen'); ?>
		<?php echo $form->error($model,'id_usuario_origen'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_usuario_destino'); ?>
		<?php echo $form->textField($model,'id_usuario_destino'); ?>
		<?php echo $form->error($model,'id_usuario_destino'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'FechaRegistro'); ?>
		<?php echo $form->textField($model,'FechaRegistro'); ?>
		<?php echo $form->error($model,'FechaRegistro'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'FechaInicio'); ?>
		<?php echo $form->textField($model,'FechaInicio'); ?>
		<?php echo $form->error($model,'FechaInicio'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->