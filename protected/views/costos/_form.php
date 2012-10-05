<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'costos-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'costo'); ?>
		<?php echo $form->textField($model,'costo',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'costo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_moneda'); ?>
		<?php echo $form->textField($model,'id_moneda'); ?>
		<?php echo $form->error($model,'id_moneda'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->