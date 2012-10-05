<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id_participante'); ?>
		<?php echo $form->textField($model,'id_participante'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'Nombre'); ?>
		<?php echo $form->textField($model,'Nombre',array('size'=>60,'maxlength'=>100)); ?>
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
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->