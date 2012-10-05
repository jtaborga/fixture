<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'monedas-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_moneda'); ?>
		<?php echo $form->textField($model,'id_moneda'); ?>
		<?php echo $form->error($model,'id_moneda'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'abreviatura'); ?>
		<?php echo $form->textField($model,'abreviatura',array('size'=>5,'maxlength'=>5)); ?>
		<?php echo $form->error($model,'abreviatura'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_pais'); ?>
		<?php echo $form->textField($model,'id_pais'); ?>
		<?php echo $form->error($model,'id_pais'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->