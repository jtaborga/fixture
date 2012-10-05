<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_costo'); ?>
		<?php echo $form->textField($model,'id_costo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'costo'); ?>
		<?php echo $form->textField($model,'costo',array('size'=>6,'maxlength'=>6)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_moneda'); ?>
		<?php echo $form->textField($model,'id_moneda'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->